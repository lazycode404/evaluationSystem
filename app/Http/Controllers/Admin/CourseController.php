<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $course = Course::orderBy('id', 'desc')->get();
        return view('admin.course', compact('course'));
    }

    public function store(Request $request)
    {
        $course = new Course();

        $courseName = $request->input('coursename');
        $courseDesc = $request->input('coursedesc');

        if (Course::where('Coursename', '=', $courseName)->first()) {
            return redirect()->back()->with('error', 'Course is already exist!');
        } else {
            date_default_timezone_set('Asia/Manila');
            $course->Coursename = $courseName;
            $course->description = $courseDesc;
            $course->save();
            return redirect('admin/course')->with('success', 'Course Added Successfully!');
        }
    }

    public function courseupdateStatus(Request $request)
    {
        $course = Course::findOrFail($request->courseID);
        $course->status = $request->status;
        $course->save();

        return response()->json(['message' => 'Course status updated successfully.']);
    }

    public function courseupdateData(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $course = Course::findOrFail($request->input('courseID'));

        $courseName = $request->input('coursename');
        $courseDesc = $request->input('coursedesc');

        $course->Coursename = $courseName;
        $course->description = $courseDesc;
        $course->save();
        return redirect('admin/course')->with('success', 'Course Update Successfully!');
    }
}
