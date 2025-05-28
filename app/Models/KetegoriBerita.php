<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KetegoriBerita extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function News(): HasMany
    {
        return $this->hasMany(News::class);
    }
}
