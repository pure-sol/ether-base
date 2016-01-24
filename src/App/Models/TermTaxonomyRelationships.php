<?php

namespace Etherbase\App\Models;

use Illuminate\Database\Eloquent\Model;

class TermTaxonomyRelationships extends Model {

    protected $fillable = ['object_id', 'term_taxonomy_id'];

}
