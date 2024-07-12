<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\penulis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class bukuController extends Controller


{
    public function index(): View
    {
        $bukus = buku::orderBy('id_buku')->paginate(2);
        return view('bukus.index', compact('bukus'));
    }
    

    public function create(): View
    {
        $penulis = penulis::all();
        return view('bukus.create', compact('penulis'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id_buku'       => 'required|numeric',
            'id_penulis'    => 'required',
            'foto_buku'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'judul_buku'    => 'required|min:5',
            'tahun_terbit'  => 'required|numeric',
            'deskripsi'     => 'required|min:10',
            'harga'         => 'required|numeric',
            'stok'          => 'required|numeric',
        ]);

        $buku = new buku();
        $buku->id_buku = $request->id_buku;
        $buku->id_penulis = $request->id_penulis;
        if ($request->hasFile('foto_buku')) {
            $buku['foto_buku'] = $request->file('foto_buku')->store('buku');
        }
        $buku->judul_buku = $request->judul_buku;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->deskripsi = $request->deskripsi;
        $buku->harga = $request->harga;
        $buku->stok = $request->stok;

        $buku->save();

        return redirect()->route('bukus.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id_buku): View
    {
        $buku = buku::findOrFail($id_buku);
        return view('bukus.show', compact('buku'));
    }

    public function edit(string $id_buku)
    {
        $penulis = penulis::all();
        $buku = buku::where('id_buku', $id_buku)->firstOrFail();
        return view('bukus.edit', compact('buku','penulis'));
    }


    public function update(Request $request, string $id_buku): RedirectResponse
    {
        $request->validate([
            'id_buku'       => 'required|min:2',
            'id_penulis'    => 'required',
            'foto_buku'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'judul_buku'    => 'required|min:5',
            'tahun_terbit'  => 'required|numeric',
            'deskripsi'     => 'required|min:10',
            'harga'         => 'required|numeric',
            'stok'          => 'required|numeric',
        ]);

        $buku = buku::findOrFail($id_buku);
        $buku->id_buku = $request->id_buku;
        $buku->id_penulis = $request->id_penulis;
        if ($request->hasFile('foto_buku')) {
            $buku['foto_buku'] = $request->file('foto_buku')->store('buku');
        }
        $buku->judul_buku = $request->judul_buku;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->deskripsi = $request->deskripsi;
        $buku->harga = $request->harga;
        $buku->stok = $request->stok;

        $buku->save();

        return redirect()->route('bukus.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    /**
     * destroy
     *
     * @param  mixed $id_buku
     * @return RedirectResponse
     */
    public function destroy($id_buku): RedirectResponse
    {
        //get buku by Id Buku
        $buku = buku::findOrFail($id_buku);

        //delete Foto Buku
        Storage::delete('public/bukus/'. $buku->foto_buku);

        //delete buku
        $buku->delete();

        //redirect to index
        return redirect()->route('bukus.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
