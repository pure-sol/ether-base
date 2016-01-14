<?php

namespace Etherbase\App\Http\Controllers;

use Illuminate\Http\Request;
use Etherbase\App\Http\Requests;
use Etherbase\App\Http\Controllers\Controller;
use Flash;
use Plugin;

class HomeController extends Controller {

    public function index() {


        Plugin::add_filter('post_create', array($this, 'filter_test'), 9, 1);
        Plugin::add_filter('post_create', array($this, 'filter_test_again'), 8, 1);


//        \Post::insert_post([
//            'post_title' => 'dddd',
//            'post_content' => 'event test'
//        ]);


        $page_title = "Home";
        $page_description = "This is the home page";

        return view('home', compact('page_title', 'page_description'));
    }

    public function filter_test($attrs) {
        $attrs['post_title'] = $attrs['post_title'] . ' next ';
        return $attrs;
    }

    public function filter_test_again($attrs) {
        $attrs['post_title'] = $attrs['post_title'] . ' repeat ';
        return $attrs;
    }

}
