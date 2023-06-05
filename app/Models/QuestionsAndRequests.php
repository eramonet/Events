<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionsAndRequests extends Model
{
    use HasFactory;

    public $fillable = [
        "question_ar" ,
        "question_en" ,
        "answer_ar" ,
        "answer_en"
    ];
}
