<?php

namespace App\Http\Controllers;

use App\Models\CountInfaq;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cimonthsYears = CountInfaq::query()
            ->selectRaw('YEAR(tanggal_ci) as year, MONTH(tanggal_ci) as month')
            ->distinct()
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        return view(
            'home'
        )->with(
            [
                'cimonthsYears' => $cimonthsYears,
            ]
        );
    }
}
