<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Causes extends Model
{
    use HasFactory;

    protected $table = 'tb_causes';

    protected $fillable = [
        'causes_cat_id',
        'couses_cat_name',
        'title',
        'slug',
        'name',
        'phone',
        'email',
        'tot_amt',
        'received_amt',
        'start_date',
        'end_date',
        'status',
    ];

    /**
     * Auto-generate slug on create
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($cause) {
            if (empty($cause->slug)) {
                $slug = Str::slug($cause->title);
                $count = self::where('slug', 'LIKE', "{$slug}%")->count();
                $cause->slug = $count ? "{$slug}-{$count}" : $slug;
            }
        });
    }

    /**
     * Relationship: Cause belongs to Category
     */
    public function category()
    {
        return $this->belongsTo(CausesCategory::class, 'causes_cat_id');
    }
}
