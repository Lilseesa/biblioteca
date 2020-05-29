<?php

namespace App\Http\Controllers;

use App\Genero;
use App\Http\Requests\GeneroRequest;

class GeneroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $generos = Genero::all();

        return view('genero.index', [
            'generos' => $generos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\GeneroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GeneroRequest $request)
    {
        $data = $request->validated();

        $genero = Genero::create($data);

        if ($genero) {
            return redirect(route('generos.index'));
        }

        dd($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function show(Genero $genero)
    {
        return view('genero.show', [
            'genero' => $genero
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function edit(Genero $genero)
    {
        return view('genero.edit', [
            'genero' => $genero
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\GeneroRequest  $request
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function update(GeneroRequest $request, Genero $genero)
    {
        $data = $request->validated();

        if ($genero->update($data)) {
            return redirect(route('generos.index'));
        }

        dd($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Genero  $genero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genero $genero)
    {
        if($genero->delete()){
            return response()->json(['error' => false],202);    
        }
        return response()->json(['error' => true],202);
    }
}