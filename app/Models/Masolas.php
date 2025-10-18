<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masolas extends Model
{
    use HasFactory;

    protected $fillable = [
        'hallgato_id', 'datum', 'lap', 'oldal',
    ];
}
