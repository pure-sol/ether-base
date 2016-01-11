<?php

namespace Puresolcom\Etherbase\App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Puresolcom\Etherbase\App\Http\Requests;
use Puresolcom\Etherbase\App\Http\Controllers\Controller;
use Flash;

class HomeController extends Controller
{

    public function index() {

        $page_title = "Home";
        $page_description = "This is the home page";

        return view('home', compact('page_title', 'page_description'));
    }

}
