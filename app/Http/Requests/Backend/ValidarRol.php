<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ValidarRol extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            /** 'optional' lo que hace es evaluar si '$this->route('rol')' es nulo o no lo es:
             * si es nulo, lo devuelve como tal; si no lo es, valida el nombre y el slug que le
             * hemos pasado, excluyendo el '->id' del objeto en cuestión
             */
            'nombre' => 'required|max:50|unique:rol,nombre,' . optional($this->route('rol'))->id,
            'slug' => 'required|max:50|unique:rol,slug,' . optional($this->route('rol'))->id
        ];
    }
}
