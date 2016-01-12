<?php

namespace Etherbase\App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;

class PostRepository extends Repository {

    public function model() {
        return '\Etherbase\App\Models\Post';
    }

}
