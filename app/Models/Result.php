<?php

namespace App\Models;

use App\Models\Alternative;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Result extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function alternative(): BelongsTo
    {
        return $this->belongsTo(Alternative::class);
    }
}
