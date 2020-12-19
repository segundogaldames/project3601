<?php

namespace App\Http\Controllers;

use App\Author;
use App\Nationality;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::with('nationality')->orderBy('nombre','ASC')->get();

        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    #metodo get para agregar autores por nacionalidad
    public function addAuthor(Nationality $nationality)
    {
        return view('authors.addAuthor', compact('nationality'));
    }

    #metodo posto para agregar autores por nacionalidad
    public function setAuthor(Request $request, Nationality $nationality)
    {
        $this->validate($request, [
            'nombre' => 'required|string|min:4',
        ]);

        $consulta = Author::where('nombre', $request->nombre)->where('nationality_id', $nationality->id)->first();

        if ($consulta) {
            return redirect('/nationalities/' . $nationality->id)->with('danger','El autor ya ha sido ingresado... Intente con otro');
        }

        $author = new Author;
        $author->nombre = $request->nombre;
        $author->email = $request->email;
        $author->nationality_id = $nationality->id;
        $author->save();

        return redirect('/nationalities/' . $nationality->id)->with('success','El autor se ha registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        //
    }
}
