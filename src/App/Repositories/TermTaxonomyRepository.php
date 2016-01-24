<?php

namespace Etherbase\App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;

class TermTaxonomyRepository extends Repository {

    public function model() {
        return '\Etherbase\App\Models\TermTaxonomy';
    }

}
