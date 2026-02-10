<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CausesDonation extends Model
{
    use HasFactory;

    protected $table = 'tb_causes_donation';

    protected $fillable = [
        'causes_id',
        'donation_amt',
        'name',
        'email',
        'phone',
        'utr_number',
        'screenshot',
        'donation_date',
        'status',
    ];

    /**
     * Relation: Donation belongs to a Cause
     */
    public function cause()
    {
        return $this->belongsTo(Cause::class, 'causes_id');
    }
}
