<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;
use App\Day;

class EventDay extends Model
{
    protected $fillable = [
        'event_id', 
        'day_id',
    ];

    public function events()
    {
        return $this->belongsTo(Event::class, 'event_id', 'id');
    }

    public function days()
    {
        return $this->belongsTo(Day::class, 'day_id', 'id');
    }
}
