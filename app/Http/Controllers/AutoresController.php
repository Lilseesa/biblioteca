<?php

namespace App\Http\Controllers;

use App\Autor;
use App\Http\Requests\AutorRequest;
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
     * @var App\Http\Requests\AutorRequest $request
     * @return response
     */
    public function store(AutorRequest $request){

        $data = $request->validated();

        //dd($data);
        
        $avatar = 'storage/avatares/notFound.png';

        if($request->hasFile('avatar')){
            $file = $data['avatar'];

            $avatar = time() . Str::kebab($file->getClientOriginalName());

            $file->storeAs('public/avatares/', $avatar);

            $avatar = 'storage/avatares/' . $avatar;
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
        return view('Autores.show', [
            'autor' => $autor
        ]);
    }

    /**
     * muestra el form de editar
     * @return response
     */

    public function edit(Autor $autor){
        return view('Autores.edit', [
            'autor' => $autor
        ]);
    }

    /**
     * Se encarga de modificar el autor en la BD
     * @var App\Http\Requests\AutorRequest $request
     * @return response
     */

    public function update(AutorRequest $request,  Autor $autor){
        $data = $request->validated();

        $avatar = $autor->avatar;

        if($request->hasFile('avatar')){
            $file = $data['avatar'];

            $avatar = time() . Str::kebab($file->getClientOriginalName());

            $file->storeAs('public/avatares/', $avatar);

            $avatar = 'storage/avatares/' . $avatar;
        }

        $data['avatar'] = $avatar;

        if($autor->update($data)){
            return redirect(route('autores.index'));
        }

        dd($data);
    }

    /**
     * Se encarga de eliminar el libro en la BD
     * @param Autor $autor
     * @return response
     */

    public function destroy(Autor $autor){
        if($autor->delete()){
            return response()->json(['error' => false],202);    
        }
        return response()->json(['error' => true],202);
    }
}
