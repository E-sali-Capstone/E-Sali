<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollChoicesModel extends Model
{
    use HasFactory;
    protected $table = 'poll_choices';
    protected $primaryKey = 'choice_id';
    protected $fillable = ['choice' , 'responses' ,  'question_id' , 'created_by'];
}
