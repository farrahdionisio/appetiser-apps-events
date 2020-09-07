<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\EventDay;

class Event extends Model
{
    protected $fillable = [
        'name', 
        'start_date',
        'end_date',
    ];

    public function event_days()
    {
        return $this->hasMany(EventDay::class, 'event_id', 'id');
    }

    public function store($params)
    {
        $event = self::updateOrCreate(
            [
                'start_date' => $params['start_date'],
                'end_date' => $params['end_date'],
            ],
            [
                'name' => $params['name'],
                'start_date' => $params['start_date'],
                'end_date' => $params['end_date']
            ]
        );

        $days = $params['days'];
        foreach($days as $day){
            $insert = [
                'event_id' => $event->id,
                'day_id' => $day
            ];
            EventDay::insert($insert);
        }

        return $event->toArray();
    }
}
