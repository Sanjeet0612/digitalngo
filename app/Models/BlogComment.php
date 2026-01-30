<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    use HasFactory;

    // Mass assignable fields
    protected $fillable = [
        'blog_id',
        'user_id',
        'comment',
        'status', // 1 = active, 0 = pending/blocked
        'parent_id',
    ];

    // Relationship: Comment belongs to a Blog
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    // Relationship: Comment belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')
                    ->select('id', 'name', 'profile_img'); // only these fields
    }

    // Self-referencing: Replies
    public function replies()
    {
        return $this->hasMany(BlogComment::class, 'parent_id');
    }

    // Self-referencing: Parent comment
    public function parent()
    {
        return $this->belongsTo(BlogComment::class, 'parent_id');
    }
}
