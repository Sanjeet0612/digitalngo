<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'tb_gallery';

    protected $fillable = [
        'cat_id',
        'gtype',
        'path',
        'status',
    ];

    /**
     * Gallery belongs to Category
     */
    public function category()
    {
        return $this->belongsTo(GalleryCategory::class, 'cat_id');
    }
}
