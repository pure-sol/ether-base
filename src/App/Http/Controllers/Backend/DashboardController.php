<?php

namespace Etherbase\App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Etherbase\App\Http\Requests;
use Etherbase\App\Http\Controllers\Controller;

class DashboardController extends Controller {

    /**
     * Create a new dashboard controller instance.
     *
     * @return void
     */
    public function __construct() {
        // Protect all dashboard routes. Users must be authenticated.
        $this->middleware('auth');
    }

    public function index() {
        return view('backend.views.dashboard.index');
    }

}
