<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Models\KetegoriBerita;

class BeritaController extends Controller
{
    public function index(){        
        return view('berita');
    }

    public function article($id){
        $news = News::findOrFail($id);
        $sameNews = News::where('kategori_berita_id', '==', $news->kategori_berita_id)->latest()->take(2)->get();
        return view('artikel', [
            'news' => $news,
            'sameNews' => $sameNews,
        ]);
    }
}
