<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'tb_contact';

    protected $fillable = [
        'phone',
        'emailid',
        'workingDays',
        'officeTime',
        'address',
        'short_desc',
        'city',
        'state',
        'zipcode',
        'country',
        'fb_link',
        'twitter_link',
        'insta_link',
        'behance_link',
        'youtube_link',
        'copyright',
        'created_by',
        'created_by_url',
        'status',
    ];
}
