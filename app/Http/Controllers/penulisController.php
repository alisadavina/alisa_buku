<?php

namespace App\Http\Controllers;

use App\Models\penulis;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class penulisController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function index() : View
    {
        //get all penuliss
        $penuliss = penulis::latest()->paginate(3);

        //render view with penuliss
        return view('penuliss.index', compact('penuliss'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        $penulis = penulis::all();
        return view('penuliss.create', compact('penulis'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'id_penulis'        => 'required|numeric',
            'nama_penulis'      => 'required|min:5',
            'tanggal_lahir'     => 'required|date',
            'email'             => 'required|min:5',
            'alamat'            => 'required|min:5',
        ]);

        //create penulis
        penulis::create([
            'id_penulis'         => $request->id_penulis,
            'nama_penulis'       => $request->nama_penulis,
            'tanggal_lahir'      => $request->tanggal_lahir,
            'email'              => $request->email,
            'alamat'             => $request->alamat,
         ]);

        //redirect to index
        return redirect()->route('penuliss.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return View
     */
    public function show(string $id): View
    {
        //get penulis by ID
        $penulis = penulis::findOrFail($id);

        //render view with penulis
        return view('penuliss.show', compact('penulis'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get penulis by ID
        $penulis = penulis::findOrFail($id);

        //render view with penulis
        return view('penuliss.edit', compact('penulis'));
    }

    /**
     * update
     *
     * @param  Request $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_penulis'      => 'required|min:5',
            'tanggal_lahir'     => 'required|date',
            'email'             => 'required|min:5',
            'alamat'            => 'required|min:5',
        ]);

        //update penulis
        $penulis = penulis::findOrFail($id);
        $penulis->update([
            'nama_penulis'       => $request->nama_penulis,
            'tanggal_lahir'      => $request->tanggal_lahir,
            'email'              => $request->email,
            'alamat'             => $request->alamat,
         ]);

        //redirect to index
        return redirect()->route('penuliss.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        //get penulis by ID
        $penulis = penulis::findOrFail($id);

        //delete penulis
        $penulis->delete();

        //redirect to index
        return redirect()->route('penuliss.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
