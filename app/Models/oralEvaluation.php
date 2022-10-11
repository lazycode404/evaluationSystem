<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oralEvaluation extends Model
{
    use HasFactory;
    protected $table = 'oral_evaluation';
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

        'overallScore',
        'meanScore'

    ];
}
