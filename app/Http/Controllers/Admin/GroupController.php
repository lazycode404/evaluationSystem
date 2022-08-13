<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\GroupModel;

class GroupController extends Controller
{
    public function index()
    {
        $group = GroupModel::all();
        $section = Section::orderBy('Sectionname')->where('status',1)->get();
        $section1 = Section::orderBy('Sectionname')->where('status',1)->get();
        $course1 = Course::where('status',1)->get();
        $course = Course::where('status',1)->get();
        return view('admin.group', compact('group','section','course','section1','course1'));
    }

    public function store(Request $request)
    {
        $group = new GroupModel();

        $groupName = $request->input('groupname');
        $capstoneTitle = $request->input('capstoneTitle');
        $groupSection = $request->input('groupsection');
        $groupCourse = $request->input('groupcourse');

        if(GroupModel::where('name','=',$groupName)->first())
        {
            return redirect()->back()->with('error', 'Group is already exist!');
        }
        else
        {
            date_default_timezone_set('Asia/Manila');
            $group->name = $groupName;
            $group->capstoneTitle = $capstoneTitle;
            $group->section = $groupSection;
            $group->course = $groupCourse;
            $group->save();
            return redirect('admin/group')->with('success','Group Added Successfully!');
        }
    }

    public function groupupdateStatus(Request $request)
    {
        $group = GroupModel::findOrFail($request->groupID);
        $group->status = $request->status;
        $group->save();
    
        return response()->json(['message' => 'Group status updated successfully.']);
    }

    public function groupupdateData(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $group = GroupModel::findOrFail($request->input('groupID'));

        $groupname = $request->input('editGroupname');
        $groupCapstoneTitle = $request->input('editcapstoneTitle');
        $groupsection = $request->input('editGroupSection');
        $groupcourse = $request->input('editgroupcourse');

        $group->name = $groupname;
        $group->capstoneTitle = $groupCapstoneTitle;
        $group->section = $groupsection;
        $group->course = $groupcourse;
        $group->save();

        return redirect('admin/group')->with('success','Group Update Successfully!');
    }
}
