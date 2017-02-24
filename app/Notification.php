<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use SoftDeletes;

    /**
     * The User that belongs to the Notification.
     */
    public function user()
    {
        return $this->belongsToMany('App\User', 'conditions', 'notification_id', 'user_id')
            ->withPivot('state_id')
            ->withTimestamps();
    }

    /**
     * The Condition of the Notification.
     */
    public function condition()
    {
        return $this->belongsToMany('App\State', 'conditions', 'notification_id', 'state_id');
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
    protected $table = 'notifications';
}
