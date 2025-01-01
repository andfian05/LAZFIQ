<?php

namespace App\Http\Controllers;

use App\Models\PostInfaq;
use Illuminate\Http\Request;

class PostInfaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $infaqs = PostInfaq::paginate(5);

        return view('admin.infaq.infaq')->with(
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

        return view('admin.infaq.tambah_infaq')->with(
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
                    'debit' => 'required|numeric|min:0',
                    'kredit' => 'nullable|numeric|min:0',
                    'statusInfaq' => 'required|string|max:255'
                ]
            );

            // take last saldo_akhir
            $lastRecordSA = PostInfaq::latest()->first();
            $lastSA = $lastRecordSA ? $lastRecordSA->saldo_akhir_pi : 0;
            $saldoAkhir = $lastSA + $request->debit - ($request->kredit ?? 0);

            // dd(
            //     [
            //         'tanggal_pi' => $request->tanggal,
            //         'debit_pi' => $request->debit,
            //         'kredit_pi' => $request->kredit ?? 0,
            //         'saldo_akhir_pi' => $saldoAkhir,
            //         'status_pi' => $request->statusInfaq
            //     ]
            // );

            PostInfaq::create(
                [
                    'tanggal_pi' => $request->tanggal,
                    'debit_pi' => $request->debit,
                    'kredit_pi' => $request->kredit ?? 0,
                    'saldo_akhir_pi' => $saldoAkhir,
                    'status_pi' => $request->statusInfaq
                ]
            );

            return redirect()->route('postInfaq.index')->with(
                'success',
                'Data posting infaq berhasil ditambahkan!'
            );
        } catch (\Throwable $th) {
            return redirect()->route('postInfaq.index')->with(
                'error-process',
                'Terjadi kesalahan dalam menambahkan data posting infaq!'
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PostInfaq $postInfaq)
    {
        return view(
            'admin.infaq.detail_infaq',
            compact('postInfaq')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostInfaq $postInfaq)
    {
        return view(
            'admin.infaq.update_infaq',
            compact('postInfaq')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostInfaq $postInfaq)
    {
        try {
            $request->validate(
                [
                    'tanggal' => 'required|date',
                    'debit' => 'required|numeric|min:0',
                    'kredit' => 'nullable|numeric|min:0',
                    'statusInfaq' => 'required|string|max:255'
                ]
            );

            // Take saldo_akhir_pi from record latest (before update)
            $lastRecordSA = PostInfaq::latest()->where(
                'id',
                '<>',
                $postInfaq->id
            )->first();
            $lastSA = $lastRecordSA ? $lastRecordSA->saldo_akhir_pi : 0;

            // Count saldo_akhir after update
            $saldoAkhir = $lastSA + $request->debit - ($request->kredit ?? 0);

            PostInfaq::where(
                'id',
                $postInfaq->id
            )->update(
                [
                    'tanggal_pi' => $request->tanggal,
                    'debit_pi' => $request->debit,
                    'kredit_pi' => $request->kredit ?? 0,
                    'saldo_akhir_pi' => $saldoAkhir,
                    'status_pi' => $request->statusInfaq
                ]
            );

            return redirect()->route('postInfaq.index')->with(
                'success',
                'Data posting infaq berhasil diubah!'
            );
        } catch (\Throwable $th) {
            return redirect()->route('postInfaq.index')->with(
                'error-process',
                'Terjadi kesalahan dalam mengubah data posting infaq!'
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostInfaq $postInfaq)
    {
        try {
            $postInfaq->delete();

            return redirect()->route('postInfaq.index')->with(
                'success',
                'Data posting infaq berhasil dihapus!'
            );
        } catch (\Throwable $th) {
            return redirect()->route('postInfaq.index')->with(
                'error-process',
                'Terjadi kesalahan dalam menghapus data posting infaq!'
            );
        }
    }
}
