<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestDonation extends Model
{
    use HasFactory;

    protected $table = 'tb_guest_donation';

    protected $fillable = [
        'package_amt',
        'name',
        'phone',
        'email',
        'city',
        'state',
        'address',
        'pincode',
        'refrer_code',
        'status',
    ];
}
