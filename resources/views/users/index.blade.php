<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuários') }}
        </h2>
    </x-slot>

    @isset($messageSuccess)
        <div class="container w-50 mt-3 alert alert-success">
            {{$messageSuccess}}
        </div>
    @endisset

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="d-flex justify-content-end align-items-center">
                        <a href="{{route('users.create')}}" class="btn btn-dark mb-3">Adicionar</a>
                    </div>
                    <ul class="list-group border-2 border-rose-200 p-4 m-2">
                        @foreach($users as $user)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{$user->name}}

                                <div class="d-flex flex-row flex-wrap justify-content-end ">
                                    <a href="{{route('users.show',$user->id)}}" class="btn btn-secondary btn-sm me-2 mt-1 mb-1">Visualizar</a>
                                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary btn-sm me-2 mt-1 mb-1">Editar</a>

                                    <form action="{{route('users.destroy',$user->id)}}" method="post" class="me-2 mt-1 mb-1">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Excluir</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
