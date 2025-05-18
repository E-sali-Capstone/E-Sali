<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollResponsesModel extends Model
{
    use HasFactory;
    protected $table = 'poll_responses';
    protected $primaryKey = 'response_id';
    protected $fillable = ['question_id' , 'choice_id' ,  'created_by'];
}
