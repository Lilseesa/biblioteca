<?php

namespace App\Http\Controllers;

use App\Libro;
use App\Http\Requests\LibroRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LibrosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', [
            'except' => [
                'index',
                'show',
            ]
        ]);

        $this->middleware('role:libros.index,admin', [
            'except' => [
                'index',
                'show',
            ]
        ]);
    }

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
    public function create(Request $request)
    {

        //$request->user()->authorizeRoles(['admin']);

        return view('Libros.create');
    }

    /**
     * Se encarga de insertar el libro en la BD
     * @var App\Http\Requests\LibroRequest $request
     * @return response
     */
    public function store(LibroRequest $request){

        //$request->user()->authorizeRoles(['admin']);

        $data = $request->validated();

        $userId = Auth::user()->id;

        $portada = 'storage/portadas/notFound.png';

        if($request->hasFile('portada')){
            $file = $data['portada'];

            $portada = time() . Str::kebab($file->getClientOriginalName());

            $file->storeAs('public/portadas/', $portada);

            $portada = 'storage/portadas/' . $portada;
        }

        $data['portada'] = $portada;

        $data['user_id'] = $userId;

        

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

    public function edit(Request $request, Libro $libro){

        //$request->user()->authorizeRoles(['admin']);

        return view('libros.edit', [
            'libro' => $libro
        ]);
    }

    /**
     * Se encarga de modificar el libro en la BD
     * @var App\Http\Requests\LibroRequest $request
     * @return response
     */

    public function update(LibroRequest $request, Libro $libro){

        //$request->user()->authorizeRoles(['admin']);

        $data = $request->validated();

        $portada = $libro->portada;

        if ($request->hasFile('portada')) {
            $file = $data['portada'];

            $portada = time() . Str::kebab($file->getClientOriginalName());

            $file->storeAs('public/portadas', $portada);

            $portada = 'storage/portadas/' .  $portada;
        }

        $data['portada'] = $portada;

        if ($libro->update($data)) {
            return redirect(route('libros.index'));
        }

        dd($data);
    }

    /**
     * Se encarga de eliminar el libro en la BD
     * @param Libro $libro
     * @return response
     */

    public function destroy(Request $request, Libro $libro)
    {
        //$request->user()->authorizeRoles(['admin']);

        if($libro->delete()){
            return response()->json(['error' => false],202);    
        }
        return response()->json(['error' => true],202);
    }
}
