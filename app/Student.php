<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
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
    public function teams()
    {
        return $this->belongsToMany('App\Teams')
                    ->withPivot('role');
    }

    /**
     * Get the user instance of the student.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
