<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use SoftDeletes;

    /**
     * The User that belong to the Notifications.
     */
    public function user()
    {
        return $this->belongsToMany('App\User', 'conditions', 'notification_id', 'user_id')
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
    protected $table = 'notifications';
}
