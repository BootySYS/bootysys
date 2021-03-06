<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'type', 'name'
    ];

    public function getTypeAttribute($value)
    {
        return studly_case($value);
    }

    /**
     * A course has many groups.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->hasMany('App\Group');
    }

    /**
     * A course belongs to a module.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function module()
    {
        return $this->belongsTo('App\Module');
    }

    /**
     * A course has many teams, that apply to it.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applyingTeams()
    {
        return $this->belongsToMany('App\Team');
    }
}
