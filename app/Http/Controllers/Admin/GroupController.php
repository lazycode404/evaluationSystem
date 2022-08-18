<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Section;
use App\Models\GroupModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    public function index()
    {
        $group = GroupModel::where('status', 1)->get();
        $section = Section::orderBy('Sectionname')->where('status', 1)->get();
        $section1 = Section::orderBy('Sectionname')->where('status', 1)->get();
        $course1 = Course::where('status', 1)->get();
        $course = Course::where('status', 1)->get();
        $archive = GroupModel::where('status', 0)->get();

        // return response()->json([
        //     'group'=> $group,
        // ]);
        return view('adviser.group', compact('group', 'section', 'course', 'section1', 'course1', 'archive'));
    }

    public function store(Request $request)
    {
        $group = new GroupModel();

        $groupName = $request->input('groupname');
        $capstoneTitle = $request->input('capstoneTitle');
        $groupSection = $request->input('groupsection');
        $groupCourse = $request->input('groupcourse');

        if (GroupModel::where('name', '=', $groupName)->first()) {
            return redirect()->back()->with('error', 'Group is already exist!');
        } else {
            date_default_timezone_set('Asia/Manila');
            $group->name = $groupName;
            $group->capstoneTitle = $capstoneTitle;
            $group->section = $groupSection;
            $group->course = $groupCourse;
            $group->save();
            return redirect('adviser/group')->with('success', 'Group Added Successfully!');
        }
    }

    public function groupupdateStatus(Request $request)
    {
        $ids = $request->ids;
        if ($ids == null) {
            return redirect('adviser/group')->with('error', 'Something Went Wrong!');
        } else {
            $grouptoArchive = DB::table('group')
                ->whereIn('id', $ids)
                ->update(['status' => 0]);

            if ($grouptoArchive) {
                return redirect('adviser/group')->with('success', 'Group Added to Archived!');
            } else {
                return redirect('adviser/group')->with('error', 'Something Went Wrong!');
            }
        }
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

        return redirect('adviser/group')->with('success', 'Group Update Successfully!');
    }

    public function searchGroupdata(Request $request)
    {
        $output = "";
        $group = GroupModel::where('name', 'Like', '%' . $request->search . '%')->where('status', '=', 0)->get();

        foreach ($group as $groups) {
            $output .=
                '<tr>
            <td>' . '<input type="checkbox" name="unarchiveIDS['.$groups->id.']"
            value="'.$groups->id.'">' . '</td>
            <td>' . $groups->name . '</td>
            <td>' . $groups->capstoneTitle . '</td>
            <td>' . $groups->section . '</td>
            <td>' . $groups->course . '</td>
            </tr>';
        }

        return response($output);
    }

    public function unarchive(Request $request)
    {
        $unarchiveIDS = $request->unarchiveIDS;
        if ($unarchiveIDS == null) {
            return redirect('adviser/group')->with('error', 'Something Went Wrong!');
        } else {
            $grouptoUnarchive = DB::table('group')
                ->whereIn('id', $unarchiveIDS)
                ->update(['status' => 1]);

            if ($grouptoUnarchive) {
                return redirect('adviser/group')->with('success', 'Group Retrieve to Archived!');
            } else {
                return redirect('adviser/group')->with('error', 'Something Went Wrong!');
            }
        }
    }
}
