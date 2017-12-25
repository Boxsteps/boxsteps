<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConceptualSection extends Model
{
    use SoftDeletes;

    /**
     * Knowledge Area relationship for Conceptual Sections
     */
    public function knowledge_area()
    {
        return $this->belongsTo('App\KnowledgeArea', 'knowledge_area_id', 'id');
    }

    /**
     * The Plans that has a Conceptual Section.
     */
    public function plans()
    {
        return $this->hasMany('App\Plan', 'conceptual_section_id', 'id');
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
    protected $table = 'conceptual_sections';
}
