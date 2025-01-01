<?php

namespace App\Http\Controllers;

use App\Models\CountInfaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CountInfaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infaqs = CountInfaq::paginate(5);

        return view('admin.perhitungan.th_infaq')->with(
            [
                'infaqs' => $infaqs
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statusInfaq = [
            'tersimpan' => 'Tersimpan Dalam Kas Masjid',
            'disalurkan' => 'Disalurkan Untuk Umat'
        ];

        return view('admin.perhitungan.perhitungan_infaq')->with(
            [
                'statusInfaq' => $statusInfaq
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
                    'debit' => 'required|numeric|min:0',
                    'kredit' => 'nullable|numeric|min:0',
                    'keterangan' => 'nullable|string',
                    'bukti' => 'nullable|mimes:png,jpg,jpeg,pdf|max:2048',
                    'statusInfaq' => 'required|string|max:255'
                ]
            );

            // take last saldo_akhir
            $lastRecordSA = CountInfaq::latest()->first();
            $lastSA = $lastRecordSA ? $lastRecordSA->saldo_akhir_ci : 0;
            $newSA = $lastSA + $request->debit - ($request->kredit ?? 0);


            // take bukti path
            $buktiCIPath = null;
            if ($request->hasFile('bukti')) {
                $fileName = time() . '_' . $request->file('bukti')->getClientOriginalName();
                $buktiCIPath = $request->file('bukti')->storeAs('bukti-ci', $fileName, 'public');
            }

            // dd([
            //     'tanggal_ci' => $request->tanggal,
            //     'waktu_ci' => $request->waktu,
            //     'debit_ci' => $request->debit,
            //     'kredit_ci' => $request->kredit ?? 0,
            //     'keterangan_ci' => $request->keterangan,
            //     'bukti_ci' => $buktiCIPath,
            //     'saldo_akhir_ci' => $newSA,
            //     'status_ci' => $request->statusInfaq
            // ]);

            CountInfaq::create(
                [
                    'tanggal_ci' => $request->tanggal,
                    'waktu_ci' => $request->waktu,
                    'debit_ci' => $request->debit,
                    'kredit_ci' => $request->kredit ?? 0,
                    'keterangan_ci' => $request->keterangan,
                    'bukti_ci' => $buktiCIPath,
                    'saldo_akhir_ci' => $newSA,
                    'status_ci' => $request->statusInfaq
                ]
            );

            return redirect()->route('countInfaq.index')->with(
                'success',
                'Data perhitungan infaq berhasil ditambahkan!'
            );
        } catch (\Throwable $th) {
            return redirect()->route('countInfaq.index')->with(
                'error-process',
                'Terjadi kesalahan dalam menambahkan data perhitungan infaq!'
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CountInfaq $countInfaq)
    {
        return view(
            'admin.perhitungan.detail_th_infaq',
            compact('countInfaq')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CountInfaq $countInfaq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CountInfaq $countInfaq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CountInfaq $countInfaq)
    {
        try {
            if(!empty($countInfaq->bukti_ci)) unlink('storage/'.$countInfaq->bukti_ci);

            $countInfaq->delete();

            return redirect()->route('countInfaq.index')->with(
                'success',
                'Data perhitungan infaq berhasil dihapus!'
            );
        } catch (\Throwable $th) {
            Log::error(
                'Error deleting file using unlink:',
                ['error' => $th->getMessage()]
            );

            return redirect()->route('countInfaq.index')->with(
                'error-process',
                'Terjadi kesalahan dalam menghapus data perhitungan infaq!'
            );
        }
    }
}
