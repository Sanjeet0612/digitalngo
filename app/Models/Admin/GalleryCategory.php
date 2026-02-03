<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    use HasFactory;

    protected $table = 'tb_gallery_category';

    protected $fillable = [
        'cat_name',   // tb_gallery_category id
        'gtype',     // photo / video
        'path',          // image / video path    
        'status',
    ];
}
