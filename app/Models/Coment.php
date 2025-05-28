<?php

namespace App\Models;

use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function news(): BelongsTo
    {
        return $this->belongsTo(related: News::class);
    }
}
