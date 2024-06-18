<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class productoController extends Controller
{

    //El original es este
       public function principal()
       {  $producto = Producto::withTrashed()->paginate(5);
         // $producto = Producto::paginate(5);
           return view('productos.principal', ['prod' => $producto]);
      }

    //  public function principal()
    //  {
    //      $producto = Producto::paginate(10);
    //       return view('productos.index',compact('producto'));
    //  }

    //El original es este
     public function crear()
     {
         return view('productos.crear');
     }
    //  public function crear()
    //  {
    //      return view('productos.crear1');
    //  }


    //El originale es este
     public function mostrar($variable)
     {
         $producto = Producto::find($variable);
         return view("productos.mostrar", compact('producto'));
     }
    // public function mostrar($producto)
    // {
    //    $producto = Producto::find($producto);
    //    return view("Productos.mostrar1", compact('producto')); 
    // }

    public function store(Request $request)
    {
        $producto=new Producto();
        $producto->nombre=$request->nombre;
        $producto->precio=$request->precio;
        $producto->descripcion=$request->descripcion;
        $producto->categoria=$request->categoria;

        // return $request->all();
        // $producto=producto::find($id);
        $producto->save();
        //return redirect()->route('producto.index'); 
        //Cambiamos aqui para la prueba
        // return redirect()->route('producto.mostrar1', $producto->id);
        //Cambiamos aqui para el original
        return redirect()->route('producto.mostrar', $producto->id);
    }


     public function borrar($id){
        $producto=Producto::withTrashed()->find($id);
        $producto->forceDelete();
        return redirect()->route('producto.principal');
     }

     public function desactivaproducto($id){
        $producto=Producto::find($id);
        $producto->delete();
        return redirect()->route('producto.principal');
     }

     public function activaproducto($id){
        $producto=Producto::withTrashed()->find($id);
        $producto->restore($id);
        return redirect()->route('producto.principal');
     }


    public function editar(Producto $producto){
        return view('productos.editar', compact('producto'));
    }

    public function update(Request $request , Producto $producto){
        $producto->nombre=$request->nombre;
        $producto->precio=$request->precio;
        $producto->descripcion=$request->descripcion;
        $producto->categoria=$request->categoria;
        $producto->save();
        return redirect()->route('producto.mostrar', $producto->id);
    }

}