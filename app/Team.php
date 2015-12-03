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
}
