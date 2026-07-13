<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BarangRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $barangs = Barang::paginate(5);

        return view('barang.index', compact('barangs'))
            ->with('i', ($request->input('page', 1) - 1) * $barangs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $barang = new Barang();
        $kategoris = Kategori::all();

        return view('barang.create', compact('barang', 'kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BarangRequest $request): RedirectResponse
    {
        Barang::create($request->validated());

        return Redirect::route('barangs.index')
            ->with('success', 'Barang created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $barang = Barang::find($id);

        return view('barang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $barang = Barang::find($id);
        $kategoris = Kategori::all();

        return view('barang.edit', compact('barang', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BarangRequest $request, Barang $barang): RedirectResponse
    {
        $barang->update($request->validated());

        return Redirect::route('barangs.index')
            ->with('success', 'Barang updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Barang::find($id)->delete();

        return Redirect::route('barangs.index')
            ->with('success', 'Barang deleted successfully');
    }

    public function trash()
    {
        $barangs = Barang::onlyTrashed()->paginate(10);

        return view('barang.trash', compact('barangs'))
            ->with('i', (request()->input('page', 1) - 1) * $barangs->perPage());
    }

    public function restore($id)
    {
        Barang::onlyTrashed()->findOrFail($id)->restore();

        return redirect()->route('barangs.trash')
            ->with('success', 'Barang berhasil dipulihkan.');
    }

    public function forceDelete($id)
    {
        Barang::onlyTrashed()->findOrFail($id)->forceDelete();

        return redirect()->route('barangs.trash')
            ->with('success', 'Barang berhasil dihapus permanen.');
    }
}
