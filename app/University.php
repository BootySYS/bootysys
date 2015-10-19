<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{

    protected $fillable = [
        'name',
        'contact_first_name',
        'contact_last_name',
        'email',
        'city',
        'state',
        'zip_code',
        'street'
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

    /**
     * A university offers many modules.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modules()
    {
        return $this->hasMany('App\Module');
    }
}
