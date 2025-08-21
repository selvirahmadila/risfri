<?php

namespace App\Http\Controllers;

use App\Models\InfoFrekuensi;
use App\Models\Kamus;
use App\Models\TabelSpektrum;
use App\Models\Materi;
use App\Models\Regulasi;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        return view('user.home');
    }

    public function infoFrekuensi(Request $request)
    {
        $query = InfoFrekuensi::where('status', 'active');
        
        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%")
                  ->orWhere('content', 'LIKE', "%{$search}%")
                  ->orWhere('tags', 'LIKE', "%{$search}%");
            });
        }
        
        // Category filter
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }
        
        $infoFrekuensi = $query->get();
        return view('user.info_frekuensi', compact('infoFrekuensi'));
    }

    public function kamus(Request $request)
    {
        $query = Kamus::where('status', 'active');
        
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
        return view('user.kamus', compact('kamus'));
    }

    public function tabelSpektrum(Request $request)
    {
        $query = TabelSpektrum::where('status', 'active');
        
        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('frequency_band', 'LIKE', "%{$search}%")
                  ->orWhere('service', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%")
                  ->orWhere('users', 'LIKE', "%{$search}%");
            });
        }
        
        // Category filter
        if ($request->has('category') && $request->category != '') {
            $query->where('band_category', $request->category);
        }
        
        $tabelSpektrum = $query->get();
        return view('user.tabel_spektrum', compact('tabelSpektrum'));
    }

    public function materi(Request $request)
    {
        $query = Materi::where('status', 'active');
        
        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhere('short_description', 'LIKE', "%{$search}%")
                  ->orWhere('content', 'LIKE', "%{$search}%")
                  ->orWhere('tags', 'LIKE', "%{$search}%");
            });
        }
        
        // Category filter
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }
        
        $materi = $query->get();
        return view('user.materi', compact('materi'));
    }

    public function regulasi(Request $request)
    {
        $query = Regulasi::where('status', 'active');
        
        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('regulation_number', 'LIKE', "%{$search}%")
                  ->orWhere('title', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%")
                  ->orWhere('institution', 'LIKE', "%{$search}%");
            });
        }
        
        // Category filter
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }
        
        $regulasi = $query->get();
        return view('user.regulasi', compact('regulasi'));
    }
}
