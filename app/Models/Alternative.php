<?php

namespace App\Models;

use App\Models\Poll;
use App\Models\Result;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alternative extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function polls(): HasMany
    {
        return $this->hasMany(Poll::class);
    }
    public function results(): HasMany
    {
        return $this->hasMany(Result::class);
    }
}
