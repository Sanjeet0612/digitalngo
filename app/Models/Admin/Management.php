<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Management extends Model
{
    use HasFactory;

    // agar table ka naam tb_team hai
    protected $table = 'tb_management';

    protected $fillable = [
        'm_name',
        'slug',
        'designation',
        'emailid',
        'phone',
        'address',
        'city',
        'state',
        'zip_code',
        'fb_link',
        'twt_link',
        'insta_link',
        'description',
        'profile_img',
        'status'
    ];
}

