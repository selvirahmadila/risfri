<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TabelSpektrum;
use Illuminate\Http\Request;

class TabelSpektrumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = TabelSpektrum::query();
        
        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('frequency_band', 'LIKE', "%{$search}%")
                  ->orWhere('service', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%")
                  ->orWhere('users', 'LIKE', "%{$search}%")
                  ->orWhere('regulation', 'LIKE', "%{$search}%");
            });
        }
        
        // Category filter
        if ($request->has('category') && $request->category != '') {
            $query->where('band_category', $request->category);
        }
        
        $tabelSpektrum = $query->get();
        return view('admin.tabel-spektrum.index', compact('tabelSpektrum'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tabel-spektrum.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'frequency_band' => 'required|string|max:255',
            'band_category' => 'required|string',
            'service' => 'required|string',
            'status' => 'required|string',
            'bandwidth' => 'nullable|string',
            'regulation' => 'nullable|string',
            'allocation_year' => 'nullable|integer',
            'condition' => 'nullable|string',
            'users' => 'nullable|string',
            'description' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        TabelSpektrum::create($request->all());

        return redirect()->route('admin.tabel-spektrum.index')
            ->with('success', 'Data spektrum berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tabelSpektrum = TabelSpektrum::findOrFail($id);
        return view('admin.tabel-spektrum.show', compact('tabelSpektrum'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tabelSpektrum = TabelSpektrum::findOrFail($id);
        return view('admin.tabel-spektrum.edit', compact('tabelSpektrum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'frequency_band' => 'required|string|max:255',
            'band_category' => 'required|string',
            'service' => 'required|string',
            'status' => 'required|string',
            'bandwidth' => 'nullable|string',
            'regulation' => 'nullable|string',
            'allocation_year' => 'nullable|integer',
            'condition' => 'nullable|string',
            'users' => 'nullable|string',
            'description' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $tabelSpektrum = TabelSpektrum::findOrFail($id);
        $tabelSpektrum->update($request->all());

        return redirect()->route('admin.tabel-spektrum.index')
            ->with('success', 'Data spektrum berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tabelSpektrum = TabelSpektrum::findOrFail($id);
        $tabelSpektrum->delete();

        return redirect()->route('admin.tabel-spektrum.index')
            ->with('success', 'Data spektrum berhasil dihapus');
    }
}
