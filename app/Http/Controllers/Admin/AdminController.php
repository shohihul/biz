<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $pageSlug ="dashboard";
        return view('Admin.dashboard',
            compact(
                'pageSlug',
            ));
    }
}
