<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // Mass assignable fields
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'author',
        'category',
        'tags',
        'description',
        'bgimage',
        'authimage',
        'is_verified',
        'status',
    ];

    // Relation: Blog belongs to User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')
                    ->select('id', 'name', 'profile_img'); // only these fields
    }

    // Optional: auto-generate slug when creating a blog
    protected static function booted()
    {
        static::creating(function ($blog) {
            if(!$blog->slug) {
                $blog->slug = \Illuminate\Support\Str::slug($blog->title) . '-' . \Illuminate\Support\Str::random(6);
            }
        });
    }
    

}
