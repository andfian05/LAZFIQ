<?php

namespace App\Http\Controllers;

use App\Models\CountInfaq;
use App\Models\CountZakat;
use App\Models\CountQurban;
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

        $czYears = CountZakat::query()
            ->selectRaw('YEAR(tanggal_cz) as year')
            ->distinct()
            ->orderBy('year', 'asc')
            ->get();

        $cqYears = CountQurban::query()
            ->selectRaw('YEAR(tanggal_cq) as year')
            ->distinct()
            ->orderBy('year', 'asc')
            ->get();

        return view(
            'home'
        )->with(
            [
                'cimonthsYears' => $cimonthsYears,
                'czYears' => $czYears,
                'cqYears' => $cqYears
            ]
        );
    }
}
