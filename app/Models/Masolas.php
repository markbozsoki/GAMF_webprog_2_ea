<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Hallgato;

class Masolas extends Model
{
    use HasFactory;

    public function hallgato(): BelongsTo
    {
        return $this->belongsTo(Hallgato::class);
    }

    protected $fillable = [
        'hallgato_id', 'datum', 'lap', 'oldal',
    ];
}
