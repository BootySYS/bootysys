<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    /**
     *
     *
     * @return $this
     */
    public function students()
    {
        return $this->belongsToMany('App\Student')
                    ->withPivot('role');
    }

    /**
     * A group is enrolled in possibly many courses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function courses()
    {
        return $this->belongsToMany('App\Course');
    }

}
