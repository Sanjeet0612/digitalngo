<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingModel extends Model
{
    use HasFactory;

    protected $table = 'tb_setting';

    protected $fillable = [
        'user_id',
        'ngoname',
        'ngologo',     // added
        'signature',   // added
        'email',
        'phone',
        'address',
        'city',
        'state',
        'zipcode',
    ];

    // Relation to User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
