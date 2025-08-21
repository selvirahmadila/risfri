<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Regulasi;
use Illuminate\Http\Request;

class RegulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Regulasi::query();
        
        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('regulation_number', 'LIKE', "%{$search}%")
                  ->orWhere('title', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%")
                  ->orWhere('institution', 'LIKE', "%{$search}%")
                  ->orWhere('tags', 'LIKE', "%{$search}%");
            });
        }
        
        // Category filter
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }
        
        $regulasi = $query->get();
        return view('admin.regulasi.index', compact('regulasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.regulasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'regulation_number' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'published_date' => 'nullable|date',
            'status' => 'required|string',
            'year' => 'nullable|integer',
            'institution' => 'nullable|string',
            'content' => 'nullable|string',
            'scope' => 'nullable|string',
            'key_provisions' => 'nullable|string',
            'penalties' => 'nullable|string',
            'notes' => 'nullable|string',
            'tags' => 'nullable|string',
        ]);

        Regulasi::create($request->all());

        return redirect()->route('admin.regulasi.index')
            ->with('success', 'Regulasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $regulasi = Regulasi::findOrFail($id);
        return view('admin.regulasi.show', compact('regulasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $regulasi = Regulasi::findOrFail($id);
        return view('admin.regulasi.edit', compact('regulasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'regulation_number' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'published_date' => 'nullable|date',
            'status' => 'required|string',
            'year' => 'nullable|integer',
            'institution' => 'nullable|string',
            'content' => 'nullable|string',
            'scope' => 'nullable|string',
            'key_provisions' => 'nullable|string',
            'penalties' => 'nullable|string',
            'notes' => 'nullable|string',
            'tags' => 'nullable|string',
        ]);

        $regulasi = Regulasi::findOrFail($id);
        $regulasi->update($request->all());

        return redirect()->route('admin.regulasi.index')
            ->with('success', 'Regulasi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $regulasi = Regulasi::findOrFail($id);
        $regulasi->delete();

        return redirect()->route('admin.regulasi.index')
            ->with('success', 'Regulasi berhasil dihapus');
    }
}
