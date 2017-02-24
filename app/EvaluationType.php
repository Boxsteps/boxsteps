<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvaluationType extends Model
{
    use SoftDeletes;

    /**
     * The Evaluation Scales that has a Evaluation Type.
     */
    public function evaluation_scales()
    {
        return $this->hasMany('App\EvaluationScale', 'evaluation_type_id', 'id');
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
    protected $table = 'evaluation_types';
}
