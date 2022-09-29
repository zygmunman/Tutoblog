<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ComentarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'contenido' => 'required',
            'usuario_id' => 'required|exists:usuario,id',
            'comentario_id' => 'nullable|exists:comentario,id',
            'estado' => 'nullable|boolean'
        ];
    }
}
