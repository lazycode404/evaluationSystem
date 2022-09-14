<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class finalEvalproposal extends Model
{
    use HasFactory;
    protected $table = 'final_eval_proposal';
    protected $fillable = [
        'evaluator',
        'groupName',
        'capstoneTitle',
        'section',
        'course',
        'recommendation',
        'CH1Q1',
        'CH1Q2',
        'CH1Q3',
        'CH1Q4',
        'CH1Q5',
        'CH1Q6',
        'CH1Q7',
        'CH1Q8',

        'CH2Q1',
        'CH2Q2',
        'CH2Q3',
        'CH2Q4',
        'CH2Q5',
        'CH2Q6',
        'CH2Q7',
        'CH2Q8',
        'CH2Q9',

        'CH3Q1',
        'CH3Q2',
        'CH3Q3',
        'CH3Q4',
        'CH3Q5',
        'CH3Q6',
        'CH3Q7',
        'CH3Q8',
        'CH3Q9',
        'CH3Q10',
        'CH3Q11',

        'CH4Q1',
        'CH4Q2',
        'CH4Q3',
        'CH4Q4',
        'CH4Q5',
        'CH4Q6',
        'CH4Q7',
        'CH4Q8',
        'CH4Q9',

        'CH5Q1',
        'CH5Q2',
        'CH5Q3',

        'overallScore',
        'meanScore'

    ];
}
