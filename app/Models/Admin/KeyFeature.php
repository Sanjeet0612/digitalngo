<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyFeature extends Model
{
    use HasFactory;

    protected $table = 'tb_key_features';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'phone',
        'icon_img',
        'status',
    ];
}
