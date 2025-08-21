<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InfoFrekuensi;
use Illuminate\Http\Request;

class InfoFrekuensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = InfoFrekuensi::query();
        
        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%")
                  ->orWhere('content', 'LIKE', "%{$search}%")
                  ->orWhere('author', 'LIKE', "%{$search}%")
                  ->orWhere('tags', 'LIKE', "%{$search}%");
            });
        }
        
        // Category filter
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }
        
        $infoFrekuensi = $query->get();
        return view('admin.info-frekuensi.index', compact('infoFrekuensi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.info-frekuensi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Debug: Log the request data
        \Log::info('InfoFrekuensi store request:', $request->all());
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'status' => 'required|string',
            'content' => 'nullable|string',
            'tags' => 'nullable|string',
            'author' => 'nullable|string',
        ]);

        try {
            $infoFrekuensi = InfoFrekuensi::create($request->all());
            \Log::info('InfoFrekuensi created successfully:', ['id' => $infoFrekuensi->id]);
            
            return redirect()->route('admin.info-frekuensi.index')
                ->with('success', 'Info frekuensi berhasil ditambahkan');
        } catch (\Exception $e) {
            \Log::error('Error creating InfoFrekuensi:', ['error' => $e->getMessage()]);
            return back()->withInput()->withErrors(['error' => 'Gagal menyimpan data: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $infoFrekuensi = InfoFrekuensi::findOrFail($id);
        return view('admin.info-frekuensi.show', compact('infoFrekuensi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $infoFrekuensi = InfoFrekuensi::findOrFail($id);
        return view('admin.info-frekuensi.edit', compact('infoFrekuensi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
            'status' => 'required|string',
            'content' => 'nullable|string',
            'tags' => 'nullable|string',
            'author' => 'nullable|string',
        ]);

        $infoFrekuensi = InfoFrekuensi::findOrFail($id);
        $infoFrekuensi->update($request->all());

        return redirect()->route('admin.info-frekuensi.index')
            ->with('success', 'Info frekuensi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $infoFrekuensi = InfoFrekuensi::findOrFail($id);
        $infoFrekuensi->delete();

        return redirect()->route('admin.info-frekuensi.index')
            ->with('success', 'Info frekuensi berhasil dihapus');
    }
}
