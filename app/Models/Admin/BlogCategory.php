<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $table = 'tb_blog_category';

    protected $fillable = [
        'cat_name',
        'status'
    ];
}
