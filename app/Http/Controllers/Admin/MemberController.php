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
        $member = Member::where('status',1)->get();
        $archived = Member::where('status', 0)->get();
        
        return view('adviser.member', compact('group','course','section','member','groups','archived'));
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
        $ids = $request->ids;
        if($ids == null)
        {
            return redirect('adviser/member')->with('error', 'Please check the members you want to put in archived!');
        }
        else
        {
            $memberArchived = DB::table('member')
                            ->whereIn('id',$ids)
                            ->update(['status' => 0]);
            
            if($memberArchived)
            {
                return redirect('adviser/member')->with('success', 'Member Added to Archived!');
            }
            else
            {
                return redirect('adviser/member')->with('error', 'Something Went Wrong!');
            }
        }
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
    
    public function unarchived(Request $request)
    {
        $unarchivedIDS = $request->unarchivedIDS;
        if($unarchivedIDS == null)
        {
            return redirect('adviser/member')->with('error', 'Please check the members you want to put in archived!');
        }
        else
        {
            $memberUnarchived = DB::table('member')
                                ->whereIn('id', $unarchivedIDS)
                                ->update(['status' => 1]);
            
            if($memberUnarchived)
            {
                return redirect('adviser/member')->with('success', 'Member Retrieve to Archived!');
            }
            else
            {
                return redirect('adviser/member')->with('error', 'Something Went Wrong!');
            }
        }
    }

    public function searchMemberdata(Request $request)
    {
        $output = "";
        $member = Member::where('name', 'Like', '%' . $request->search . '%')->where('status', 0)->get();

        foreach($member as $members)
        {
            '<tr>
                <td></td>
                <td>' . $members->members . '</td>
                <td>' . $members->groupName . '</td>
                <td>' . $members->seection . '</td>
                <td>' . $members->course . '</td>
            </tr>';
        }
    }
}
