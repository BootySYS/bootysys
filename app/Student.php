<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'major',
        'semester'
    ];

    /**
     * A student is enrolled in an university.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function university()
    {
        return $this->belongsTo('App\University');
    }


    /**
     * A student belongs to many groups.
     *
     * @return $this
     */
    public function groups()
    {
        return $this->belongsToMany('App\Group')
                    ->withPivot('role');
    }
}
