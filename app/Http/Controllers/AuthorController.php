<?php

namespace App\Http\Controllers;

use App\Author;
use App\Nationality;
use Illuminate\Http\Request;
use DB;

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
            'nombre' => 'required|string|min:4|unique:authors',
        ]);

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
        #uso de query builder
        $recursos = DB::table('recursos')->select('recursos.id','recursos.nombre as recurso','recursos.anio_edicion','recurso_tipos.nombre as tipo','publishers.nombre as editorial','tematicas.nombre as tematica')
                    ->join('recurso_tipos','recurso_tipos.id','=','recursos.recurso_tipo_id')
                    ->join('publishers','publishers.id','=','recursos.publisher_id')
                    ->join('tematicas','tematicas.id','=','recursos.tematica_id')
                    ->join('author_recursos','author_recursos.recurso_id','=','recursos.id')
                    ->join('authors','author_recursos.author_id','=','authors.id')
                    ->where('authors.id', $author->id)
                    ->get();
        return view('authors.show', compact('author','recursos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        $nacionalidades = Nationality::select('id','nombre')->orderBy('nombre','ASC')->get();
        return view('authors.edit', compact('author','nacionalidades'));
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
        #return $request;
        $this->validate($request, [
            'nombre' => 'required|string|min:4',
            'nationality' => 'required|integer',
        ]);

        $autor = Author::find($author->id);
        $autor->nombre = $request->nombre;
        $autor->email = $request->email;
        $autor->nationality_id = $request->nationality;
        $autor->save();

        return redirect('/authors/' . $author->id)->with('success','El autor se ha modificado correctamente');
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
