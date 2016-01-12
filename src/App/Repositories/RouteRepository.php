<?php namespace Etherbase\App\Repositories;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

class RouteRepository extends Repository {

    public function model()
    {
        return 'Etherbase\App\Models\Route';
    }

}
