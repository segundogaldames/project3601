<?php

namespace App\Http\Controllers;

use App\AuthorRecurso;
use App\Author;
use App\Recurso;
use Illuminate\Http\Request;

class AuthorRecursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    #metodos get y post para agregar autores a un recurso
    public function addAuthor(Recurso $recurso)
    {
        $authors = Author::select('id','nombre')->orderBy('nombre','ASC')->get();

        return view('authorRecursos.addAuthor', compact('authors','recurso'));
    }

    public function setAuthor(Request $request, Recurso $recurso)
    {
        $this->validate($request, [
            'author' => 'required|integer',
        ]);

        $consulta = AuthorRecurso::select('id')->where('author_id', $request->author)->where('recurso_id', $recurso->id)->first();

        if ($consulta) {
            return redirect('/recursos/' . $recurso->id)->with('danger','Este author ya está asociado al recurso... Intente con otro');
        }

        $autor = new AuthorRecurso;
        $autor->author_id = $request->author;
        $autor->recurso_id = $recurso->id;
        $autor->save();

        return redirect('/recursos/' . $recurso->id)->with('success','El author se ha asociado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AuthorRecurso  $authorRecurso
     * @return \Illuminate\Http\Response
     */
    public function show(AuthorRecurso $authorRecurso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AuthorRecurso  $authorRecurso
     * @return \Illuminate\Http\Response
     */
    public function edit(AuthorRecurso $authorRecurso)
    {
        $authors = Author::select('id','nombre')->orderBy('nombre','ASC')->get();
        $recursos = Recurso::select('id','nombre')->orderBy('nombre','ASC')->get();

        return view('authorRecursos.edit', compact('authorRecurso','authors','recursos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AuthorRecurso  $authorRecurso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuthorRecurso $authorRecurso)
    {
        $this->validate($request, [
            'author' => 'required|integer',
            'recurso' => 'required|integer',
        ]);

        $cambio = AuthorRecurso::find($authorRecurso->id);
        $cambio->author_id = $request->author;
        $cambio->recurso_id = $request->recurso;
        $cambio->save();

        return redirect('/recursos/' . $authorRecurso->recurso_id)->with('success','El author y/o recurso se ha modificado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AuthorRecurso  $authorRecurso
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuthorRecurso $authorRecurso)
    {
        $authorRecurso->delete();

        return redirect('/recursos/' . $authorRecurso->recurso_id)->with('success','El author se ha desvinculado correctamente');
    }
}
