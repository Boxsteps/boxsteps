<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feature extends Model
{
    use SoftDeletes;

    /**
     * The Roles that belong to the Feature.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'permissions', 'feature_id', 'role_id');
    }

    /**
     * The child Features that has to the Feature.
     */
    public function childs()
    {
        return $this->hasMany('App\Feature', 'feature_id', 'id');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'features';
}
