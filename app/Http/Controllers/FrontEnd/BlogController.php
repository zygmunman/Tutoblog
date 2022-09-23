<?php

namespace App\Http\Controllers\FrontEnd;

use  App\Http\Controllers\Controller;
use App\Models\Backend\Tag;
use App\Models\Backend\Post;
use App\Models\Backend\Categoria;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        $tags = Tag::orderBy('nombre')->get();
        $posts = Post::latest('id')->where('estado', true)->get();
        return view('theme.front.blog.index', compact('posts'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar($id)
    {
        //
    }

}
