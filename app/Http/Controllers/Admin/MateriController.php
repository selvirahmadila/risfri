<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Materi::query();
        
        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('short_description', 'LIKE', "%{$search}%")
                  ->orWhere('content', 'LIKE', "%{$search}%")
                  ->orWhere('author', 'LIKE', "%{$search}%")
                  ->orWhere('tags', 'LIKE', "%{$search}%");
            });
        }
        
        // Category filter
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }
        
        $materi = $query->get();
        return view('admin.materi.index', compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.materi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'content' => 'nullable|string',
            'level' => 'required|string',
            'duration' => 'nullable|string',
            'status' => 'required|string',
            'category' => 'required|string',
            'author' => 'nullable|string',
            'learning_objectives' => 'nullable|string',
            'prerequisites' => 'nullable|string',
            'references' => 'nullable|string',
            'tags' => 'nullable|string',
        ]);

        Materi::create($request->all());

        return redirect()->route('admin.materi.index')
            ->with('success', 'Materi pembelajaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $materi = Materi::findOrFail($id);
        return view('admin.materi.show', compact('materi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $materi = Materi::findOrFail($id);
        return view('admin.materi.edit', compact('materi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string',
            'content' => 'nullable|string',
            'level' => 'required|string',
            'duration' => 'nullable|string',
            'status' => 'required|string',
            'category' => 'required|string',
            'author' => 'nullable|string',
            'learning_objectives' => 'nullable|string',
            'prerequisites' => 'nullable|string',
            'references' => 'nullable|string',
            'tags' => 'nullable|string',
        ]);

        $materi = Materi::findOrFail($id);
        $materi->update($request->all());

        return redirect()->route('admin.materi.index')
            ->with('success', 'Materi pembelajaran berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materi = Materi::findOrFail($id);
        $materi->delete();

        return redirect()->route('admin.materi.index')
            ->with('success', 'Materi pembelajaran berhasil dihapus');
    }
}
