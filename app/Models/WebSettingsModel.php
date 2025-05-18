<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebSettingsModel extends Model
{
    use HasFactory;
    protected $table = 'websettings';
    protected $primaryKey = 'settings_id';
    protected $fillable = ['title' , 'description' , 'logo' , 'created_by' , 'contact_number' , 'email_address' , 'about' , 'address' , 'landing_page_bg'];
}
