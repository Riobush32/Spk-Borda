<?php

namespace App\Models;

use App\Models\Voter;
use App\Models\Alternative;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Poll extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function voter(): BelongsTo
    {
        return $this->belongsTo(Voter::class);
    }
    public function alternative(): BelongsTo
    {
        return $this->belongsTo(Alternative::class);
    }
}
