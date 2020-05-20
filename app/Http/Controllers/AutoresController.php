<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Http\Requests\CrearAutorRequest;
use Illuminate\Support\Str;

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
     * @var App\Http\Requests\CrearAutorRequest $request
     * @return response
     */
    public function store(CrearAutorRequest $request){

        $data = $request->validated();

        //dd($data);
        
        $avatar = 'storage/avatares/notFound.png';

        if($request->hasFile('avatar')){
            $file = $data['avatar'];

            $avatar = time() . Str::kebab($file->getClientOriginalName());

            $file->storeAs('public/avatares', $avatar);

            $avatar = 'storage/avatares' . $avatar;
        }

        $data['avatar'] = $avatar;

        $autor = Autor::create($data);

        if($autor){
            return redirect(route('autores.index'));
        }

        
    }

    /**
     * Se encarga de insertar el libro en la BD
     * @param Autor $autor
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
     * @var App\Http\Requests\CrearAutorRequest $request
     * @return response
     */

    public function update(CrearAutorRequest $request){

    }

    /**
     * Se encarga de eliminar el libro en la BD
     * @param Autor $autor
     * @return response
     */

    public function delete(Autor $autor){

    }
}
