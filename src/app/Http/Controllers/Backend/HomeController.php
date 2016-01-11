<?php

namespace Puresolcom\Etherbase\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

/**
 * HomeController
 *
 * @author Mohammed Anwar <m.anwar@pure-sol.com>
 */
class HomeController extends Controller {

    public function index() {
        return view('etherbase::backend/home');
    }

}
