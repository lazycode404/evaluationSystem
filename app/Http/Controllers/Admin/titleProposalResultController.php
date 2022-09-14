<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\titleEvaluation;
use App\Http\Controllers\Controller;

class titleProposalResultController extends Controller
{
    public function index()
    {
        
        $titleProposal = titleEvaluation::all();
        return view('adviser.titleProposal', compact('titleProposal'));
    }

    public function viewresultBygroup($id)
    {
        $result = titleEvaluation::where('id',$id)->first();
        
        $member = Student::where('group',$result->groupName)->get();

        return view('adviser.result.title_evaluation_result', compact('result','member'));
    }
}
