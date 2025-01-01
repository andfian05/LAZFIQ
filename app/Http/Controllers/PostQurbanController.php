<?php

namespace App\Http\Controllers;

use App\Models\PostQurban;
use Illuminate\Http\Request;
use App\Exports\PostQurbanExport;
use Maatwebsite\Excel\Facades\Excel;

class PostQurbanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $qurbans = PostQurban::paginate(5);

        return view('admin.qurban.qurban')->with(
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
        $statusQurban = [
            'diterima' => 'Diterima oleh panitia',
            'disalurkan' => 'Disalurkan untuk umat'
        ];

        return view('admin.qurban.tambah_qurban')->with(
            [
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
                    'qSapi' => 'required|numeric|min:0',
                    'qKambing' => 'required|numeric|min:0',
                    'mustahiq' => 'required|numeric|min:0',
                    'statusQurban' => 'required|string|max:255'
                ]
            );

            // dd(
            //     [
            //         'tanggal_pq' => $request->tanggal,
            //         'qurban_sapi' => $request->qSapi,
            //         'qurban_kambing' => $request->qKambing,
            //         'mustahiq_pq' => $request->mustahiq,
            //         'status_pq' => $request->statusQurban
            //     ]
            // );

            PostQurban::create(
                [
                    'tanggal_pq' => $request->tanggal,
                    'qurban_sapi' => $request->qSapi,
                    'qurban_kambing' => $request->qKambing,
                    'mustahiq_pq' => $request->mustahiq,
                    'status_pq' => $request->statusQurban
                ]
            );

            return redirect()->route('postQurban.index')->with(
                'success',
                'Data posting qurban berhasil ditambahkan!'
            );
        } catch (\Throwable $th) {
            return redirect()->route('postQurban.index')->with(
                'error-process',
                'Terjadi kesalahan dalam menambahkan data posting qurban!'
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PostQurban $postQurban)
    {
        return view(
            'admin.qurban.detail_qurban',
            compact('postQurban')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostQurban $postQurban)
    {
        return view(
            'admin.qurban.update_qurban',
            compact('postQurban')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostQurban $postQurban)
    {
        try {
            $request->validate(
                [
                    'tanggal' => 'required|date',
                    'qSapi' => 'required|numeric|min:0',
                    'qKambing' => 'required|numeric|min:0',
                    'mustahiq' => 'required|numeric|min:0',
                    'statusQurban' => 'required|string|max:255'
                ]
            );

            PostQurban::where(
                'id',
                $postQurban->id
            )->update(
                [
                    'tanggal_pq' => $request->tanggal,
                    'qurban_sapi' => $request->qSapi,
                    'qurban_kambing' => $request->qKambing,
                    'mustahiq_pq' => $request->mustahiq,
                    'status_pq' => $request->statusQurban
                ]
            );

            return redirect()->route('postQurban.index')->with(
                'success',
                'Data posting qurban berhasil diubah!'
            );
        } catch (\Throwable $th) {
            return redirect()->route('postQurban.index')->with(
                'error-process',
                'Terjadi kesalahan dalam mengubah data posting qurban!'
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostQurban $postQurban)
    {
        try {
            $postQurban->delete();

            return redirect()->route('postQurban.index')->with(
                'success',
                'Data posting qurban berhasil dihapus!'
            );
        } catch (\Throwable $th) {
            return redirect()->route('postQurban.index')->with(
                'error-process',
                'Terjadi kesalahan dalam menghapus data posting qurban!'
            );
        }
    }

    /**
     * Summary of exportExcel post qurban
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportExcel()
    {
        try {
            return Excel::download(
                new PostQurbanExport,
                'Data-posting-qurban.xlsx'
            );
        } catch (\Throwable $th) {
            return redirect()->route('postQurban.index')->with(
                'error-process',
                'Terjadi kesalahan dalam mengunduh file data posting qurban! Silakan coba lagi.'
            );
        }
    }
}
