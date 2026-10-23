<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        //$marcas = Marca::orderByDesc('id_marca')->get();
        $marcas = Marca::orderByDesc('id_marca')->paginate(8);
        return view('marcas.index', ['marcas' => $marcas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('marcas.create');
    }

    /**
     * Método para validar datos enviados por el formulario
     * @param Request $request
     * @return void
     */
    private function validarFrom(Request $request): void
    {
        $datos = $request->validate(
            ['marca' => 'required|unique:marcas,marca|min:2|max:50'],
            [
                'marca.required' => 'El campo "Marca" es obligatorio',
                'marca.unique' => 'Ya esxiste una marca con ese nombre',
                'marca.min' => 'La marca debe tener 2 caracteres como mínimo',
                'marca.max' => 'La marca debe tener 50 caracteres como máximo'
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $this->validarFrom($request);

        try {
            $marca = new Marca();
            $marca->marca = $request->marca;
            $marca->save();

            return redirect('/marcas')
                        ->with([
                                'status' => 'success',
                                'mensaje' => 'Marca: '.$marca->marca.' agregada correctamente.'
                            ]
                        );
        }
        catch (QueryException $e) {
            return redirect('/marcas')
                        ->with([
                            'status' => 'error',
                            'mensaje' => 'No se pudo agregar la marca: '.$request->marca.'.'
                        ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) : View
    {
    /*
   findOrFail($id) -> si no encuanta registro:
    1. Lanza una excepción de tipo ModelNotFoundExeption.
    2. La intercepta y sin que tengamos que escribir try{}catch(){}
    3. Redirige automáticamente a una página de error 404
    **/
        $marca = Marca::findOrFail($id);
        return view('marcas.edit', ['marca' => $marca]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validarFrom($request);
        $marca = Marca::findOrFail($id);
        try {
            $marca->marca = $request->marca;
            $marca->save();
            return redirect('/marcas')
                ->with([
                        'status' => 'success',
                        'mensaje' => 'Marca: '.$marca->marca.' modificada correctamente.'
                    ]
                );
        }
        catch (QueryException $e) {
            return redirect('/marcas')
                ->with([
                    'status' => 'error',
                    'mensaje' => 'No se pudo modificar la marca: '.$request->marca.'.'
                ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
