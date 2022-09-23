<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Tag;
use App\Models\Backend\Post;
use Illuminate\Http\Request;
use App\Models\Backend\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\ValidarPost;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();
        return view('theme.back.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {
        $categorias = Categoria::orderBy('id')->pluck('nombre', 'id');
        $tags = Tag::orderBy('id')->pluck('nombre', 'id');
        return view('theme.back.post.crear', compact('categorias', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(ValidarPost $request)

    {

        $post = Post::create($request->validated());
        $categorias = $request->categoria;
        $post->categoria()->attach(array_values($categorias));//se relacionan las categorías
        $tags = $request->tag ? Tag::setTag($request->tag) : [];
        $post->tag()->attach($tags);//se relacionan los tags

           //Trabajo con la imagen */
        if($imagen = $request->imagen){
            $folder = "imagen_post";
            $peso = $imagen->getSize();
            $extension = $imagen->extension();
            $ruta = Storage::disk('public')->put($folder, $imagen);//subir imágenes en local
            $post->archivo()->create([
                'ruta' => $ruta,
                'extension' => $extension,
                'peso' => $peso
            ]);
        }
        return redirect()->route('post')->with('mensaje', 'Post guardado con éxito');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function mostrar(Post $post)
    {
        return view("theme.back.post.mostrar", compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function editar(Post $post)
    {
        $categorias = Categoria::orderBy('id')->pluck('nombre', 'id');
        $tags = Tag::orderBy('id')->pluck('nombre', 'id');
        return view("theme.back.post.editar", compact('post', 'categorias', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function actualizar(ValidarPost $request, Post $post)
    {
        $post->update($request->validated());
        $categorias = $request->categoria;
        $post->categoria()->sync(array_values($categorias)); //Se relacionan las categorias
        $tags = $request->tag ? Tag::setTag($request->tag) : [];
        $post->tag()->sync($tags); //Se relacionan los tags
        /**
         * Trabajo con imagen
         */
        if ($imagen = $request->imagen) {
            $folder = "imagen_post";
            Storage::disk('public')->delete($post->archivo->ruta);
            $post->archivo()->delete();
            $peso = $imagen->getSize();
            $extension = $imagen->extension();
            $ruta = Storage::disk('public')->put($folder, $imagen);
            $post->archivo()->create([
                'ruta' => $ruta,
                'extension' => $extension,
                'peso' => $peso
            ]);
        }
        return redirect()->route('post')->with('mensaje', 'Post actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        Post::destroy($id);
        cache()->tags('Post')->flush();
        return redirect()->route('post')->with('mensaje', 'Post eliminado con éxito');
    }
}


