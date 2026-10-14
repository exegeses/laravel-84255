<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PersonaController extends Controller
{
    public function index() : View
    {
        // obtenemos listado de personas
        //$personas = DB::select('select * from personas');
        $personas = DB::table('personas')
                        ->orderByDesc('id')
                        ->get();
        return view('index', ['personas' => $personas]);
    }

    public function create() : View
    {
        return view('create');
    }

    public function store(Request $request) : RedirectResponse
    {
        // datos enviados por el form
        $nombre = $request->nombre;
        $apellido = $request->apellido;
        $dni = $request->dni;
        $telefono = $request->telefono;
        $nacimiento = $request->nacimiento;
        try {
            DB::table('personas')->insert(
                [
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'dni' => $dni,
                    'telefono' => $telefono,
                    'nacimiento' => $nacimiento
                ]);
            return redirect('/')
                    ->with([
                        'status'=> 'success',
                        'mensaje' => 'Persona: '.$nombre.' '.$apellido.' agregada correctamente.'
                    ]);
        }
        catch (\Illuminate\Database\QueryException $e){
            //$mensaje = $e->getMessage();
            return redirect('/')
                    ->with([
                        'status'=> 'error',
                        'mensaje' => 'No se pudo agregar la persona: '.$nombre.' '.$apellido.'.'
                    ]);
        }
    }

    private function checkPersona($id)
    {
        $persona = DB::table('personas')
            ->where('id', $id)
            ->first();
        # abort_if($persona === null, 404);
        return $persona;
    }

    public function edit($id) : View | RedirectResponse
    {
        $persona = $this->checkPersona($id);
        if( !$persona ){
            return redirect('/')
                ->with([
                    'status'=> 'warning',
                    'mensaje' => 'Persona no encontrada.'
                ]);
        }
        return view('edit', ['persona' => $persona]);
    }

    public function update(Request $request, $id) : RedirectResponse
    {
        $persona = $this->checkPersona($id);
        if( !$persona ){
            return redirect('/')
                ->with([
                    'status'=> 'warning',
                    'mensaje' => 'Persona no encontrada.'
                ]);
        }
        // datos enviados por el form
        $nombre = $request->nombre;
        $apellido = $request->apellido;
        $dni = $request->dni;
        $telefono = $request->telefono;
        $nacimiento = $request->nacimiento;
        try {
            DB::table('personas')
                ->where('id', $id)
                ->update([
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'dni' => $dni,
                    'telefono' => $telefono,
                    'nacimiento' => $nacimiento
                ]);
            return redirect('/')
                    ->with([
                        'status'=> 'success',
                        'mensaje' => 'Persona: '.$nombre.' '.$apellido.' modificada correctamente.'
                    ]);
        }catch (QueryException $e){
            return redirect('/')
                ->with([
                    'status'=> 'error',
                    'mensaje' => 'No se pudo modificar la persona: '.$nombre.' '.$apellido.'.'
                ]);
        }
    }

    public function confirm($id) : View | RedirectResponse
    {
        $persona = $this->checkPersona($id);
        if( !$persona ){
            return redirect('/')
                ->with([
                    'status'=> 'warning',
                    'mensaje' => 'Persona no encontrada.'
                ]);
        }
        return view('confirm', ['persona' => $persona]);
    }

    public function destroy($id) : RedirectResponse
    {
        $persona = $this->checkPersona($id);
        if( !$persona ){
            return redirect('/')
                ->with([
                    'status'=> 'warning',
                    'mensaje' => 'Persona no encontrada.'
                ]);
        }
        try {
            DB::table('personas')
                ->where('id', $id)
                ->delete();
            return redirect('/')
                    ->with([
                        'status'=> 'success',
                        'mensaje' => 'Persona: '.$persona->nombre.' '.$persona->apellido.' eliminada correctamente.'
                    ]);
        }catch (QueryException $e){
            return redirect('/')
                    ->with([
                        'status'=> 'error',
                        'mensaje' => 'No se pudo eliminar la persona: '.$persona->nombre.' '.$persona->apellido.'.'
                    ]);
        }
    }
}
