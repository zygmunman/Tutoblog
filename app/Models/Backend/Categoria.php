<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categoria';
    protected $guarded = [];

    /**
     * Cuando tenemos relaciones "muchos a muchos" tenemos que invocar el método "belongsToMany"
     * en ambos modelos:en nuestro caso, en el modelo "post" y en el modelo "categoria", pero
     * invirtiendo las funciones: la función "post" se escribe en el modelo "categoria" y a la
     * inversa:
     */
    public function post()
    {
        return $this->belongsToMany(Post::class, 'post_categoria');
    }
}
