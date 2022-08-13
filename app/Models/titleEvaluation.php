<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class titleEvaluation extends Model
{
    use HasFactory;
    protected $table = 'title_evaluation';
    protected $fillable = [
        'evaluator',
        'groupName',
        'capstoneTitle',
        'section',
        'course',
        'Q1',
        'Q2',
        'Q3',
        'Q4',
        'Q5',
        'numerical',
        'equivalent',
    ];
}
