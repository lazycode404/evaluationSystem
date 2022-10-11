<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\finalEvalproposal;
use App\Models\Member;
use App\Models\Section;
use App\Models\GroupModel;
use App\Models\oralEvaluation;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\titleEvaluation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\XmlConfiguration\Group;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $course = Course::where('status', 1)->get();
        return view('home', compact('course'));
    }

    public function viewCoursePost($course_name)
    {
        $courses = Course::where('Coursename', $course_name)->where('status', 1)->first();

        if ($courses) {
            $section = Section::where('sectionCourse', $courses->Coursename)->where('status', 1)->orderBy('Sectionname')->get();
            return view('section', compact('courses', 'section'));
        } else {
            return view('/');
        }
    }

    public function viewSectionPost($course_name, $section_name)
    {
        $courses = Course::where('Coursename', $course_name)->where('status', 1)->first();
        $section = Section::where('Sectionname', $section_name)->where('status', 1)->first();

        if ($courses && $section) {
            $group = GroupModel::where('course', $courses->Coursename)
                ->where('section', $section->Sectionname)
                ->where('status', 1)->get();


            return view('group')->with(['courses' => $courses, 'section' => $section, 'group' => $group]);
        }
    }

    public function viewGroupPost($course_name, $section_name, $group_name)
    {
        $courses = Course::where('Coursename', $course_name)->where('status', 1)->first();
        $section = Section::where('Sectionname', $section_name)->where('status', 1)->first();
        $group = GroupModel::where('name', $group_name)->where('status', 1)->first();
        $evaluator = Auth::user()->name;

        if ($group && $section && $courses) {
            $member = Student::where('course', $courses->Coursename)
                ->where('section', $section->Sectionname)
                ->where('group', $group->name)
                ->where('status', 1)->get();

            $viewbtnresult = titleEvaluation::where('evaluator', $evaluator)
                ->where('section', $section->Sectionname)
                ->where('groupName', $group->name)
                ->where('course', $courses->Coursename)
                ->where('capstoneTitle', $group->capstoneTitle)->first();

            $viewbtnresultFinal = finalEvalproposal::where('evaluator', $evaluator)
                ->where('section', $section->Sectionname)
                ->where('groupName', $group->name)
                ->where('course', $courses->Coursename)
                ->where('capstoneTitle', $group->capstoneTitle)->first();

            $viewbtnOralResult = oralEvaluation::where('evaluator', $evaluator)
                ->where('section', $section->Sectionname)
                ->where('groupName', $group->name)
                ->where('course', $courses->Coursename)
                ->where('capstoneTitle', $group->capstoneTitle)->first();

            $groupby = Student::where('group', $group->name)->count();
            //dd($groupby);
            return view('evaluation.index', compact('group', 'member', 'courses', 'section', 'viewbtnresult', 'viewbtnresultFinal', 'groupby','viewbtnOralResult'));
        }
    }

    public function viewTitleEval($course_name, $section_name, $group_name)
    {
        $courses = Course::where('Coursename', $course_name)->where('status', 1)->first();
        $section = Section::where('Sectionname', $section_name)->where('status', 1)->first();
        $group = GroupModel::where('name', $group_name)->where('status', 1)->first();


        if ($group && $section && $courses) {
            $member = Student::where('course', $courses->Coursename)
                ->where('section', $section->Sectionname)
                ->where('group', $group->name)
                ->where('status', 1)
                ->orderBy('lastname', 'ASC')
                ->get();

            $individual = Student::where('course', $courses->Coursename)
                ->where('section', $section->Sectionname)
                ->where('group', $group->name)
                ->where('status', 1)
                ->orderBy('lastname', 'ASC')
                ->get();
            return view('evaluation.title_evaluation', compact('group', 'member', 'courses', 'section', 'individual'));
        }
    }

    public function storeTitleEval(Request $request, $course_name, $section_name, $group_name)
    {
        $courses = Course::where('Coursename', $course_name)->where('status', 1)->first();
        $section = Section::where('Sectionname', $section_name)->where('status', 1)->first();
        $group = GroupModel::where('name', $group_name)->where('status', 1)->first();

        if ($courses && $section && $group) {
            $member = Student::where('course', $courses->Coursename)
                ->where('section', $section->Sectionname)
                ->where('group', $group->name)
                ->where('status', 1)
                ->orderBy('lastname', 'ASC')
                ->get();

            $titleEvaluation = new titleEvaluation();

            $lastname = $request->input('name');
            $grade = $request->input('grade');


            foreach ($lastname as $key => $n) {
                DB::table('student')->where('id', $lastname[$key])->update(array('titleProposalGrade' => $grade[$key]));
            }

            $evaluator = Auth::user()->name;
            $groupName = $group->name;
            $capstoneTitle = $group->capstoneTitle;
            $evalsection = $section->Sectionname;
            $evalcourse = $courses->Coursename;
            $q1 = $request->input('q1');
            $q2 = $request->input('q2');
            $q3 = $request->input('q3');
            $q4 = $request->input('q4');
            $q5 = $request->input('q5');
            $numerical = $q1 + $q2 + $q3 + $q4 + $q5;

            if ($numerical >= 95.0 && $numerical <= 100) {
                $equivalent = "Excellent";
            } elseif ($numerical >= 89.0 && $numerical <= 94.5) {
                $equivalent = "Outstanding";
            } elseif ($numerical >= 83.0 && $numerical <= 88.9) {
                $equivalent = "Very Satisfactory";
            } elseif ($numerical >= 77.0 && $numerical <= 82.9) {
                $equivalent = "Satisfactory";
            } elseif ($numerical >= 75.0 && $numerical <= 76.9) {
                $equivalent = "Fair";
            } else {
                $equivalent = "Poor/Failed";
            }
            date_default_timezone_set('Asia/Manila');
            $titleEvaluation->evaluator = $evaluator;
            $titleEvaluation->groupName = $groupName;
            $titleEvaluation->capstoneTitle = $capstoneTitle;
            $titleEvaluation->section = $evalsection;
            $titleEvaluation->course = $evalcourse;
            $titleEvaluation->Q1 = $q1;
            $titleEvaluation->Q2 = $q2;
            $titleEvaluation->Q3 = $q3;
            $titleEvaluation->Q4 = $q4;
            $titleEvaluation->Q5 = $q5;
            $titleEvaluation->numerical = $numerical;
            $titleEvaluation->equivalent = $equivalent;
            $titleEvaluation->save();

            return redirect('home/' . $courses->Coursename . '/' . $section->Sectionname . '/' . $group->name . '/title_evalutaion/result')->with(['group' => $group, 'member' => $member, 'courses' => $courses, 'section' => $section]);
        }
    }

    public function viewFinalEval($course_name, $section_name, $group_name)
    {
        $courses = Course::where('Coursename', $course_name)->where('status', 1)->first();
        $section = Section::where('Sectionname', $section_name)->where('status', 1)->first();
        $group = GroupModel::where('name', $group_name)->where('status', 1)->first();


        if ($group && $section && $courses) {
            $member = Student::where('course', $courses->Coursename)
                ->where('section', $section->Sectionname)
                ->where('group', $group->name)
                ->where('status', 1)
                ->orderBy('lastname', 'ASC')
                ->get();

            $individual = Student::where('course', $courses->Coursename)
                ->where('section', $section->Sectionname)
                ->where('group', $group->name)
                ->where('status', 1)
                ->orderBy('lastname', 'ASC')
                ->get();
            return view('evaluation.final_evaluation', compact('group', 'member', 'courses', 'section', 'individual'));
        }
    }

    public function storeFinalEval(Request $request, $course_name, $section_name, $group_name)
    {
        $courses = Course::where('Coursename', $course_name)->where('status', 1)->first();
        $section = Section::where('Sectionname', $section_name)->where('status', 1)->first();
        $group = GroupModel::where('name', $group_name)->where('status', 1)->first();

        if ($courses && $section && $group) {
            $member = Student::where('course', $courses->Coursename)
                ->where('section', $section->Sectionname)
                ->where('group', $group->name)
                ->where('status', 1)->get();

            $finalEvaluation = new finalEvalproposal();

            $evaluator = Auth::user()->name;
            $groupName = $group->name;
            $capstoneTitle = $group->capstoneTitle;
            $evalsection = $section->Sectionname;
            $evalcourse = $courses->Coursename;

            $lastname = $request->input('name');
            $grade = $request->input('grade');


            foreach ($lastname as $key => $n) {
                DB::table('student')->where('id', $lastname[$key])->update(array('finalProposalGrade' => $grade[$key]));
            }

            $recommendation = $request->input('recommendation');

            $finalEvaluation->evaluator = $evaluator;
            $finalEvaluation->groupName = $groupName;
            $finalEvaluation->capstoneTitle = $capstoneTitle;
            $finalEvaluation->section = $evalsection;
            $finalEvaluation->course = $evalcourse;
            $finalEvaluation->recommendation = $recommendation;

            $chapter1 = $request->input('CH1Q1') + $request->input('CH1Q2') + $request->input('CH1Q3') + $request->input('CH1Q4') + $request->input('CH1Q5') + $request->input('CH1Q6') + $request->input('CH1Q7') + $request->input('CH1Q8');
            $chapter2 = $request->input('CH2Q1') + $request->input('CH2Q2') + $request->input('CH2Q3') + $request->input('CH2Q4') + $request->input('CH2Q5') + $request->input('CH2Q6') + $request->input('CH2Q7') + $request->input('CH2Q8') + $request->input('CH2Q9');
            $chapter3 = $request->input('CH3Q1') + $request->input('CH3Q2') + $request->input('CH3Q3') + $request->input('CH3Q4') + $request->input('CH3Q5') + $request->input('CH3Q6') + $request->input('CH3Q7') + $request->input('CH3Q8') + $request->input('CH3Q9') + $request->input('CH3Q10') + $request->input('CH3Q11');
            $chapter4 = $request->input('CH4Q1') + $request->input('CH4Q2') + $request->input('CH4Q3') + $request->input('CH4Q4') + $request->input('CH4Q5') + $request->input('CH4Q6') + $request->input('CH4Q7') + $request->input('CH4Q8') + $request->input('CH4Q9');
            $chapter5 = $request->input('CH5Q1') + $request->input('CH5Q2') + $request->input('CH5Q3');

            $totalScore = $chapter1 + $chapter2 + $chapter3 + $chapter4 + $chapter5;

            $meanScore = $totalScore / 160 * 100;



            //CHAPTER 1
            $finalEvaluation->CH1Q1 = $request->input('CH1Q1');
            $finalEvaluation->CH1Q2 = $request->input('CH1Q2');
            $finalEvaluation->CH1Q3 = $request->input('CH1Q3');
            $finalEvaluation->CH1Q4 = $request->input('CH1Q4');
            $finalEvaluation->CH1Q5 = $request->input('CH1Q5');
            $finalEvaluation->CH1Q6 = $request->input('CH1Q6');
            $finalEvaluation->CH1Q7 = $request->input('CH1Q7');
            $finalEvaluation->CH1Q8 = $request->input('CH1Q8');

            //CHAPTER 2
            $finalEvaluation->CH2Q1 = $request->input('CH2Q1');
            $finalEvaluation->CH2Q2 = $request->input('CH2Q2');
            $finalEvaluation->CH2Q3 = $request->input('CH2Q3');
            $finalEvaluation->CH2Q4 = $request->input('CH2Q4');
            $finalEvaluation->CH2Q5 = $request->input('CH2Q5');
            $finalEvaluation->CH2Q6 = $request->input('CH2Q6');
            $finalEvaluation->CH2Q7 = $request->input('CH2Q7');
            $finalEvaluation->CH2Q8 = $request->input('CH2Q8');
            $finalEvaluation->CH2Q9 = $request->input('CH2Q9');

            //CHAPTER 3
            $finalEvaluation->CH3Q1 = $request->input('CH3Q1');
            $finalEvaluation->CH3Q2 = $request->input('CH3Q2');
            $finalEvaluation->CH3Q3 = $request->input('CH3Q3');
            $finalEvaluation->CH3Q4 = $request->input('CH3Q4');
            $finalEvaluation->CH3Q5 = $request->input('CH3Q5');
            $finalEvaluation->CH3Q6 = $request->input('CH3Q6');
            $finalEvaluation->CH3Q7 = $request->input('CH3Q7');
            $finalEvaluation->CH3Q8 = $request->input('CH3Q8');
            $finalEvaluation->CH3Q9 = $request->input('CH3Q9');
            $finalEvaluation->CH3Q10 = $request->input('CH3Q10');
            $finalEvaluation->CH3Q11 = $request->input('CH3Q11');

            //CHAPTER 4
            $finalEvaluation->CH4Q1 = $request->input('CH4Q1');
            $finalEvaluation->CH4Q2 = $request->input('CH4Q2');
            $finalEvaluation->CH4Q3 = $request->input('CH4Q3');
            $finalEvaluation->CH4Q4 = $request->input('CH4Q4');
            $finalEvaluation->CH4Q5 = $request->input('CH4Q5');
            $finalEvaluation->CH4Q6 = $request->input('CH4Q6');
            $finalEvaluation->CH4Q7 = $request->input('CH4Q7');
            $finalEvaluation->CH4Q8 = $request->input('CH4Q8');
            $finalEvaluation->CH4Q9 = $request->input('CH4Q9');

            //CHAPTER 5
            $finalEvaluation->CH5Q1 = $request->input('CH5Q1');
            $finalEvaluation->CH5Q2 = $request->input('CH5Q2');
            $finalEvaluation->CH5Q3 = $request->input('CH5Q3');

            $finalEvaluation->overallScore = $totalScore;
            $finalEvaluation->meanScore = $meanScore;

            // return $meanScore;
            $finalEvaluation->save();

            return redirect('home/' . $courses->Coursename . '/' . $section->Sectionname . '/' . $group->name . '/final_evaluation/result')->with(['group' => $group, 'member' => $member, 'courses' => $courses, 'section' => $section]);
        }
    }

    public function viewOralEval($course_name, $section_name, $group_name)
    {
        $courses = Course::where('Coursename', $course_name)->where('status', 1)->first();
        $section = Section::where('Sectionname', $section_name)->where('status', 1)->first();
        $group = GroupModel::where('name', $group_name)->where('status', 1)->first();

        if ($group && $section && $courses) {
            $member = Student::where('course', $courses->Coursename)
                ->where('section', $section->Sectionname)
                ->where('group', $group->name)
                ->where('status', 1)
                ->orderBy('lastname', 'ASC')
                ->get();

            $individual = Student::where('course', $courses->Coursename)
                ->where('section', $section->Sectionname)
                ->where('group', $group->name)
                ->where('status', 1)
                ->orderBy('lastname', 'ASC')
                ->get();
            return view('evaluation.oral_evaluation', compact('group', 'member', 'courses', 'section', 'individual'));
        }
    }

    public function storeOralEval(Request $request, $course_name, $section_name, $group_name)
    {
        $courses = Course::where('Coursename', $course_name)->where('status', 1)->first();
        $section = Section::where('Sectionname', $section_name)->where('status', 1)->first();
        $group = GroupModel::where('name', $group_name)->where('status', 1)->first();

        if ($courses && $section && $group) {
            $member = Student::where('course', $courses->Coursename)
                ->where('section', $section->Sectionname)
                ->where('group', $group->name)
                ->where('status', 1)->get();

            $oralEvaluation = new oralEvaluation();

            $evaluator = Auth::user()->name;
            $groupName = $group->name;
            $capstoneTitle = $group->capstoneTitle;
            $evalsection = $section->Sectionname;
            $evalcourse = $courses->Coursename;

            $lastname = $request->input('name');
            $grade = $request->input('grade');


            foreach ($lastname as $key => $n) {
                DB::table('student')->where('id', $lastname[$key])->update(array('oralProposalGrade' => $grade[$key]));
            }

            $recommendation = $request->input('recommendation');

            $oralEvaluation->evaluator = $evaluator;
            $oralEvaluation->groupName = $groupName;
            $oralEvaluation->capstoneTitle = $capstoneTitle;
            $oralEvaluation->section = $evalsection;
            $oralEvaluation->course = $evalcourse;
            $oralEvaluation->recommendation = $recommendation;

            $chapter1 = $request->input('CH1Q1') + $request->input('CH1Q2') + $request->input('CH1Q3') + $request->input('CH1Q4') + $request->input('CH1Q5') + $request->input('CH1Q6') + $request->input('CH1Q7') + $request->input('CH1Q8');
            $chapter2 = $request->input('CH2Q1') + $request->input('CH2Q2') + $request->input('CH2Q3') + $request->input('CH2Q4') + $request->input('CH2Q5') + $request->input('CH2Q6') + $request->input('CH2Q7') + $request->input('CH2Q8') + $request->input('CH2Q9');
            $chapter3 = $request->input('CH3Q1') + $request->input('CH3Q2') + $request->input('CH3Q3') + $request->input('CH3Q4') + $request->input('CH3Q5') + $request->input('CH3Q6') + $request->input('CH3Q7') + $request->input('CH3Q8') + $request->input('CH3Q9') + $request->input('CH3Q10') + $request->input('CH3Q11');

            $totalScore = $chapter1 + $chapter2 + $chapter3;

            $meanScore = $totalScore / 112 * 100;



            //CHAPTER 1
            $oralEvaluation->CH1Q1 = $request->input('CH1Q1');
            $oralEvaluation->CH1Q2 = $request->input('CH1Q2');
            $oralEvaluation->CH1Q3 = $request->input('CH1Q3');
            $oralEvaluation->CH1Q4 = $request->input('CH1Q4');
            $oralEvaluation->CH1Q5 = $request->input('CH1Q5');
            $oralEvaluation->CH1Q6 = $request->input('CH1Q6');
            $oralEvaluation->CH1Q7 = $request->input('CH1Q7');
            $oralEvaluation->CH1Q8 = $request->input('CH1Q8');

            //CHAPTER 2
            $oralEvaluation->CH2Q1 = $request->input('CH2Q1');
            $oralEvaluation->CH2Q2 = $request->input('CH2Q2');
            $oralEvaluation->CH2Q3 = $request->input('CH2Q3');
            $oralEvaluation->CH2Q4 = $request->input('CH2Q4');
            $oralEvaluation->CH2Q5 = $request->input('CH2Q5');
            $oralEvaluation->CH2Q6 = $request->input('CH2Q6');
            $oralEvaluation->CH2Q7 = $request->input('CH2Q7');
            $oralEvaluation->CH2Q8 = $request->input('CH2Q8');
            $oralEvaluation->CH2Q9 = $request->input('CH2Q9');

            //CHAPTER 3
            $oralEvaluation->CH3Q1 = $request->input('CH3Q1');
            $oralEvaluation->CH3Q2 = $request->input('CH3Q2');
            $oralEvaluation->CH3Q3 = $request->input('CH3Q3');
            $oralEvaluation->CH3Q4 = $request->input('CH3Q4');
            $oralEvaluation->CH3Q5 = $request->input('CH3Q5');
            $oralEvaluation->CH3Q6 = $request->input('CH3Q6');
            $oralEvaluation->CH3Q7 = $request->input('CH3Q7');
            $oralEvaluation->CH3Q8 = $request->input('CH3Q8');
            $oralEvaluation->CH3Q9 = $request->input('CH3Q9');
            $oralEvaluation->CH3Q10 = $request->input('CH3Q10');
            $oralEvaluation->CH3Q11 = $request->input('CH3Q11');


            $oralEvaluation->overallScore = $totalScore;
            $oralEvaluation->meanScore = $meanScore;

            // return $meanScore;
            $oralEvaluation->save();

            return redirect('home/' . $courses->Coursename . '/' . $section->Sectionname . '/' . $group->name . '/oral_evaluation/result')->with(['group' => $group, 'member' => $member, 'courses' => $courses, 'section' => $section]);
        }
    }
}
