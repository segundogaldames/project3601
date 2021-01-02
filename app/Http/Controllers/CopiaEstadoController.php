<?php

namespace App\Http\Controllers;

use App\CopiaEstado;
use Illuminate\Http\Request;

class CopiaEstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = CopiaEstado::orderBy('nombre','ASC')->get();

        return view('copiaEstados.index', compact('estados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('copiaEstados.create');
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
            'nombre' => 'required|string|min:4|unique:copia_estados',
        ]);

        $estado = new CopiaEstado;
        $estado->nombre = $request->nombre;
        $estado->save();

        return redirect('/copiaEstados')->with('success','El estado de copia se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CopiaEstado  $copiaEstado
     * @return \Illuminate\Http\Response
     */
    public function show(CopiaEstado $copiaEstado)
    {
        return view('copiaEstados.show', compact('copiaEstado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CopiaEstado  $copiaEstado
     * @return \Illuminate\Http\Response
     */
    public function edit(CopiaEstado $copiaEstado)
    {
        return view('copiaEstados.edit', compact('copiaEstado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CopiaEstado  $copiaEstado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CopiaEstado $copiaEstado)
    {
        $this->validate($request, [
            'nombre' => 'required|string|min:4',
        ]);

        $estado = CopiaEstado::find($copiaEstado->id);
        $estado->nombre = $request->nombre;
        $estado->save();

        return redirect('/copiaEstados/' . $copiaEstado->id)->with('success','El estado de copia se ha modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CopiaEstado  $copiaEstado
     * @return \Illuminate\Http\Response
     */
    public function destroy(CopiaEstado $copiaEstado)
    {
        //
    }
}
