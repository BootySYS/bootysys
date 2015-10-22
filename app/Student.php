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

    protected static function boot()
    {
        // TODO send email with randomly generated password
        Student::created(function($student) {
            $student->university->user()->create([
                'name' => $student->first_name . ' ' . $student->last_name,
                'email' => $student->email,
                'password' => bcrypt('1234'),
                'role' => 'professor'
            ]);
        });
    }

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
