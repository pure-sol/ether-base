<?php namespace Etherbase\App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;

class PermissionRepository extends Repository {

    public function model()
    {
        return 'Etherbase\App\Models\Permission';
    }

}
