<?php

namespace Etherbase\App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;

class TermTaxonomyRelationshipsRepository extends Repository {

    public function model() {
        return '\Etherbase\App\Models\TermTaxonomyRelationships';
    }

}
