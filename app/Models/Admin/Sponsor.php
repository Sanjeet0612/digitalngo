<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;

    protected $table = 'tb_sponsors';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'state',
        'city',
        'zipcode',
        'description',
        'logo',
        'website',
        'sponsor_type',
        'status',
    ];
}
