<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    /**
     * The Evaluations that belongs to the Student.
     */
    public function evaluations()
    {
        return $this->belongsToMany('App\Evaluation', 'qualifications', 'student_id', 'evaluation_id')
            ->withPivot('qualification')
            ->withTimestamps();
    }

    /**
     * The Courses that belongs to the Student.
     */
    public function courses()
    {
        return $this->belongsToMany('App\Course', 'groups', 'course_id', 'student_id')
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
    protected $table = 'students';
}
