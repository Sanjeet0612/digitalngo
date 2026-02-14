<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialModel extends Model
{
    use HasFactory;

    protected $table = 'tb_testimonial';

    protected $fillable = [
        'name',
        'description',
        'profile_img',
        'status',
    ];
}
