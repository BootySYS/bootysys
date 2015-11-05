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

    protected static function boot()
    {
        // TODO send email with randomly generated password
        Professor::created(function($professor) {
            $professor->university->user()->create([
                'name' => $professor->first_name . ' ' . $professor->last_name,
                'email' => $professor->email,
                'password' => bcrypt('1234'),
                'role' => 'professor'
            ]);
        });
    }

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
     * Get the professors title and full name.
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->title . ' ' . $this->first_name . ' ' . $this->last_name;
    }
}
