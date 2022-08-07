<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pokemon extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'sprites', 'types'];

    public function details(): HasOne
    {
        return $this->hasOne(PokemonDetails::class);
    }
}
