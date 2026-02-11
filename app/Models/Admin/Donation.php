<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

     protected $table = 'tb_guest_donation';

    protected $fillable = [
        'package_amt',
        'd_type',
        'name',
        'phone',
        'email',
        'city',
        'state',
        'address',
        'pincode',
        'refrer_code',
        'status',
        'causes',
        'pan_no',
    ];
}
