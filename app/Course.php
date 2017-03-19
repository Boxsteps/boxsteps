<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    /**
     * User relationship for Courses
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    /**
     * Period relationship for Courses
     */
    public function period()
    {
        return $this->belongsTo('App\Period', 'period_id', 'id');
    }

    /**
     * The Evaluations that has a Course.
     */
    public function evaluations()
    {
        return $this->hasMany('App\Evaluation', 'course_id', 'id');
    }

    /**
     * The Plans that has a Course.
     */
    public function plans()
    {
        return $this->hasMany('App\Plan', 'course_id', 'id');
    }

    /**
     * The Students that belongs to the Course.
     */
    public function students()
    {
        return $this->belongsToMany('App\Student', 'groups', 'course_id', 'student_id');
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
    protected $table = 'courses';
}
