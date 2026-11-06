<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\RedirectResponse;
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

    private function subirImagen(Request $request) : string
    {
        /*
        // si no enviaron imagen store()
        $imagen = 'no-disponible.svg';
        // si no enviaron imagen update()
        if( $request->imgActual){
            $imagen = $request->imgActual;
        }
        */
        $imagen = $request->imgActual ?: 'no-disponible.svg';

        // si enviaron imagen
        if( $request->hasFile('imagen') ){
            // renombrar usando uniqid() manteniendo extension
            $file = $request->file('imagen');
            $extension = $file->getClientOriginalExtension();
            $imagen = uniqid().'.'.$extension;
            $ruta = public_path('img/productos/');
            // subir archivo
            $file->move($ruta , $imagen);
        }
        return $imagen;
    }

    private function borrarImagen(string $imagen): void
    {
        if ($imagen !== 'no-disponible.svg') {
            $ruta = public_path('/img/productos/' . $imagen);
            // Verificamos que el archivo exista antes de intentar borrarlo
            if (file_exists($ruta)) {
                unlink($ruta);
            }
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductoRequest $request) : RedirectResponse
    {
        $imagen = $this->subirImagen($request);
        // obtener los datos que pasaron la validación
        $datos = $request->validated();
        $datos['imagen'] = $imagen;

        try {
            Producto::create($datos);

            return redirect('/productos')
                ->with(
                    [
                        'status' => 'success',
                        'mensaje' => 'Producto: '.$request->producto.' agregado correctamente',
                    ]
                );
        }catch (QueryException $e){
            if ($imagen) {
                $this->borrarImagen($imagen);
            }
            return redirect('/productos')
                ->with(
                    [
                        'status' => 'error',
                        'mensaje' => 'No se pudo agregar el producto: '.$request->producto.'.',
                    ]
                );
        }
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
    public function edit(string $id) : View
    {
        $producto = Producto::with(['marcas', 'categorias'])->findOrFail($id);
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view('productos.edit',
                [
                    'producto' => $producto,
                    'marcas' => $marcas,
                    'categorias' => $categorias
                ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductoRequest $request, string $id)
    {
        $producto = Producto::findOrFail($id);
        $imagen = $this->subirImagen($request);
        // 1. Obtenemos los datos que pasaron la validación
        $datos = $request->validated();
        // 2. Agregamos el nombre del archivo de imagen
        $datos['imagen'] = $imagen;
        try {
            $producto->update($datos);
            return redirect('/productos')
                ->with(
                    [
                        'status' => 'success',
                        'mensaje' => 'Producto: '.$datos['producto'].' modificado correctamente',
                    ]
                );
        }catch (QueryException $e){
            if ($imagen) {
                $this->borrarImagen($imagen);
            }
            return redirect('/productos')
                ->with(
                    [
                        'status' => 'error',
                        'mensaje' => 'No se pudo modificar el producto: '.$datos['producto'].'.',
                    ]
                );
        }
    }

    public function confirm(string $id) : View
    {
        $producto = Producto::with(['marcas', 'categorias'])->findOrFail($id);
        return view('productos.confirm', ['producto' => $producto]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $producto = Producto::findOrFail($id);
        try {
            $imagen = $producto->imagen;
            $producto->delete();
            if ($imagen) {
                $this->borrarImagen($imagen);
            }
            return redirect('/productos')
                ->with(
                    [
                        'status' => 'success',
                        'mensaje' => 'Producto: '.$producto->producto.' eliminado correctamente',
                    ]
                );
        }catch (QueryException $e){
            return redirect('/productos')
                ->with(
                    [
                        'status' => 'error',
                        'mensaje' => 'No se pudo eliminar el producto: '.$producto->producto.'.',
                    ]
                );
        }
    }
}
