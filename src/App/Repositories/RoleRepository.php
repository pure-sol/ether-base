<?php namespace Etherbase\App\Repositories;

use Bosnadev\Repositories\Eloquent\Repository;

class RoleRepository extends Repository{

    public function model()
    {
        return 'Etherbase\App\Models\Role';
    }

}
