<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Threads extends Model
{
    use HasFactory;
    protected $table = 'forum_threads';
    protected $primaryKey = 'id';
    protected $fillable = ['title'];


}
