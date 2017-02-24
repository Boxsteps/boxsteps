<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    /**
     * Message relationship for Sender (User)
     */
    public function sender()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    /**
     * The Recipients (Users) that belongs to the Message.
     */
    public function recipients()
    {
        return $this->belongsToMany('App\User', 'conditions', 'message_id', 'user_id')
            ->withPivot('state_id')
            ->withTimestamps();
    }

    /**
     * The Condition of the Message.
     */
    public function condition()
    {
        return $this->belongsToMany('App\State', 'conditions', 'message_id', 'state_id');
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
    protected $table = 'messages';
}
