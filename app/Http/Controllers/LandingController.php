<?php

namespace App\Http\Controllers;

use App\Models\PostInfaq;
use App\Models\PostZakat;
use App\Models\PostQurban;
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

    /**
     * Summary of landingInfaq
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function landingInfaq(Request $request)
    {
        $monthsYears = PostInfaq::query()
            ->selectRaw('YEAR(tanggal_pi) as year, MONTH(tanggal_pi) as month')
            ->distinct()
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        // Take month and year from input
        $monthYear = $request->input('month_year', '');

        // separate month and year
        $month = null;
        $year = null;

        if ($monthYear) {
            list($year, $month) = explode('-', $monthYear);
        }

        $infaqs = PostInfaq::query()
            ->when(
                $month && $year,
                function ($query) use ($month, $year) {
                    $query->whereYear('tanggal_pi', $year)
                        ->whereMonth('tanggal_pi', $month);
                }
            )
            ->paginate(3);

        return view(
            'pembaca.laporan.infaq',
            compact('infaqs', 'monthsYears')
        );
    }

    /**
     * Summary of landingZakat
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function landingZakat(Request $request)
    {
        $years = PostZakat::query()
            ->selectRaw('YEAR(tanggal_pz) as year')
            ->distinct()
            ->orderBy('year', 'asc')
            ->get();

        // Take year from input
        $year = $request->input('year', '');

        $zakats = PostZakat::query()
            ->when($year, function ($query) use ($year) {
                $query->whereYear('tanggal_pz', $year);
            })
            ->paginate(3);

        return view(
            'pembaca.laporan.zakat',
            compact('zakats', 'years')
        );
    }

    /**
     * Summary of landingQurban post qurban
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\View
     */
    public function landingQurban(Request $request)
    {
        $years = PostQurban::query()
            ->selectRaw('YEAR(tanggal_pq) as year')
            ->distinct()
            ->orderBy('year', 'asc')
            ->get();

        // Take year from input
        $year = $request->input('year', '');

        $qurbans = PostQurban::query()
            ->when($year, function ($query) use ($year) {
                $query->whereYear('tanggal_pq', $year);
            })
            ->paginate(3);

        return view(
            'pembaca.laporan.qurban',
            compact('qurbans', 'years')
        );
    }
}
