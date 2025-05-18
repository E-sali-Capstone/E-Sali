<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollQuestionModel extends Model
{
    use HasFactory;
    protected $table = 'poll_questions';
    protected $primaryKey = 'question_id';
    protected $fillable = ['question' , 'valid_to' ,  'valid_from' , 'created_by' , 'poll_title'];

}
