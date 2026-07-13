<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\KategoriRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $kategoris = Kategori::paginate();

        return view('kategori.index', compact('kategoris'))
            ->with('i', ($request->input('page', 1) - 1) * $kategoris->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $kategori = new Kategori();

        return view('kategori.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KategoriRequest $request): RedirectResponse
    {
        Kategori::create($request->validated());

        return Redirect::route('kategoris.index')
            ->with('success', 'Kategori created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $kategori = Kategori::find($id);

        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $kategori = Kategori::find($id);

        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KategoriRequest $request, Kategori $kategori): RedirectResponse
    {
        $kategori->update($request->validated());

        return Redirect::route('kategoris.index')
            ->with('success', 'Kategori updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Kategori::find($id)->delete();

        return Redirect::route('kategoris.index')
            ->with('success', 'Kategori deleted successfully');
    }
}
