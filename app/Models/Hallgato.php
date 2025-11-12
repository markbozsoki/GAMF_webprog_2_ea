<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Kar;

class Hallgato extends Model
{
    use HasFactory;

    public function kar(): BelongsTo
    {
        return $this->belongsTo(Kar::class);
    }

    public function masolas(): HasMany
    {
        return $this->hasMany(Masolas::class)->chaperone();
    }

    protected $fillable = [
        'nev', 'osztondijas', 'kar_id',
    ];
}
