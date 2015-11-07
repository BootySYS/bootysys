<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'name', 'short_name', 'description'
    ];

    protected $visible = [
        'id', 'name', 'short_name', 'description', 'professors', 'courses'
    ];

    /**
     * A module belongs to a university.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function university()
    {
        return $this->belongsTo('App\University');
    }

    /**
     * Professors are in charge for one or more modules.
     * Also, a module can be assigned to many professors.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function professors()
    {
        return $this->belongsToMany('App\Professor');
    }

    /**
     * A module has many courses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function courses()
    {
        return $this->hasMany('App\Course');
    }
}
