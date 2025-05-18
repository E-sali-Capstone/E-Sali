<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportsUploadModel extends Model
{
    use HasFactory;
    protected $table = 'report_files';
    protected $primaryKey = 'file_id';
    protected $fillable = ['file_name','created_by' , 'reports_id'];
}
