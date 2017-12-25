<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluation extends Model
{
    use SoftDeletes;

    /**
     * The Students that belongs to the Evaluation.
     */
    public function students()
    {
        return $this->belongsToMany('App\Student', 'qualifications', 'evaluation_id', 'student_id')
            ->withPivot('qualification')
            ->withTimestamps();
    }

    /**
     * Course relationship for Evaluations
     */
    public function course()
    {
        return $this->belongsTo('App\Course', 'course_id', 'id');
    }

    /**
     * Evaluation Type relationship for Evaluations
     */
    public function evaluation_type()
    {
        return $this->belongsTo('App\EvaluationType', 'evaluation_type_id', 'id');
    }

    /**
     * Plan relationship for Evaluations
     */
    public function plan()
    {
        return $this->belongsTo('App\Plan', 'plan_id', 'id');
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
    protected $table = 'evaluations';
}
