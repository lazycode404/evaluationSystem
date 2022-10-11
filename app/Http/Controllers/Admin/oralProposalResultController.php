<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\oralEvaluation;
use App\Models\Student;
use Illuminate\Http\Request;

class oralProposalResultController extends Controller
{
    public function index()
    {
        $oralEvaluation = oralEvaluation::all();
        return view('adviser.oral_evaluation', compact('oralEvaluation'));
    }

    public function viewresultBygroup($id)
    {
        $result = oralEvaluation::where('id',$id)->first();

        $member = Student::where('group', $result->groupName)->get();

        return view('adviser.result.oral_evaluation_result', compact('result','member'));
    }
}
