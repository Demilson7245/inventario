{{-- @extends('layout.plantilla')

@section('titulo', 'editar')

@section('contenido') --}}
<x-app-layout>
    <header>
    <div class=" from-teal-100 via-teal-100 to-teal-100 bg-gradient-to-br">
    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Editar un registro</h1>
    </div>
    </header>
    <!--component -->
 <div class='flex items-center justify-center min-h-screen from-teal-100 via-teal-300 to-teal-500 bg-gradient-to-br'>

    <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>

        <div class='max-w-md mx-auto space-y-6'>

            <form action="{{route('categoria.update',$categoria)}}" method="POST">
                @csrf
                @method('put')
               
                <h2 class="text-2xl font-bold ">Actualizar datos de la categoria {{$categoria->id}}</h2>
                <p class="my-4 opacity-70">Modifique los datos que necesite</p>
                <hr class="my-6">
                <label class="uppercase text-sm font-bold opacity-70">Nombre de la categoria:</label>
                <input type="text" value="{{$categoria->nombre}}"   class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none" name="nombre">
                <label class="uppercase text-sm font-bold opacity-70">Descripcion:</label>
                <input  value="{{$categoria->descripcion}}" class="w-full p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none" type="text" name="descripcion">
                <input type="submit" class="py-3 px-6 my-2 bg-emerald-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300" value="Guardar Cambios">
                <button class="py-3 px-6 my-2 bg-emerald-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300"><a href="{{route('categoria.principal')}}">Cancelar</a></button>
            </form> 

        </div>
    </div>
 </div>
</x-app-layout>
{{-- @endsection --}}
