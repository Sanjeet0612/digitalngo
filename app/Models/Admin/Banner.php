<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'tb_banner';

    protected $fillable = [
        'title', // new add here
        'subtitle', // new add here
        'joinus_link', // new add here
        'video_link',
        'image_link',
        'redirect_link',
        'status',
        'sort_order',
    ];
}
