<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polls extends Model
{
    use HasFactory;
    protected $table = 'poll_questions';
    protected $primaryKey = 'question_id';
    protected $fillable = ['status'];

}
