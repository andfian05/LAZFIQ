<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\CountQurban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CountQurbanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $qurbans = CountQurban::paginate(5);

        return view('admin.perhitungan.th_qurban')->with(
            [
                'qurbans' => $qurbans
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisHewan = [
            'sapi' => 'Sapi',
            'kambing' => 'Kambing'
        ];

        $statusQurban = [
            'diterima' => 'Diterima oleh panitia',
            'disalurkan' => 'Disalurkan untuk umat'
        ];

        return view('admin.perhitungan.perhitungan_qurban')->with(
            [
                'jenisHewan' => $jenisHewan,
                'statusQurban' => $statusQurban
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate(
                [
                    'tanggal' => 'required|date',
                    'kategori_qurban' => 'required|string|max:255',
                    'jumlah_sapi' => 'nullable|numeric|min:0',
                    'jumlah_kambing' => 'nullable|numeric|min:0',
                    'nama_yg_qurban' => 'required|string',
                    'bukti' => 'nullable|mimes:png,jpg,jpeg,pdf|max:2048',
                    'statusQurban' => 'required|string|max:255'
                ]
            );

            // take bukti path
            $buktiCQPath = null;
            if ($request->hasFile('bukti')) {
                $fileName = time() . '_' . $request->file('bukti')->getClientOriginalName();
                $buktiCQPath = $request->file('bukti')->storeAs('bukti-cq', $fileName, 'public');
            }

            // dd(
            //     [
            //         'tanggal_cq' => $request->tanggal,
            //         'kategori_qurban' => $request->kategori_qurban,
            //         'jumlah_sapi' => $request->jumlah_sapi,
            //         'jumlah_kambing' => $request->jumlah_kambing,
            //         'nama_yg_qurban' => $request->nama_yg_qurban,
            //         'bukti_cq' => $buktiCQPath,
            //         'status_cq' => $request->statusQurban
            //     ]
            // );

            CountQurban::create(
                [
                    'tanggal_cq' => $request->tanggal,
                    'kategori_qurban' => $request->kategori_qurban,
                    'jumlah_sapi' => $request->jumlah_sapi ?? 0,
                    'jumlah_kambing' => $request->jumlah_kambing ?? 0,
                    'nama_yg_qurban' => $request->nama_yg_qurban,
                    'bukti_cq' => $buktiCQPath,
                    'status_cq' => $request->statusQurban
                ]
            );

            return redirect()->route('countQurban.index')->with(
                'success',
                'Data perhitungan qurban berhasil ditambahkan!'
            );
        } catch (\Throwable $th) {
            return redirect()->route('countQurban.index')->with(
                'error-process',
                'Terjadi kesalahan dalam menambahkan data perhitungan qurban!'
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CountQurban $countQurban)
    {
        return view(
            'admin.perhitungan.detail_th_qurban',
            compact('countQurban')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CountQurban $countQurban)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CountQurban $countQurban)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CountQurban $countQurban)
    {
        try {
            if(!empty($countQurban->bukti_cq)) unlink('storage/'.$countQurban->bukti_cq);

            $countQurban->delete();

            return redirect()->route('countQurban.index')->with(
                'success',
                'Data perhitungan qurban berhasil dihapus!'
            );
        } catch (\Throwable $th) {
            Log::error(
                'Error deleting file using unlink:',
                ['error' => $th->getMessage()]
            );
            
            return redirect()->route('countQurban.index')->with(
                'error-process',
                'Terjadi kesalah dalam menghapus data perhitungan qurban!'
            );
        }
    }

    /**
     * Summary of getChartData Qurban
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function getChartData(Request $request)
    {
        // Take year from input
        $year = $request->input('year');

        $qurbanData = CountQurban::query()
            ->when(
                $year,
                function ($query) use ($year) {
                    $query->whereYear('tanggal_cq', $year);
                }
            )
            ->selectRaw('SUM(jumlah_sapi) as sapi, SUM(jumlah_kambing) as kambing')
            ->first();

        return response()->json(
            [
                'year' => Carbon::create($year)->format('Y'),
                'qurbanData' => $qurbanData
            ]
        );
    }
}
