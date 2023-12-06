<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Http\controllers\QueryException;

class CategoriaController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $categorias = Categoria::all();
            return View::make('categorias.index', compact('categorias'));
        } else {
            return redirect()->to('/');
        }
    }

    public function store(Request $request)
    {
        if (Auth::check()) {
            try {
                DB::beginTransaction();

                $categorias = new Categoria();
                $categorias->nombre_categoria = $request->input('nombre_categoria');
                $categorias->fecha = now();
                $categorias->estado = 1;
                $categorias->save();

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

    public function show($idcategoria)
    {
        if (Auth::check()) {
            try {

                $categoria = Categoria::find($idcategoria);

                if ($categoria) {
                    return response()->json($categoria);
                } else {
                    return response()->json(['error' => 'categoria no encontrada'], 404);
                }
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        } else {
            return redirect()->to('/');
        }
    }

    public function update(Request $request, $idcategoria)
    {
        if (Auth::check()) {
            try {
                DB::beginTransaction();

                $categoria = Categoria::find($idcategoria);
                $categoria->nombre_categoria = $request->input('nombre_categoria_edit');
                $categoria->fecha = now();
                $categoria->estado = 1;
                $categoria->save();

                DB::commit();

                return response()->json([
                    'mensaje' => 'Actualizado con éxito',
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
}
