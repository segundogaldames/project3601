<?php

namespace App\Http\Controllers;

use App\Nationality;
use App\Author;
use Illuminate\Http\Request;

class NationalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nationalities = Nationality::orderBy('nombre','ASC')->get();

        return view('nationalities.index', compact('nationalities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nationalities.create');
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
            'nombre' => 'required|string|min:4|unique:nationalities',
        ]);

        $nat = new Nationality;
        $nat->nombre = $request->nombre;
        $nat->save();

        return redirect('/nationalities')->with('success','La nacionalidad se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function show(Nationality $nationality)
    {
        $authors = Author::where('nationality_id', $nationality->id)->orderBy('nombre','ASC')->get();
        return view('nationalities.show', compact('nationality','authors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function edit(Nationality $nationality)
    {
        return view('nationalities.edit', compact('nationality'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nationality $nationality)
    {
        $this->validate($request, [
            'nombre' => 'required|string|min:4',
        ]);

        $nat = Nationality::find($nationality->id);
        $nat->nombre = $request->nombre;
        $nat->save();

        return redirect('/nationalities/' . $nationality->id )->with('success','La nacionalidad se ha modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nationality  $nationality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nationality $nationality)
    {
        //
    }
}
