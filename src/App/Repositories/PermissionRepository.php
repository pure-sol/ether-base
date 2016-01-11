<?php namespace Puresolcom\Etherbase\App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;

class PermissionRepository extends Repository {

    public function model()
    {
        return 'Puresolcom\Etherbase\App\Models\Permission';
    }

}
