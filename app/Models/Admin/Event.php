<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'tb_event';

    protected $fillable = [
        'title',
        'slug',
        'og_name',
        'og_email',
        'og_phone',
        'og_weblink',
        'description',
        'start_date',
        'end_date',
        'e_time',
        'location',
        'address',
        'city',
        'state',
        'zipcode',
        'location',
        'user_id',
        'sponsor_id',
        'banner',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
    ];
}
