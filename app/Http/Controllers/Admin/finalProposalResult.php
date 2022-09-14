<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\finalEvalproposal;
use App\Http\Controllers\Controller;

class finalProposalResult extends Controller
{
    public function index()
    {
        $finalProposal = finalEvalproposal::all();
        return view('adviser.finalProposal', compact('finalProposal'));
    }

    public function viewresultBygroup($id)
    {
        $result = finalEvalproposal::where('id',$id)->first();

        $member = Student::where('group', $result->groupName)->get();

        return view('adviser.result.final_evaluation_result', compact('result','member'));
    }
}
