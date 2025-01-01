<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documentation;

class LandingController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $documentations = Documentation::all();

        return view(
            'tampilan',
            compact('documentations')
        );
    }
}
