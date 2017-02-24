<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Period extends Model
{
    use SoftDeletes;

    /**
     * The Courses that has a Period.
     */
    public function evaluations()
    {
        return $this->hasMany('App\Course', 'period_id', 'id');
    }

    /**
     * The Plans that has a Period.
     */
    public function plans()
    {
        return $this->hasMany('App\Plan', 'period_id', 'id');
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
    protected $table = 'periods';
}
