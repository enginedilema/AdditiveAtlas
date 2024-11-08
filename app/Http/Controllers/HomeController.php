<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Additive;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $additives = Additive::all();
       //    dd($additives[0]);
        return view('home', compact('additives'));
    }
}
