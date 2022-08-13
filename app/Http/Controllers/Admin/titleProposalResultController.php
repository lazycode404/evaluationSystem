<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\titleEvaluation;
use Illuminate\Http\Request;

class titleProposalResultController extends Controller
{
    public function index()
    {
        
        $titleProposal = titleEvaluation::all();
        return view('admin.titleProposal', compact('titleProposal'));
    }

    public function viewresultBygroup($id)
    {
        $result = titleEvaluation::where('id',$id)->first();
        
        $member = Member::where('groupName',$result->groupName)->first();

        return view('admin.result.title_evaluation_result', compact('result','member'));
    }
}
