<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Publisher;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::with('country')->orderBy('nombre','ASC')->get();

        return view('cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    #metodos get y post para registrar ciudades por pais
    public function addCity(Country $country)
    {
        return view('cities.addCity', compact('country'));
    }

    public function setCity(Request $request, Country $country)
    {
        $this->validate($request, [
            'nombre' => 'required|string|min:4|unique:cities',
        ]);

        $city = new City;
        $city->nombre = $request->nombre;
        $city->country_id = $country->id;
        $city->save();

        return redirect('/countries/' . $country->id)->with('success','La ciudad se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        $publishers = Publisher::select('id','nombre','direccion')->where('city_id', $city->id)->orderBy('nombre','ASC')->get();
        return view('cities.show', compact('city','publishers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $countries = Country::select('id','nombre')->orderBy('nombre','ASC')->get();
        return view('cities.edit', compact('city','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $this->validate($request, [
            'nombre' => 'required|string|min:4',
            'country' => 'required|integer',
        ]);

        $city = City::find($city->id);
        $city->nombre = $request->nombre;
        $city->country_id = $request->country;
        $city->save();

        return redirect('/cities/' . $city->id)->with('success','La ciudad se ha modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }
}
