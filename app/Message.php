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
     * The Recipients (Users) that belong to the Message.
     */
    public function recipients()
    {
        return $this->belongsToMany('App\User', 'conditions', 'message_id', 'user_id')
            ->withPivot('state_id')
            ->withTimestamps();
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
