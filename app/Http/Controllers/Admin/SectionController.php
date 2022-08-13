<?php

namespace App\Http\Controllers\Admin;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;

class SectionController extends Controller
{
    public function index()
    {
        $section = Section::orderBy('Sectionname','ASC')->get();
        $course = Course::where('status',1)->get();
        $courses = Course::where('status',1)->get();
        return view('admin.section', compact('section','course','courses'));
    }

    public function store(Request $request)
    {
        $section = new Section();

        $sectionName = $request->input('sectionname');
        $sectionDesc = $request->input('sectiondesc');
        $sectionCourse = $request->input('sectioncourse');

        if(Section::where('Sectionname','=',$sectionName)->first())
        {
            return redirect()->back()->with('error', 'Section is already exist!');
        }
        else
        {
            date_default_timezone_set('Asia/Manila');
            $section->Sectionname = $sectionName;
            $section->description = $sectionDesc;
            $section->sectionCourse = $sectionCourse;
            $section->save();
            return redirect('admin/section')->with('success','Section Added Successfully!');
        }
    }
    
    public function sectionupdateStatus(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $section = Section::findOrFail($request->sectionID);
        $section->status = $request->status;
        $section->save();
    
        return response()->json(['message' => 'Section status updated successfully.']);
    }

    public function sectionupdateData(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $section = Section::findOrFail($request->input('sectionID'));

        $sectionname = $request->input('editSectionname');
        $sectiondesct = $request->input('editSectiondesc');
        $sectioncourse = $request->input('editsectioncourse');

        $section->Sectionname = $sectionname;
        $section->description = $sectiondesct;
        $section->sectionCourse = $sectioncourse;
        $section->save();

        return redirect('admin/section')->with('success','Section Update Successfully!');
    }
}
