<?php

namespace App\Http\Controllers;

use App\Publisher;
use App\City;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishers = Publisher::with('city')->orderBy('nombre','ASC')->get();

        return view('publishers.index', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::select('id','nombre')->orderBy('nombre','ASC')->get();
        return view('publishers.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #return $request;
        $this->validate($request, [
            'nombre' => 'required|string|min:4',
            'city' => 'required|integer',
        ]);

        $editor = Publisher::select('id')->where('nombre', $request->nombre)->where('city_id', $request->city)->first();

        if ($editor) {
           return redirect('/publishers')->with('danger','Esta Casa Publicadora ya está registrada... Intente con otra');
        }

        $editor = new Publisher;
        $editor->nombre = $request->nombre;
        $editor->direccion = $request->direccion;
        $editor->city_id = $request->city;
        $editor->save();

        return redirect('/publishers')->with('success','La Casa Publicadora se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(Publisher $publisher)
    {
        return view('publishers.show', compact('publisher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function edit(Publisher $publisher)
    {
        $cities = City::select('id','nombre')->orderBy('nombre','ASC')->get();
        return view('publishers.edit', compact('publisher','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publisher $publisher)
    {
        $this->validate($request, [
            'nombre' => 'required|string|min:4',
            'city' => 'required|integer',
        ]);


        $editor = Publisher::find($publisher->id);
        $editor->nombre = $request->nombre;
        $editor->direccion = $request->direccion;
        $editor->city_id = $request->city;
        $editor->save();

        return redirect('/publishers/' . $publisher->id)->with('success','La Casa Publicadora se ha modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
        //
    }
}
