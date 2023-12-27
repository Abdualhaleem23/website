<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerStudent extends Model
{
    use HasFactory;
    protected $fillable = [
        'ask',
        'answer',
        'ask_id',
        'student_id',
        'answer_id',
        'number_ask'
    ];
}
