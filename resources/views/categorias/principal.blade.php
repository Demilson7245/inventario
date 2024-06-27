{{-- @extends('layout.plantilla')

@section('titulo','principal') --}}

<x-app-layout>
@section('contenido')
<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold tracking-tight text-gray-900">Aqui se va a mostrar la categoria</h1>
    </div>
    </header>
{{-- <H1>Aqui se va mostrar todos los poductos</H1><tr></tr> --}}

<div class="container  m-auto">
<a href="{{route('categoria.crear')}}"><button class="bg-red-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Nuevo Registro</button></a>
<!-- component --><br>
<br>
<table class="min-w-full border-collapse block md:table">
    <thead class="block md:table-header-group">
        <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Nombre</th>
            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Descripción</th>
            <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Operaciones</th>

        </tr>
    </thead>
    <tbody class="block md:table-row-group">
        @foreach ($cat as $c )
        <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Nombre</span><a href="{{route('categoria.mostrar',$c->id)}}">{{$c->nombre}}</td>

            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Descripción</span>{{$c->descripcion}}</td>
            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                <span class="inline-block w-1/3 md:hidden font-bold">Operaciones</span>
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-green-500 rounded w-full" ><a href="{{route('categoria.mostrar',$c->id)}}">Ver</a></button>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded w-full"><a href="{{route('categoria.editar',$c)}}">Editar</a></button>
                
                <form action="{{route('categoria.borrar', $c)}}" method="post">
                    @method('delete')
                    @csrf
                @if($c->deleted_at)
                 <button type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-grey-500 rounded w-full"><a href="{{route('activacat',$c->id)}}">Activar</a></button>
                 <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded w-full" type="sumit" value="borrar" onclick="if(!confirm('Desea eliminar a :  {{$c->nombre}}?')){return false;}"/>Borrar</button>
                @else
                    <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 border border-red-500 rounded w-full"><a href="{{route('desactivacat',$c->id)}}">Desactivar</a></button>
                
                @endif
              </form>
            </td>
        </tr>
        @endforeach
    </tbody>
	
</table>
</div>
{{$cat->links()}};

</x-app-layout>
{{-- @endsection --}}
