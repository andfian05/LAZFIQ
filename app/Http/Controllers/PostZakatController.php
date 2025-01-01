<?php

namespace App\Http\Controllers;

use App\Models\PostZakat;
use Illuminate\Http\Request;
use App\Exports\PostZakatExport;
use Maatwebsite\Excel\Facades\Excel;

class PostZakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zakats = PostZakat::paginate(5);

        return view('admin.zakat.zakat')->with(
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
        $statusZakat = [
            'menunggu' => 'Pengumpulan zakat',
            'disalurkan' => 'Disalurkan untuk Umat'
        ];

        return view('admin.zakat.tambah_zakat')->with(
            [
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
                    'jzBeras' => 'required|numeric|min:0',
                    'jzUang' => 'required|numeric|min:0',
                    'mustahiq' => 'required|numeric|min:0',
                    'statusZakat' => 'required|string|max:255'
                ]
            );

            // dd(
            //     [
            //         'tanggal_pz' => $request->tanggal,
            //         'zakat_uang' => $request->jzUang,
            //         'zakat_beras' => $request->jzBeras,
            //         'mustahiq_pz' => $request->mustahiq,
            //         'status_pz' => $request->statusZakat
            //     ]
            // );

            PostZakat::create(
                [
                    'tanggal_pz' => $request->tanggal,
                    'zakat_uang' => $request->jzUang,
                    'zakat_beras' => $request->jzBeras,
                    'mustahiq_pz' => $request->mustahiq,
                    'status_pz' => $request->statusZakat
                ]
            );

            return redirect()->route('postZakat.index')->with(
                'success',
                'Data posting zakat berhasil ditambahkan!'
            );
        } catch (\Throwable $th) {
            return redirect()->route('postZakat.index')->with(
                'error-process',
                'Terjadi kesalahan dalam menambahkan data posting zakat!'
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PostZakat $postZakat)
    {
        return view(
            'admin.zakat.detail_zakat',
            compact('postZakat')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostZakat $postZakat)
    {
        return view(
            'admin.zakat.update_zakat',
            compact('postZakat')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostZakat $postZakat)
    {
        try {
            $request->validate(
                [
                    'tanggal' => 'required|date',
                    'jzBeras' => 'required|numeric|min:0',
                    'jzUang' => 'required|numeric|min:0',
                    'mustahiq' => 'required|numeric|min:0',
                    'statusZakat' => 'required|string|max:255'
                ]
            );

            PostZakat::where(
                'id',
                $postZakat->id
            )->update(
                [
                    'tanggal_pz' => $request->tanggal,
                    'zakat_uang' => $request->jzUang,
                    'zakat_beras' => $request->jzBeras,
                    'mustahiq_pz' => $request->mustahiq,
                    'status_pz' => $request->statusZakat
                ]
            );

            return redirect()->route('postZakat.index')->with(
                'success',
                'Data posting zakat berhasil diubah!'
            );
        } catch (\Throwable $th) {
            return redirect()->route('postZakat.index')->with(
                'error-process',
                'Terjadi kesalahan dalam mengubah data posting zakat!'
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostZakat $postZakat)
    {
        try {
            $postZakat->delete();

            return redirect()->route('postZakat.index')->with(
                'success',
                'Data posting zakat berhasil dihapus!'
            );
        } catch (\Throwable $th) {
            return redirect()->route('postZakat.index')->with(
                'error-process',
                'Terjadi kesalahan dalam menghapus data posting zakat!'
            );
        }
    }

    /**
     * Summary of exportExcel post zakat
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportExcel()
    {
        try {
            return Excel::download(
                new PostZakatExport,
                'Data-posting-zakat.xlsx'
            );
        } catch (\Throwable $th) {
            return redirect()->route('postZakat.index')->with(
                'error-process',
                'Terjadi kesalahan dalam mengunduh file data posting zakat! Silakan coba lagi.'
            );
        }
    }
}
