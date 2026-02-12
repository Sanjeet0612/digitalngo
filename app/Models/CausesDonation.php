<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Causes;

class CausesDonation extends Model
{
    use HasFactory;

    protected $table = 'tb_causes_donation';

    protected $fillable = [
        'user_id',
        'causes_id',
        'donation_amt',
        'name',
        'email',
        'phone',
        'utr_number',
        'screenshot',
        'donation_date',
        'status',
        'is_paid',
    ];

    protected $attributes = [
        'is_paid' => 0,
    ];

    /**
     * Relation: Donation belongs to a Cause
     */
    public function cause()
    {
        return $this->belongsTo(Causes::class, 'causes_id');
    }
}
