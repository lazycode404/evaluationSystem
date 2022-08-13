<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Member;
use App\Models\Section;
use App\Models\GroupModel;
use Illuminate\Http\Request;
use App\Models\titleEvaluation;
use Illuminate\Support\Facades\Auth;

class Result extends Controller
{
    public function submittedIndex($course_name, $section_name, $group_name)
    {
        $courses = Course::where('Coursename', $course_name)->where('status', 1)->first();
        $section = Section::where('Sectionname', $section_name)->where('status', 1)->first();
        $group = GroupModel::where('name', $group_name)->where('status', 1)->first();

        if ($group && $section && $courses) {
            $member = Member::where('course', $courses->Coursename)
                ->where('section', $section->Sectionname)
                ->where('groupName', $group->name)
                ->where('status', 1)->first();
                
                return view('result.thankyou', compact('group', 'member', 'courses', 'section'));
        }
        
    }

    public function resultIndex($course_name, $section_name, $group_name)
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
                
                return view('result.title_evaluation_result', compact('group', 'member', 'courses', 'section','viewbtnresult'));
        }
    }
}
