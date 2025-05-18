<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Announcements extends Model
{
    use HasFactory;
    protected $table = 'announcements';
    protected $primaryKey = 'id';
    protected $fillable = ['title' , 'content' , 'valid_from' , 'valid_to' , 'announcement_status' , 'created_by' , 'category'];

    public function images(): HasMany
    {
        return $this->hasMany(AnnouncementsUploadModel::class);
    }

}
