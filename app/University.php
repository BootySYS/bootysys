<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{

    protected $fillable = [
        'name',
        'contact_first_name',
        'contact_last_name',
        'contact_email',
        'address'
    ];

    /**
     * A university has many students.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany('App\Student');
    }

    /**
     * A university also has many professors.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function professors()
    {
        return $this->hasMany('App\Professor');
    }

}
