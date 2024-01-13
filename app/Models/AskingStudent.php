<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AskingStudent extends Model
{
    use HasFactory;
    protected $fillable = [
        'ask',
        'show_hide',
        'classes',
        'type_ask',
    ];
}
