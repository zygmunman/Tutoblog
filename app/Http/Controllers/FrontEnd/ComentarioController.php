<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\ComentarioRequest;
use App\Models\Backend\Post;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ComentarioRequest $request, Post $post)
    {
        $post->comentario()->create($request->validated());
        return redirect()->back()->with('mensaje', 'Comentario recibido con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comentario  $comentario
     * @return \Illuminate\Http\Response
     */
    public function eliminar(Comentario $comentario)
    {
        //
    }
}
