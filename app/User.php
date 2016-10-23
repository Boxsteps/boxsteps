<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'second_name', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Role relationship for Users
     */
    public function role()
    {
        return $this->belongsTo('App\Role', 'role_id', 'id');
    }

    /**
     * The User that has a Messages sent.
     */
    public function messages_sent()
    {
        return $this->hasOne('App\Message', 'user_id', 'id');
    }

    /**
     * Messages received relationship for Users
     */
    public function messages_received()
    {
        return $this->belongsToMany('App\Message', 'conditions', 'user_id', 'message_id')
            ->withPivot('state_id')
            ->withTimestamps();
    }

    /**
     * Plans relationship for Users
     */
    public function plans()
    {
        return $this->belongsToMany('App\Plan', 'conditions', 'user_id', 'plan_id')
            ->withPivot('state_id')
            ->withTimestamps();
    }

    /**
     * Notifications relationship for Users
     */
    public function notifications()
    {
        return $this->belongsToMany('App\Notification', 'conditions', 'user_id', 'notification_id')
            ->withPivot('state_id')
            ->withTimestamps();
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
    protected $table = 'users';
}
