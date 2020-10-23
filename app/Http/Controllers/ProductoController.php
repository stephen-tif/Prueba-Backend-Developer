<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    //Agregar nuevo productos
    public function store(Request $request)
    {
        try{
            $rules = [
                'nombre' => 'required',
                'cantidad' => 'required',
                'precio' => 'required',
            ];
            $validate = validator::make($request->all(), $rules);

            if($validate->fails()) {
                return response()->json([$validate->errors()], 400);
            }

            if($request->hasFile('imagen')) {
                $request['imagen'] = $request->file('imagen')->store('uploads', 'public');
            }

            $producto = Producto::create($request->all());
            return response()->json($producto);

        } catch(Exception $e){

            return response()->json(['Error'=>$e->getMessage()], 400);
        }
    }


    //Mostrar los Productos
    public function show()
    {
        try{
            $result = Producto::paginate(15);
            return response()->json($result);

        } catch(Exception $e){

            return response()->json(['Error'=>$e->getMessage()], 400);
        }
    }


    //Mostrar producto por id
    public function get($id)
    {
        try{
            $result = Producto::find($id);
            return response()->json($result);

        } catch(Exception $e){

            return response()->json(['Error'=>$e->getMessage()], 400);
        }
    }


    //Modificar un producto
    public function update($id, Request $request)
    {
        try{
            $result = Producto::find($id);

            if($request->hasFile('imagen')) {
                Storage::delete('public/'.$result->imagen);

                $request['imagen'] = $request
                        ->file('imagen')
                        ->store('uploads', 'public');
            }

            $result->fill($request->all())->save();
            return response()->json($result);

        } catch(Exception $e){

            return response()->json(['Error'=>$e->getMessage()], 400);
        }
    }


    //Eliminar un producto
    public function destroy($id)
    {
        try{
            $result = Producto::find($id);
            Storage::delete('public/'.$result->imagen);

            $result->delete();
            return response()->json($result);

        } catch(Exception $e){

            return response()->json(['Error'=>$e->getMessage()], 400);
        }
    }

    //Busqueda de producto
    public function search($param)
    {
        try{
            $result = Producto::orderBy('id','ASC')
                ->where('nombre','LIKE',"%$param%")
                ->orWhere('sku','LIKE',"%$param%")
                ->get();
            return response()->json($result);

        } catch(Exception $e){

            return response()->json(['Error'=>$e->getMessage()], 400);
        }
    }
}
