<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Medida;
use Illuminate\Support\Facades\DB;
use App\Http\controllers\QueryException;

class MedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check())
        {
            $medidas= Medida::all();
             
            return View::make('medidas.index',compact('medidas'));
        }else{
            return redirect()->to('/');
        }
    }


    // public function create()
    // {
    //     if(Auth::check())
    //     {
    //        return view('medidas.create');
    //     }else{
    //         return redirect()->to('/');
    //     }
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    if (Auth::check()) {
        try {
            DB::beginTransaction();

            $medida = new Medida();
            $medida->nombre_medida = $request->input('nombre');
            $medida->nombre_corto = $request->input('nombrecorto');
            $medida->fecha = now(); // Establecer la fecha actual
            $medida->estado = 1;
            $medida->save();

            DB::commit();

            return response()->json([
                'mensaje' => 'Guardado con éxito',
                'idnotificacion' => 1
            ]);
        } catch (QueryException $e) {
            
            DB::rollback();
            return response()->json([
                'mensaje' => 'Error al guardar: ' . $e->getMessage(),
                'idnotificacion' => 2
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json([
                'mensaje' => 'Error al guardar: ' . $e->getMessage(),
                'idnotificacion' => 2
            ]);
        }
    } else {
        return redirect()->to('/');
    }
}

    /**
     * Display the specified resource.
     */
    public function show($idmedida)
    {
        try {
            if (Auth::check()) {
                $medida = Medida::find($idmedida);
    
                if ($medida) {
                    return response()->json($medida);
                } else {
                    return response()->json(['error' => 'Medida no encontrada'], 404);
                }
            } else {
                return response()->json(['error' => 'No autenticado'], 401);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $idmedida)
    {
        
        if (Auth::check()) {
            try {
                DB::beginTransaction();
    
                $medida = Medida::find($idmedida);
                $medida->nombre_medida = $request->input('nombre');
                $medida->nombre_corto = $request->input('nombrecorto');
                $medida->fecha = now(); // Establecer la fecha actual
                $medida->estado = 1;
                $medida->save();
    
                DB::commit();
    
                return response()->json([
                    'mensaje' => 'Guardado con éxito',
                    'idnotificacion' => 1
                ]);
            } catch (QueryException $e) {
                
                DB::rollback();
                return response()->json([
                    'mensaje' => 'Error al guardar: ' . $e->getMessage(),
                    'idnotificacion' => 2
                ]);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json([
                    'mensaje' => 'Error al guardar: ' . $e->getMessage(),
                    'idnotificacion' => 2
                ]);
            }
        } else {
            return redirect()->to('/');
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
