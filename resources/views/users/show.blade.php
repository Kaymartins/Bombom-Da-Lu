<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Informações do Usuário") }}
        </h2>
    </x-slot>

    <div class="d-flex justify-content-center">
        <div class="container row justify-content-center">
            <div class="col-sm-8 col-md-6 py-12">
                <div class="sm:px-6 lg:px-8">
                    <div class="bg-white mx-auto overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div>
                                <h4 class="text-uppercase text-center">{{$user->name}}</h4>
                                <div class="text-center text-muted">{{$user->permission}}</div>
                                <hr>
                            </div>
                            <div>
                                <strong>E-mail:</strong> {{$user->email}}<br>
                                <strong>Matricula:</strong> {{$user->registration}}<br>
                                <strong>Fidelidade:</strong> {{$user->fidelity}}<br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

