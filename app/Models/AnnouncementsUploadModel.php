<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncementsUploadModel extends Model
{
    use HasFactory;
    protected $table = 'announcement_images';
    protected $primaryKey = 'image_id';
    protected $fillable = ['file_name','created_by' , 'announcements_id'];
}
