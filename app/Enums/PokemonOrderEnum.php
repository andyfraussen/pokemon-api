<?php

namespace App\Enums;

use Spatie\Enum\Enum;
/**
 * @method static self idAsc()
 * @method static self idDesc()
 * @method static self nameAsc()
 * @method static self nameDesc()
 */

class PokemonOrderEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'idAsc' => 'id-asc',
            'idDesc' => 'id-desc',
            'nameAsc' => 'name-asc',
            'nameDesc' => 'name-desc',
        ];
    }
}
