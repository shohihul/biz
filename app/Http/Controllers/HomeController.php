<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;

class HomeController extends Controller
{
    public function index()
    {
        $destination = Destination::orderBy('id', 'asc')->get();

        return view('home.dashboard',
            compact(
                'destination'
            ));
    }
}
