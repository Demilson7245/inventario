<?php


namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function principal()
    {
        $categorias = Categoria::withTrashed()->paginate(5);
        return view('categorias.principal', ['cat' => $categorias]);
    }

    public function crear()
    {
        return view('categorias.crear');
    }

    public function mostrar($variable)
    {
        $categoria = Categoria::find($variable);
        return view("categorias.mostrar", compact('categoria'));
    }

    public function store(Request $request)
    {
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();

        return redirect()->route('categoria.mostrar', $categoria->id);
    }

    public function borrar($id)
    {
        $categoria = Categoria::withTrashed()->find($id);
        $categoria->forceDelete();
        return redirect()->route('categoria.principal');
    }

    public function desactivacategoria($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect()->route('categoria.principal');
    }

    public function activacategoria($id)
    {
        $categoria = Categoria::withTrashed()->find($id);
        $categoria->restore();
        return redirect()->route('categoria.principal');
    }

    public function editar(Categoria $categoria)
    {
        return view('categorias.editar', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();

        return redirect()->route('categoria.mostrar', $categoria->id);
    }
}

