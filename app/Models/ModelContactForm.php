<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelContactForm extends Model
{
    use HasFactory;

    protected $table = 'tb_contact_data';

    protected $fillable = [
        'name',
        'phone',
        'email',
        'subject',
        'message',
        'status'
    ];
}
