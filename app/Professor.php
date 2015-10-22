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

    /**
     * Professors are in charge for one or more modules.
     * Also, a module can be assigned to many professors.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function modules()
    {
        return $this->belongsToMany('App\Module');
    }

    /**
     * Get the user instance of the professor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
