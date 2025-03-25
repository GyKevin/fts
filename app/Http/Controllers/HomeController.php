<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $festivals = \App\Models\Festival::all();
        $search = request('search');
        if ($search) {
            $festivals = \App\Models\Festival::where('festival_name', 'like', "%$search%")->get();
        }
        return view('home', compact('festivals'));
    }
}
