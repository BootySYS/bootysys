<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name'
    ];

    /**
     * A team has members, which are students.
     *
     * @return $this
     */
    public function members()
    {
        return $this->belongsToMany('App\Student')
                    ->withPivot('role');
    }

    /**
     * A team always belongs to fuckin' university.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function university()
    {
        return $this->belongsTo('App\University');
    }

    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    public function groups()
    {
        return $this->hasMany('App\Group');
    }
}
