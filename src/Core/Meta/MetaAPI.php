<?php

namespace Etherbase\Core\Meta;

use Etherbase\App\Repositories\UserMetaRepository;
use Etherbase\App\Repositories\PostMetaRepository;
use Etherbase\App\Libraries\EtherError;
use Plugin;

class MetaAPI {

    protected $userMetaRepository;
    protected $postMetaRepository;

    public function __construct(UserMetaRepository $userMetaRepository, PostMetaRepository $postMetaRepository) {
        $this->userMetaRepository = $userMetaRepository;
        $this->postMetaRepository = $postMetaRepository;
    }

}
