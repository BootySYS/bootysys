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

    /**
     * Courses, that the team has applied to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }

    /**
     * Groups, that the team has been applied to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany('App\Group');
    }
}
