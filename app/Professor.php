<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email'
    ];

    /**
     * A professor works at an university.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function university()
    {
        return $this->belongsTo('App\University');
    }
}
