<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'category',
        'department',
        'questions',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'answer',
        'code_snippets',
        'answer_explanation',
        'video_link',
        'image_to_question',
    ];
}
