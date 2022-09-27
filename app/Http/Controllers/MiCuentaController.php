<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MiCuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        canUser('mi_cuenta');
        return view('theme.back.mi-cuenta.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function guardar(Request $request)
    {
        //
        if ($imagen = $request->archivo) {
            if (Auth::user()->archivo) {
                Storage::disk('public')->delete(Auth::user()->archivo->ruta);
                Auth::user()->archivo()->delete();
            }
            $folder = "imagen_usuario";
            $peso = $imagen->getSize();
            $extension = $imagen->extension();
            $ruta = Storage::disk('public')->put($folder, $imagen);
            Auth::user()->archivo()->create([
                'ruta' => $ruta,
                'extension' => $extension,
                'peso' => $peso
            ]);
        }
        return redirect()->route('mi-cuenta')->with('mensaje', 'Cambios guardados');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
