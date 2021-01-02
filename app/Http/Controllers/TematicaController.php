<?php

namespace App\Http\Controllers;

use App\Tematica;
use App\Recurso;
use Illuminate\Http\Request;

class TematicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tematicas = Tematica::orderBy('nombre','ASC')->get();

        return view('tematicas.index', compact('tematicas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tematicas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string|min:4|unique:tematicas',
        ]);

        $tema = new Tematica;
        $tema->nombre = $request->nombre;
        $tema->save();

        return redirect('/tematicas')->with('success','La temática se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tematica  $tematica
     * @return \Illuminate\Http\Response
     */
    public function show(Tematica $tematica)
    {
        return view('tematicas.show', compact('tematica'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tematica  $tematica
     * @return \Illuminate\Http\Response
     */
    public function edit(Tematica $tematica)
    {
        return view('tematicas.edit', compact('tematica'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tematica  $tematica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tematica $tematica)
    {
        $this->validate($request, [
            'nombre' => 'required|string|min:4',
        ]);

        $tema = Tematica::find($tematica->id);
        $tema->nombre = $request->nombre;
        $tema->save();

        return redirect('/tematicas/' . $tematica->id)->with('success','La temática se ha modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tematica  $tematica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tematica $tematica)
    {
        //
    }
}
