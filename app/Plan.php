<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'procedimental_section', 'actitudinal_section', 'competences', 'indicators',
        'teaching_strategy', 'teaching_sequence', 'start_date', 'end_date',
        'period_id', 'course_id', 'conceptual_section_id'
    ];

    /**
     * The User that belongs to the Plan.
     */
    public function user()
    {
        return $this->belongsToMany('App\User', 'conditions', 'plan_id', 'user_id')
            ->withPivot('state_id')
            ->withTimestamps();
    }

    /**
     * Course relationship for Plans
     */
    public function course()
    {
        return $this->belongsTo('App\Course', 'course_id', 'id');
    }

    /**
     * Period relationship for Plans
     */
    public function period()
    {
        return $this->belongsTo('App\Period', 'period_id', 'id');
    }

    /**
     * Conceptual Section relationship for Plans
     */
    public function conceptual_section()
    {
        return $this->belongsTo('App\ConceptualSection', 'conceptual_section_id', 'id');
    }

    /**
     * The Resources that has a Plan.
     */
    public function resources()
    {
        return $this->hasMany('App\Resource', 'plan_id', 'id');
    }

    /**
     * The Condition of the Plan.
     */
    public function condition()
    {
        return $this->belongsToMany('App\State', 'conditions', 'plan_id', 'state_id');
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'start_date',
        'end_date'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'plans';
}
