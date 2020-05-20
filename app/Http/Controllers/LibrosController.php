<?php

namespace App\Http\Controllers;

use App\Libro;
use App\Http\Requests\CrearLibroRequest;

class LibrosController extends Controller
{
    /**
     * Muestra todos los libros
     * @return response
     */
    public function index(){
        $libros = Libro::all();
        return view('Libros.index', [
            'libros' => $libros,
        ]);
    }

    /**
     * Muestra el form de insertar
     * @return response
     */
    public function create(){
        return view('Libros.create');
    }

    /**
     * Se encarga de insertar el libro en la BD
     * @var App\Http\Requests\CrearLibroRequest $request
     * @return response
     */
    public function store(CrearLibroRequest $request){

        $data = $request->validated();

        $portada = 'storage/portadas/notFound.png';

        if($request->hasFile('portada')){
            $file = $data['portada'];

            $portada = time() . Str::kebab($file->getClientOriginalName());

            $file->storeAs('public/portadas', $portada);

            $portada = 'storage/portadas/' . $portada;
        }

        $data['portada'] = $portada;

        $libro = Libro::create($data);

        if($libro){
            return redirect(route('libros.index'));
        }

        dd($data);
    }

    /**
     * Se encarga de insertar el libro en la BD
     * @param Libro $libro
     * @return response
     */

    public function show(Libro $libro){
        return view('libros.show', [
            'libro' => $libro
        ]);
    }

    /**
     * muestra el form de editar
     * @return response
     */

    public function edit(Libro $libro){
        
    }

    /**
     * Se encarga de modificar el libro en la BD
     * @var App\Http\Requests\CrearLibroRequest $request
     * @return response
     */

    public function update(CrearLibroRequest $request){

    }

    /**
     * Se encarga de eliminar el libro en la BD
     * @param Libro $libro
     * @return response
     */

    public function delete(Libro $libro){

    }
}
