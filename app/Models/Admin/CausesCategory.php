<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CausesCategory extends Model
{
    use HasFactory;

    protected $table = 'tb_causes_category';

    protected $fillable = [
        'cat_name',
        'slug',
        'status',
    ];
}
