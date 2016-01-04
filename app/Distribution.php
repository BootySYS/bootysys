<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    protected $fillable = [
        'event_key', 'started', 'finished'
    ];

    public function university()
    {
        return $this->belongsTo('App\University');
    }
}
