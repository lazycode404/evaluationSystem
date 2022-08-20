<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Member;
use App\Models\Section;
use App\Models\GroupModel;
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

            $member = Member::join('group','group.name','=', 'member.groupName')
            ->get(['group.name as Gname','member.groupName as mName','member.members','group.capstoneTitle','group.status as gStatus','member.status as mStatus']);
    
            return view('group', compact('courses', 'section','group','member'));
        }
    }

    public function viewGroupPost($course_name, $section_name, $group_name)
    {
        $courses = Course::where('Coursename', $course_name)->where('status', 1)->first();
        $section = Section::where('Sectionname', $section_name)->where('status', 1)->first();
        $group = GroupModel::where('name', $group_name)->where('status', 1)->first();
        $evaluator = Auth::user()->name;

        if ($group && $section && $courses) {
            $member = Member::where('course', $courses->Coursename)
                ->where('section', $section->Sectionname)
                ->where('groupName', $group->name)
                ->where('status', 1)->first();

                $viewbtnresult = titleEvaluation::where('evaluator',$evaluator)
                ->where('section',$section->Sectionname)
                ->where('groupName',$group->name)
                ->where('course',$courses->Coursename)
                ->where('capstoneTitle',$group->capstoneTitle)->first();

            return view('evaluation.index', compact('group', 'member', 'courses', 'section','viewbtnresult'));
        }
    }

    public function viewTitleEval($course_name, $section_name, $group_name)
    {
        $courses = Course::where('Coursename', $course_name)->where('status', 1)->first();
        $section = Section::where('Sectionname', $section_name)->where('status', 1)->first();
        $group = GroupModel::where('name', $group_name)->where('status', 1)->first();


        if ($group && $section && $courses) {
            $member = Member::where('course', $courses->Coursename)
                ->where('section', $section->Sectionname)
                ->where('groupName', $group->name)
                ->where('status', 1)->first();
            return view('evaluation.title_evaluation', compact('group', 'member', 'courses', 'section'));
        }
    }

    public function storeTitleEval(Request $request, $course_name, $section_name, $group_name)
    {
        $courses = Course::where('Coursename', $course_name)->where('status', 1)->first();
        $section = Section::where('Sectionname', $section_name)->where('status', 1)->first();
        $group = GroupModel::where('name', $group_name)->where('status', 1)->first();

        if ($courses && $section && $group) {
            $member = Member::where('course', $courses->Coursename)
                ->where('section', $section->Sectionname)
                ->where('groupName', $group->name)
                ->where('status', 1)->first();
            $titleEvaluation = new titleEvaluation();

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

            return redirect('home/' . $courses->Coursename . '/' . $section->Sectionname . '/' . $member->groupName . '/title_evalutaion/submitted')->with( ['group' => $group, 'member' => $member, 'courses' => $courses, 'section' => $section] );
            
        }
    }
}
