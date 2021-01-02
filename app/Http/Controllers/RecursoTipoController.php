<?php

namespace App\Http\Controllers;

use App\RecursoTipo;
use App\Recurso;
use Illuminate\Http\Request;

class RecursoTipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos = RecursoTipo::orderBy('nombre','ASC')->get();

        return view('recursoTipos.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recursoTipos.create');
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
            'nombre' => 'required|string|min:3|unique:recurso_tipos',
        ]);

        $tipo = new RecursoTipo;
        $tipo->nombre = $request->nombre;
        $tipo->save();

        return redirect('/recursoTipos')->with('success','El tipo de recurso se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RecursoTipo  $recursoTipo
     * @return \Illuminate\Http\Response
     */
    public function show(RecursoTipo $recursoTipo)
    {
        $recursos = Recurso::where('recurso_tipo_id', $recursoTipo->id)->orderBy('nombre','ASC')->get();
        return view('recursoTipos.show', compact('recursoTipo','recursos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RecursoTipo  $recursoTipo
     * @return \Illuminate\Http\Response
     */
    public function edit(RecursoTipo $recursoTipo)
    {
        return view('recursoTipos.edit', compact('recursoTipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RecursoTipo  $recursoTipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecursoTipo $recursoTipo)
    {
        $this->validate($request, [
            'nombre' => 'required|string|min:3',
        ]);

        $tipo = RecursoTipo::find($recursoTipo->id);
        $tipo->nombre = $request->nombre;
        $tipo->save();

        return redirect('/recursoTipos/' . $recursoTipo->id)->with('success','El tipo de recurso se ha modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RecursoTipo  $recursoTipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecursoTipo $recursoTipo)
    {
        //
    }
}
