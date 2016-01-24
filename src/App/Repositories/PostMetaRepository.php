<?php

namespace Etherbase\App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;

class PostMetaRepository extends Repository {

    public function model() {
        return '\Etherbase\App\Models\PostMeta';
    }

}
