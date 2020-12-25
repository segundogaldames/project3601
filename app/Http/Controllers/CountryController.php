<?php

namespace App\Http\Controllers;

use App\Country;
use App\City;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paises = Country::orderBY('nombre','ASC')->get();

        return view('countries.index', compact('paises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countries.create');
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
            'nombre' => 'required|string|min:4|unique:countries',
        ]);

        $pais = new Country;
        $pais->nombre = $request->nombre;
        $pais->save();

        return redirect('/countries')->with('success','El pais se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        $cities = City::select('id','nombre')->where('country_id', $country->id)->orderBY('nombre','ASC')->get();
        return view('countries.show', compact('country','cities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $this->validate($request, [
            'nombre' => 'required|string|min:4',
        ]);

        $nat = Country::find($country->id);
        $nat->nombre = $request->nombre;
        $nat->save();

        return redirect('/countries/' . $country->id)->with('success','El pais se ha modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        //
    }
}
