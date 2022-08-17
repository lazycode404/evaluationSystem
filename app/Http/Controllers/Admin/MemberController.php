<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Member;
use App\Models\Section;
use App\Models\GroupModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function index()
    {
        $group = GroupModel::all();
        $groups = GroupModel::all();
        $section = Section::orderBy('Sectionname')->get();
        $course = Course::all();
        $member = Member::all();
        return view('adviser.member', compact('group','course','section','member','groups'));
    }

    public function store(Request $request)
    {
        $member = new Member();

        $membersName = $request->input('membersName');
        $groupName = $request->input('groupName');
        $memberCourse = DB::table('group')->where('name',$groupName)->value('course');
        $memberSection = DB::table('group')->where('name',$groupName)->value('section');

        if($membersName == '')
        {
            return redirect()->back()->with('error', 'Please fill out all required fields!');
        }
        elseif(Member::where('groupName','=',$groupName)->first())
        {
            return redirect()->back()->with('error', 'Group is already exist!');
        }
        else
        {
            date_default_timezone_set('Asia/Manila');
            $member->members = $membersName;
            $member->groupName = $groupName;
            $member->section = $memberSection;
            $member->course = $memberCourse;
            $member->save();
            return redirect('adviser/member')->with('success','Members Added Successfully!');
        }
    }

    public function memberupdateStatus(Request $request)
    {
        date_default_timezone_set('Asia/Manila');
        $member = Member::findOrFail($request->memberID);
        $member->status = $request->status;
        $member->save();
    
        return response()->json(['message' => 'Member status updated successfully.']);
    }

    public function memberDataUpdate(Request $request)
    {
        $member = Member::findOrFail($request->input('memberID'));

        $members = $request->input('editMembername');
        $memberGroup = $request->input('editGroupname');

        $member->members = $members;
        $member->groupName = $memberGroup;
        $member->save();
        return redirect('adviser/member')->with('success','Members Updated Successfully!');
    }
}
