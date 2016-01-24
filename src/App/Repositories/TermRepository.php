<?php

namespace Etherbase\App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;

class TermRepository extends Repository {

    public function model() {
        return '\Etherbase\App\Models\Term';
    }

}
