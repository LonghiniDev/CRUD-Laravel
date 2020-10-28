<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guitarrista;

class GuitarristaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guitarristas = Guitarrista::all();
        return view('guitarristas.index', compact('guitarristas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guitarristas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|max:128',
            'banda' => 'required|max:64',
            'idade' => 'required|numeric',
        ]);
        $show = Guitarrista::create($validatedData);
        return redirect('/guitarristas')->with('success', 'Dados inseridos com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guitarristas = Guitarrista::findOrFail($id);
        return view('guitarristas.show',compact('guitarristas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guitarristas = Guitarrista::findOrFail($id);
        return view('guitarristas.edit', compact('guitarristas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nome' => 'required|max:128',
            'banda' => 'required|max:64',
            'idade' => 'required|numeric',
        ]);
        Guitarrista::whereId($id)->update($validatedData);
        return redirect('/guitarristas')->with('success', 'Dados alterados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guitarrista = Guitarrista::findOrFail($id);
        $guitarrista->delete();
        return redirect('/guitarristas')->with('success', 'Dados removidos com sucesso!');
    }
}
