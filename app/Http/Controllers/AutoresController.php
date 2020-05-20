<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutoresController extends Controller
{
    /**
     * Muestra todos los libros
     * @return response
     */
    public function index(){
        $autores = Autor::all();
        return view('Autores.index', [
            'autores' => $autores,
        ]);
    }

    /**
     * Muestra el form de insertar
     * @return response
     */
    public function create(){
        return view('Autores.create');
    }

    /**
     * Se encarga de insertar el libro en la BD
     * @var App\Http\Requests\CrearLibroRequest $request
     * @return response
     */
    public function store(CrearAutorRequest $request){

        $data = $request->validated();

        $avatar = 'storage/avatares/notFound.png';

        if($request->hasFile('avatar')){
            $file = $data['avatar'];

            $avatar = time() . $file->getClientOriginalName();

            $file->storeAs('public/avatares', $avatar);

            $avatar = 'storage/avatares' . $avatar;
        }

        $data['avatar'] = $avatar;

        $autor = Autor::create($data);

        if($autor){
            return redirect(route('autores.index'));
        }

        dd($data);
    }

    /**
     * Se encarga de insertar el libro en la BD
     * @param Libro $libro
     * @return response
     */

    public function show(Autor $autor){
        return view('autores.show', [
            'autor' => $autor
        ]);
    }

    /**
     * muestra el form de editar
     * @return response
     */

    public function edit(Autor $autor){
        
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

    public function delete(Autor $autor){

    }
}
