<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kamus;
use Illuminate\Http\Request;

class KamusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Kamus::query();
        
        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('term', 'LIKE', "%{$search}%")
                  ->orWhere('definition', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%")
                  ->orWhere('synonyms', 'LIKE', "%{$search}%")
                  ->orWhere('tags', 'LIKE', "%{$search}%");
            });
        }
        
        // Category filter
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }
        
        $kamus = $query->get();
        return view('admin.kamus.index', compact('kamus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kamus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'term' => 'required|string|max:255',
            'definition' => 'required|string',
            'category' => 'required|string',
            'status' => 'required|string',
            'synonyms' => 'nullable|string',
            'unit' => 'nullable|string',
            'reference' => 'nullable|string',
            'description' => 'nullable|string',
            'examples' => 'nullable|string',
            'tags' => 'nullable|string',
        ]);

        Kamus::create($request->all());

        return redirect()->route('admin.kamus.index')
            ->with('success', 'Istilah kamus berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kamus = Kamus::findOrFail($id);
        return view('admin.kamus.show', compact('kamus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kamus = Kamus::findOrFail($id);
        return view('admin.kamus.edit', compact('kamus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'term' => 'required|string|max:255',
            'definition' => 'required|string',
            'category' => 'required|string',
            'status' => 'required|string',
            'synonyms' => 'nullable|string',
            'unit' => 'nullable|string',
            'reference' => 'nullable|string',
            'description' => 'nullable|string',
            'examples' => 'nullable|string',
            'tags' => 'nullable|string',
        ]);

        $kamus = Kamus::findOrFail($id);
        $kamus->update($request->all());

        return redirect()->route('admin.kamus.index')
            ->with('success', 'Istilah kamus berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kamus = Kamus::findOrFail($id);
        $kamus->delete();

        return redirect()->route('admin.kamus.index')
            ->with('success', 'Istilah kamus berhasil dihapus');
    }
}
