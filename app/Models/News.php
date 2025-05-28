<?php

namespace App\Models;

use App\Models\Coment;
use App\Models\KetegoriBerita;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $appends = ['image_url'];

    // Accessor untuk URL gambar
    public function getImageUrlAttribute()
    {
        if (empty($this->image)) {
            return asset('images/default.jpg'); // Gambar fallback
        }

        return str_starts_with($this->image, 'http')
            ? $this->image
            : asset('storage/' . $this->image);
    }

    public function kategori_berita(): BelongsTo
    {
        return $this->belongsTo(KetegoriBerita::class);
    }

    public function coments(): HasMany
    {
        return $this->hasMany(Coment::class);
    }
    
}
