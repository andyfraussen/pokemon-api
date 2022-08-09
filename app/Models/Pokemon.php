<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pokemon extends Model
{
    use HasFactory;
    protected $fillable = ['pokemon_id', 'name', 'sprites', 'types'];

    protected $casts = [
        'sprites' => 'array',
        'types' => 'array',
    ];

    public function details(): HasOne
    {
        return $this->hasOne(PokemonDetails::class);
    }
}
