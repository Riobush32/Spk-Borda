<?php

namespace App\Livewire;

use App\Models\News;
use Livewire\Component;
use App\Models\KetegoriBerita;

class SearchAndFilterNews extends Component
{
    public $search = '';
    public $selectedCategory = '';
    public $kategori;

    public function mount()
    {
        $this->kategori = KetegoriBerita::all();
    }

    public function updating($name, $value)
    {
        // Reset pencarian ketika filter berubah
        if ($name === 'selectedCategory') {
            $this->search = '';
        }
    }

    public function render()
    {
        $query = News::query()
            ->with('kategori_berita') // Eager load relationship
            ->latest();

        if ($this->search) {
            $query->where('title', 'LIKE', '%' . $this->search . '%');
        }

        if ($this->selectedCategory) {
            $query->where('kategori_berita_id', $this->selectedCategory);
        }

        $news = $query->paginate(9); // Pagination untuk performa

        return view('livewire.search-and-filter-news', [
            'news' => $news
        ]);
    }
}
