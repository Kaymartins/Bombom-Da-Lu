<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("$product->name") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{url()->previous()}}" class="btn btn-secondary mb-3">Voltar</a>
                    <div class="border row row-cols-1 row-cols-md-2">
                        <div class="col">
                            <div class="d-flex justify-content-center p-2 ">
                                <img src="/images/{{$product->image}}" class="img-thumbnail mt-3" alt="{{$product->image}}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex flex-column justify-content-center w-100 mt-2">
                                <div class="border p-2">
                                    <h3>{{$product->name}}</h3>
                                    <p class="fw-normal">Sabor : {{$product->flavor}}</p>
                                    @isset($product->amount)
                                        <span class="text-success fs-5">Em Estoque </span>
                                        <span class="fs-5"> | </span>
                                        <span> Unidades restantes: {{$product->amount}}</span>
                                    @else
                                        <span class="text-danger fs-5">Fora de Estoque</span>
                                    @endisset
                                    <h3 class="mt-3">R$ : {{$product->price}}</h3>
                                    <p>{{$product->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
