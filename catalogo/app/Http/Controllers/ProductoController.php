<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        // with() para resolver el N+1
        $productos = Producto::with(['marcas', 'categorias'])
                                ->orderByDesc('id_producto')
                                // ->where('activo', 1)
                                ->paginate(8);
        return view('productos.index', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        // obtener listados de marcas y categorías
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view('productos.create',
                [
                    'marcas' => $marcas,
                    'categorias' => $categorias
                ]);
    }

    private function subirImagen(Request $request)
    {
        // si no enviaron imagen store()
        $imagen = 'no-disponible.svg';

        // si enviaron imagen
        if( $request->hasFile('imagen') ){
            // renombrar usando uniqid() manteniendo extension
            $ruta = public_path('img/productos/');
            // subir archivo
        }
        return $imagen;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductoRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
