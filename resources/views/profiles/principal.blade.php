<x-app-layout>
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Aquí se va a mostrar el perfil</h1>
        </div>
    </header>
    
    <div class="container m-auto">
        <a href="{{route('profile.crear')}}">
            <button class="bg-red-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Nuevo Registro</button>
        </a>
        <br><br>
        <table class="min-w-full border-collapse block md:table">
            <thead class="block md:table-header-group">
                <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto md:relative">
                    <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Cargo</th>
                    <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Biografía</th>
                    <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Usuario ID</th>
                    <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Operaciones</th>
                </tr>
            </thead>
            <tbody class="block md:table-row-group">
                @foreach ($profiles as $profile)
                <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$profile->cargo}}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$profile->biografia}}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{$profile->user_id}}</td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-green-500 rounded w-full">
                            <a href="{{route('profile.mostrar', $profile->id)}}">Ver</a>
                        </button>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded w-full">
                            <a href="{{route('profile.editar', $profile)}}">Editar</a>
                        </button>
                        <form action="{{route('profile.borrar', $profile)}}" method="post">
                            @method('delete')
                            @csrf
                            @if($profile->deleted_at)
                            <button type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-grey-500 rounded w-full">
                                <a href="{{route('activarprofile', $profile->id)}}">Activar</a>
                            </button>
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded w-full" type="submit" onclick="if(!confirm('¿Desea eliminar a: {{$profile->cargo}}?')){return false;}">Borrar</button>
                            @else
                            <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 border border-red-500 rounded w-full">
                                <a href="{{route('desactivarprofile', $profile->id)}}">Desactivar</a>
                            </button>
                            @endif
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{$profiles->links()}}
</x-app-layout>
