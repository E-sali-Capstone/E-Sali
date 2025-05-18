<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryUploadModel extends Model
{
    use HasFactory;
    protected $table = 'gallery_images';
    protected $primaryKey = 'image_id';
    protected $fillable = ['file_name','created_by' , 'gallery_id'];
}
