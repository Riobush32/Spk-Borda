<?php

namespace App\Livewire;

use App\Models\Coment;
use Livewire\Component;

class NewsComent extends Component
{
    public $newsId;
    public $name;
    public $email;
    public $comment;
    public $coments;
    public $total;

    public function mount($newsId)
    {
        $this->newsId = $newsId;
        $this->loadComments();
    }

    public function loadComments()
    {
        $this->coments = Coment::where('news_id', $this->newsId)
            ->latest()
            ->get();
        $this->total = $this->coments->count();
    }

    public function saveComent()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string|max:1000',
        ]);

        Coment::create([
            'news_id' => $this->newsId,
            'name' => $this->name,
            'email' => $this->email,
            'comment' => $this->comment,
        ]);

        $this->reset(['name', 'email', 'comment']);
        $this->loadComments();

        session()->flash('message', 'Komentar berhasil ditambahkan!');
    }

    public function render()
    {
        return view('livewire.news-coment');
    }
}
