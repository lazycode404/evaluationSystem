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
use Illuminate\Support\Facades\Auth;

class Result extends Controller
{
    // public function submittedIndex($course_name, $section_name, $group_name)
    // {
    //     $courses = Course::where('Coursename', $course_name)->where('status', 1)->first();
    //     $section = Section::where('Sectionname', $section_name)->where('status', 1)->first();
    //     $group = GroupModel::where('name', $group_name)->where('status', 1)->first();

    //     if ($group && $section && $courses) {
    //         $member = Student::where('course', $courses->Coursename)
    //             ->where('section', $section->Sectionname)
    //             ->where('group', $group->name)
    //             ->where('status', 1)->first();

    //             return view('result.thankyou', compact('group', 'member', 'courses', 'section'));
    //     }
        
    // }

    public function resultIndex($course_name, $section_name, $group_name)
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
                
                $viewbtnresult = titleEvaluation::where('evaluator',$evaluator)
                ->where('section',$section->Sectionname)
                ->where('groupName',$group->name)
                ->where('course',$courses->Coursename)
                ->where('capstoneTitle',$group->capstoneTitle)->first();
                
                return view('result.title_evaluation_result', compact('group', 'member', 'courses', 'section','viewbtnresult'));
        }
    }

    public function finaleEvalResult($course_name, $section_name, $group_name)
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
                
                $viewbtnresultFinal = finalEvalproposal::where('evaluator',$evaluator)
                ->where('section',$section->Sectionname)
                ->where('groupName',$group->name)
                ->where('course',$courses->Coursename)
                ->where('capstoneTitle',$group->capstoneTitle)->first();
                
                return view('result.final_evaluation_result', compact('group', 'member', 'courses', 'section','viewbtnresultFinal'));
        }
    }

    public function oralEvalResult($course_name, $section_name, $group_name)
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
                
                $viewbtnOralResult = oralEvaluation::where('evaluator',$evaluator)
                ->where('section',$section->Sectionname)
                ->where('groupName',$group->name)
                ->where('course',$courses->Coursename)
                ->where('capstoneTitle',$group->capstoneTitle)->first();
                
            return view('result.oral_evaluation_result', compact('group', 'member', 'courses', 'section','viewbtnOralResult'));
        }
    }
}
