<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kar extends Model
{
    use HasFactory;

    protected $fillable = [
        'nev', 'kvota',
    ];
}
