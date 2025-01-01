<?php

namespace App\Http\Controllers;

use App\Models\CountZakat;
use Illuminate\Http\Request;

class CountZakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zakats = CountZakat::paginate(5);

        return view('admin.perhitungan.th_zakat')->with(
            [
                'zakats' => $zakats
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisZakat = [
            'beras' => 'Zakat beras',
            'uang' => 'Zakat uang'
        ];

        $statusZakat = [
            'diterima' => 'Diterima oleh Amil',
            'menunggu' => 'Menunggu disalurkan'
        ];

        return view('admin.perhitungan.perhitungan_zakat')->with(
            [
                'jenisZakat' => $jenisZakat,
                'statusZakat' => $statusZakat
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
                    'waktu' => 'required|date_format:H:i',
                    'muzakki' => 'required|string|max:255',
                    'kb_muzakki' => 'required|string',
                    'jenisZakat' => 'required|string|max:255',
                    'zBeras' => 'nullable|numeric|min:0',
                    'zUang' => 'nullable|numeric|min:0',
                    'statusZakat' => 'required|string|max:255'
                ]
            );

            // dd(
            //     [
            //         'tanggal_cz' => $request->tanggal,
            //         'waktu_cz' => $request->waktu,
            //         'muzakki_pertama' => $request->muzakki,
            //         'keluarga_muzakki' => $request->kb_muzakki,
            //         'jenis_zakat' => $request->jenisZakat,
            //         'zakat_beras' => $request->zBeras ?? 0,
            //         'zakat_uang' => $request->zUang ?? 0,
            //         'status_cz' => $request->statusZakat
            //     ]
            // );

            CountZakat::create(
                [
                    'tanggal_cz' => $request->tanggal,
                    'waktu_cz' => $request->waktu,
                    'muzakki_pertama' => $request->muzakki,
                    'keluarga_muzakki' => $request->kb_muzakki,
                    'jenis_zakat' => $request->jenisZakat,
                    'zakat_beras' => $request->zBeras ?? 0,
                    'zakat_uang' => $request->zUang ?? 0,
                    'status_cz' => $request->statusZakat
                ]
            );

            return redirect()->route('countZakat.index')->with(
                'success',
                'Data perhitungan zakat berhasil ditambahkan!'
            );
        } catch (\Throwable $th) {
            return redirect()->route('countZakat.index')->with(
                'error-process',
                'Terjadi kesalahan dalam menambahkan data perhitungan zakat!'
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CountZakat $countZakat)
    {
        return view(
            'admin.perhitungan.detail_th_zakat',
            compact('countZakat')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CountZakat $countZakat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CountZakat $countZakat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CountZakat $countZakat)
    {
        try {
            $countZakat->delete();

            return redirect()->route('countZakat.index')->with(
                'success',
                'Data perhitungan zakat berhasil dihapus!'
            );
        } catch (\Throwable $th) {
            return redirect()->route('countZakat.index')->with(
                'error-process',
                'Terjadi kesalahan dalam menghapus data perhitungan zakat!'
            );
        }
    }
}
