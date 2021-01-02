<?php

namespace App\Http\Controllers;

use App\Recurso;
use App\RecursoTipo;
use App\Tematica;
use App\Publisher;
use Illuminate\Http\Request;

class RecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recursos = Recurso::with(['recursoTipo','tematica','publisher'])->orderBy('nombre','ASC')->get();

        return view('recursos.index', compact('recursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = RecursoTipo::select('id','nombre')->orderBy('nombre','ASC')->get();
        $tematicas = Tematica::select('id','nombre')->orderBy('nombre','ASC')->get();
        $publishers = Publisher::select('id','nombre')->orderBy('nombre','ASC')->get();

        return view('recursos.create',compact('tipos','tematicas','publishers'));
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
            'nombre' => 'required|string|min:4',
            'anio' => 'required|integer|min:4',
            'descripcion' => 'required|string|min:6',
            'tipo' => 'required|integer',
            'publisher' => 'required|integer',
            'tematica' => 'required|integer',
        ]);

        $consulta = Recurso::select('id')->where('nombre', $request->nombre)->where('publisher_id', $request->publisher)->first();

        if ($consulta) {
            return redirect('/recursos')->with('danger','Este recurso ya está registrado... Intente con otro');
        }

        $recurso = new Recurso;
        $recurso->nombre = $request->nombre;
        $recurso->anio_edicion = $request->anio;
        $recurso->descripcion = $request->descripcion;
        $recurso->recurso_tipo_id = $request->tipo;
        $recurso->publisher_id = $request->publisher;
        $recurso->tematica_id = $request->tematica;
        $recurso->save();

        return redirect('/recursos')->with('success','El recurso se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recurso  $recurso
     * @return \Illuminate\Http\Response
     */
    public function show(Recurso $recurso)
    {
        return view('recursos.show', compact('recurso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recurso  $recurso
     * @return \Illuminate\Http\Response
     */
    public function edit(Recurso $recurso)
    {
        $tipos = RecursoTipo::select('id','nombre')->orderBy('nombre','ASC')->get();
        $tematicas = Tematica::select('id','nombre')->orderBy('nombre','ASC')->get();
        $publishers = Publisher::select('id','nombre')->orderBy('nombre','ASC')->get();

        return view('recursos.edit',compact('tipos','tematicas','publishers','recurso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recurso  $recurso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recurso $recurso)
    {
        $this->validate($request, [
            'nombre' => 'required|string|min:4',
            'anio' => 'required|integer|min:4',
            'descripcion' => 'required|string|min:6',
            'tipo' => 'required|integer',
            'publisher' => 'required|integer',
            'tematica' => 'required|integer',
        ]);

        $rec = Recurso::find($recurso->id);
        $rec->nombre = $request->nombre;
        $rec->anio_edicion = $request->anio;
        $rec->descripcion = $request->descripcion;
        $rec->recurso_tipo_id = $request->tipo;
        $rec->publisher_id = $request->publisher;
        $rec->tematica_id = $request->tematica;
        $rec->save();

        return redirect('/recursos/' . $recurso->id)->with('success','El recurso se ha modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recurso  $recurso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recurso $recurso)
    {
        //
    }
}
