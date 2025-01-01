<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documentation;
use Illuminate\Support\Facades\Log;

class DocumentationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kategori = [
            'infaq' => 'Kategori infaq',
            'zakat' => 'Kategori zakat',
            'qurban' => 'Kategori qurban'
        ];

        $documentations = Documentation::paginate(2);

        // Parameter
        $showDoc = null;
        $editDoc = null;

        if ($request->has('show')) {
            $showDoc = Documentation::find($request->show);
        } elseif ($request->has('edit')) {
            $editDoc = Documentation::find($request->edit);
        }


        return view('admin.dokumentasi.dokumen_upload')->with(
            [
                'documentations' => $documentations,
                'kategori' => $kategori,
                'showDoc' => $showDoc,
                'editDoc' => $editDoc
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
                    'foto' => 'required|mimes:png,jpg,jpeg,pdf|max:2048',
                    'kategori' => 'required|string|max:255',
                    'judul' => 'required|string|max:255',
                    'deskripsi' => 'required|string|max:255'
                ]
            );

            // take foto path
            $fotoPath = null;
            if ($request->hasFile('foto')) {
                $fileName = time() . '_' . $request->file('foto')->getClientOriginalName();
                $fotoPath = $request->file('foto')->storeAs('documentation', $fileName, 'public');
            }

            Documentation::create(
                [
                    'tanggal_kegiatan' => $request->tanggal,
                    'foto_kegiatan' => $fotoPath,
                    'kategori_kegiatan' => $request->kategori,
                    'judul_kegiatan' => $request->judul,
                    'deskripsi_kegiatan' => $request->deskripsi
                ]
            );

            return redirect()->route('documentation.index')->with(
                'success',
                'Data dokumentasi berhasil ditambahkan!'
            );
        } catch (\Throwable $th) {
            return redirect()->route('documentation.index')->with(
                'error-process',
                'Terjadi kesalahan dalam menambahkan data dokumentasi!'
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Documentation $documentation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Documentation $documentation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Documentation $documentation)
    {
        try {
            $request->validate(
                [
                    'tanggal' => 'required|date',
                    'foto' => 'nullable|mimes:png,jpg,jpeg,pdf|max:2048',
                    'kategori' => 'required|string|max:255',
                    'judul' => 'required|string|max:255',
                    'deskripsi' => 'required|string|max:255'
                ]
            );

            // take foto path
            $fotoPath = $documentation->foto_kegiatan;
            if ($request->hasFile('foto')) {
                if ($fotoPath && file_exists(
                    storage_path('app/public/' . $fotoPath)
                )) {
                    unlink(
                        storage_path('app/public/' . $fotoPath)
                    );
                }

                $fileName = time() . '_' . $request->file('foto')->getClientOriginalName();
                $fotoPath = $request->file('foto')->storeAs('documentation', $fileName, 'public');
            }

            Documentation::where(
                'id',
                $documentation->id
            )->update(
                [
                    'tanggal_kegiatan' => $request->tanggal,
                    'foto_kegiatan' => $fotoPath,
                    'kategori_kegiatan' => $request->kategori,
                    'judul_kegiatan' => $request->judul,
                    'deskripsi_kegiatan' => $request->deskripsi
                ]
            );

            return redirect()->route('documentation.index')->with(
                'success',
                'Data dokumentasi berhasil diubah!'
            );
        } catch (\Throwable $th) {
            return redirect()->route('documentation.index')->with(
                'error-process',
                'Terjadi kesalahan dalam mengubah data dokumentasi!'
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Documentation $documentation)
    {
        try {
            $filePath = storage_path('app/public/' . $documentation->foto_kegiatan);

            if (file_exists($filePath)) {
                unlink($filePath);
                Log::info('File successfully deleted using unlink.');
            } else {
                Log::warning(
                    'File does not exist at:',
                    ['path' => $filePath]
                );
            }

            $documentation->delete();

            return redirect()->route('documentation.index')->with(
                'success',
                'Data dokumentasi berhasil dihapus!'
            );
        } catch (\Throwable $th) {
            return redirect()->route('documentation.index')->with(
                'error-process',
                'Terjadi kesalahan dalam menghapus data dokumentasi!'
            );
        }
    }
}