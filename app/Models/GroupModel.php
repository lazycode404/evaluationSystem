<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupModel extends Model
{
    protected $table = 'group';
    protected $fillable = [
        'name',
        'capstoneTitle',
        'section',
        'course'
    ];
}
