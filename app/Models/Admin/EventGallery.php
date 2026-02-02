<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventGallery extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'tb_event_gallery';

    // Fillable fields
    protected $fillable = [
        'event_id',
        'image',
        'position',
        'status'
    ];

    // Relationship with Event
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
