<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerAsk extends Model
{
    use HasFactory;
    protected $fillable = [
        'res1',
        'res2',
        'res3',
        'ans1',
        'ans2',
        'ans3',
        'ask_id',
    ];
}
