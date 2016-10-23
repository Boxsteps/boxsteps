<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluation extends Model
{
    use SoftDeletes;

    /**
     * The Students that belong to the Evaluation.
     */
    public function evaluations()
    {
        return $this->belongsToMany('App\Student', 'qualifications', 'evaluation_id', 'student_id')
            ->withPivot('qualification')
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
    protected $table = 'evaluations';
}
