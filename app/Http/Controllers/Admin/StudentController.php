<?php

namespace App\Http\Controllers\admin;

use App\Models\Course;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\GroupModel;

class StudentController extends Controller
{
    public function index()
    {   
        $section = Section::orderBy('Sectionname')->where('status',1)->get();
        $course = Course::orderBy('Coursename')->where('status',1)->get();
        $student = Student::orderBy('group','ASC')
        ->orderBy('lastname','ASC')
        ->where('status',1)->get();
        $group = GroupModel::orderBy('name')->where('status',1)->get();
        $archived = Student::where('status',0)->get();

        $countArchived = Student::where('status',0)->count();

        $studentGroup = GroupModel::orderBy('name')->where('status',1)->get();
        $studentSection = Section::orderBy('Sectionname')->where('status',1)->get();
        $studentCourse = Course::orderBy('Coursename')->where('status',1)->get();

        return view('adviser.student', compact('countArchived','section','course','student','group','studentGroup','studentSection','studentCourse','archived'));
    }

    public function store(Request $request)
    {
        $student = new Student();

        $firstname = $request->input('firstName');
        $lastname = $request->input('lastName');
        $group = $request->input('group');
        $section = $request->input('section');
        $course = $request->input('course');

        $duplication = DB::table('student')
        ->where('firstname',$firstname)
        ->where('lastname',$lastname)
        ->first();

        if($duplication)
        {
            return redirect()->back()->with('error', 'Student is already exist!');
        }
        else
        {
            $student->firstname = $firstname;
            $student->lastname = $lastname;
            $student->group = $group;
            $student->section = $section;
            $student->course = $course;
            $student->save();
            return redirect('adviser/student')->with('success', 'Student Added Successfully!');
        }
    }
    public function studentupdateData(Request $request)
    {
        $student = Student::findOrFail($request->input('studentID'));

        $studentFirstname = $request->input('editFirstname');
        $studentLastname = $request->input('editLastname');
        $studentGroup = $request->input('editStudentGroup');
        $studentSection = $request->input('editStudentSection');
        $studentCourse = $request->input('editStudentCourse');

        $student->firstname = $studentFirstname;
        $student->lastname = $studentLastname;
        $student->group = $studentGroup;
        $student->section = $studentSection;
        $student->course = $studentCourse;

        $student->save();

        return redirect('adviser/student')->with('success', 'Student Update Successfully!');
    }
    public function studentupdateStatus(Request $request)
    {
        $ids = $request->ids;

        if($ids == null)
        {
            return redirect('adviser/student')->with('error', 'Please check the student you want to put in archived!');
        }
        else
        {
            $studentArchived = DB::table('student')
            ->whereIn('id',$ids)
            ->update(['status' => 0]);

            if($studentArchived)
            {
                return redirect('adviser/student')->with('success', 'Student Added to Archived!');
            }
            else
            {
                return redirect('adviser/student')->with('error', 'Something Went Wrong!');
            }
        }
    }

    public function unarchive(Request $request)
    {
        $unarchiveIDS = $request->unarchiveIDS;
        if ($unarchiveIDS == null) {
            return redirect('adviser/student')->with('error', 'Something Went Wrong!');
        } else {
            $studentUnarchived = DB::table('student')
                ->whereIn('id', $unarchiveIDS)
                ->update(['status' => 1]);

            if ($studentUnarchived) {
                return redirect('adviser/student')->with('success', 'Student Retrieve to Archived!');
            } else {
                return redirect('adviser/student')->with('error', 'Something Went Wrong!');
            }
        }
    }

    public function searchStudentdata(Request $request)
    {
        $output ="";

        $studentSearch = $request->search;

        if($studentSearch != '')
        {
            $student = Student::where(function($query) use ($studentSearch){
                $query->where('lastname', 'LIKE', '%' . $studentSearch . '%')
                ->orWhere('firstname', 'LIKE', '%' . $studentSearch . '%')
                ->orWhere('group', 'LIKE', '%' . $studentSearch . '%');
            })
            ->where('status',0)
            ->get();
        }
        else
        {
            $student = DB::table('student')->where('status', 0)->get();
        }

        $total = $student->count();

        if($total > 0)
        {
            foreach ($student as $students)
            {
                $output .=
                '<tr>
                <td>' . '<input type="checkbox" name="unarchiveIDS['.$students->id.']"
                value="'.$students->id.'">' . '</td>
                <td>' . $students->firstname . '</td>
                <td>' . $students->lastname . '</td>
                <td>' . $students->group . '</td>
                <td>' . $students->section . '</td>
                <td>' . $students->course . '</td>
                <td>' . $students->titleProposalGrade . '</td>
                <td>' . $students->oralProposalGrade . '</td>
                <td>' . $students->finalProposalGrade . '</td>
                </tr>';
            }
        }
        else
        {
            $output = 
            '<tr>
            <td class="text-center" colspan="9">Student records not found</td>
            </tr>';
        }

        return response($output);
    }
}
