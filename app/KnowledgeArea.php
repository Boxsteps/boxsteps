<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KnowledgeArea extends Model
{
    use SoftDeletes;

    /**
     * The Conceptual Sections that has a Knowledge Area.
     */
    public function conceptual_sections()
    {
        return $this->hasMany('App\ConceptualSection', 'knowledge_area_id', 'id');
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
    protected $table = 'knowledge_areas';
}
