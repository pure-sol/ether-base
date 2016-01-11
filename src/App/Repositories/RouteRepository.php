<?php namespace Puresolcom\Etherbase\App\Repositories;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;

class RouteRepository extends Repository {

    public function model()
    {
        return 'Puresolcom\Etherbase\App\Models\Route';
    }

}
