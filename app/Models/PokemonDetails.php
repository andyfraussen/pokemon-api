<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PokemonDetails extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'sprites', 'types', 'height', 'weight', 'moves', 'order', 'species', 'stats', 'abilities', 'form'];

    public function pokemon(): BelongsTo{
        return $this->belongsTo(Pokemon::class);
    }
}
