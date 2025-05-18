<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'gallery';
    protected $primaryKey = 'id';
    protected $fillable = ['title' , 'description' , 'created_by'];
}
