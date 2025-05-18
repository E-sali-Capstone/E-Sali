<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqModel extends Model
{
    use HasFactory;
    protected $table = 'faqs';
    protected $primaryKey = 'faq_id';
    protected $fillable = ['question' , 'answer' , 'created_by'];
}
