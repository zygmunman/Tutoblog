<?php

namespace App\Http\Controllers\FrontEnd;

use  App\Http\Controllers\Controller;
use App\Models\Backend\Tag;
use App\Models\Backend\Post;
use App\Models\Backend\Categoria;
use BeyondCode\DumpServer\Dumper;
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
        $posts = Post::latest('id')->activo()->paginate(2);
        return $this->dataView($posts);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mostrar(Request $request, $slug)
    {
        $categorias = Categoria::orderBy('nombre')->get();
        $tags = Tag::orderBy('nombre')->get();
        $post = Post::where('slug', $slug)->first();
        return view('theme.front.blog.mostrar', compact('post', 'categorias', 'tags'));
    }

    public function categoria(Request $request, $slug){
        $categoria = Categoria::with('post')->where('slug', $slug)->first();
        if (!$categoria)
            abort(404);
        $posts = $categoria->post()->paginate(2);
        return $this->dataView($posts);
    }

    public function tag(Request $request, $slug)
    {
        $tag = Tag::with('post')->where('slug', $slug)->first();
        if(!$tag)
            abort(404);
        $posts = $tag->post()->paginate(2);
        return $this->dataView($posts);
    }

    public function dataView($posts)
    {
        $categorias = Categoria::orderBy('nombre')->get();
        $tags = Tag::orderBy('nombre')->get();
        return view('theme.front.blog.index', compact('posts', 'categorias', 'tags'));
    }

}
