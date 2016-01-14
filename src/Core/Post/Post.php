<?php

namespace Etherbase\Core\Post;

use Etherbase\App\Repositories\PostRepository;
use Event;
use Plugin;

class Post {

    protected $post;

    public function __construct(PostRepository $post) {
        $this->post = $post;
    }

    public function insert_post($attrs) {

        $attrs = Plugin::apply_filters('post_create', $attrs);
        return $this->post->create($attrs);
    }

    public function getById($id) {
        return $this->post->find($id);
    }

}
