<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Models\Hallgato;

class Kar extends Model
{
    use HasFactory;

    public function hallgato(): HasMany
    {
        return $this->hasMany(Hallgato::class)->chaperone();
    }

    protected $fillable = [
        'nev', 'kvota',
    ];
}
