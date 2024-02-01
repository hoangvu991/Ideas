<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index() {
        // if(!Gate::allows('admin')) {
        //     abort(403);
        // }

        //authorize gate
        // $this->authorize('admin');

        return view('admin.dashboard');
    }
}
