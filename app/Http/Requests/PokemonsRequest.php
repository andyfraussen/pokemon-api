<?php

namespace App\Http\Requests;

use App\Enums\PokemonOrderEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PokemonsRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'order' => Rule::in(PokemonOrderEnum::toValues())
        ];
    }
}
