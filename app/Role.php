<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    /**
     * The Users that has a Role.
     */
    public function users()
    {
        return $this->hasMany('App\User', 'role_id', 'id');
    }

    /**
     * The Features that belong to the Role.
     */
    public function features()
    {
        return $this->belongsToMany('App\Feature', 'permissions', 'role_id', 'feature_id');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';
}
