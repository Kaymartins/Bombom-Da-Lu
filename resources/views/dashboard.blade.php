<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-orange-200 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-orange-200 border-b border-orange-200">
                    <h3 class="text-2xl">Seja bem vindo ao <span class=" text-rose-500 font-bold">Bombom da Lu </span> ! </h3><br>
                    <p class="text-xl mb-3">Veja alguns de nossos produtos em estoque:</p>
                    <div class="row row-cols-1 rol-cols-sm-2 row-cols-md-5 justify-content-center">
                        @foreach($inventories as $inventory)
                            <div class="card me-2 mt-2 bg-rose-200" style="width: 18rem;">

                                <div class="d-flex justify-content-center mt-2 mb-2">
                                    <img src="images/{{$inventory->product->image}}" class="card-img-top img-fluid w-4/5 rounded" alt="{{$inventory->product->image}}">
                                </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-center">
                                            <h5 class="card-title text-base font-bold">{{$inventory->product->name}}</h5>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <h6 class="card-subtitle mb-2 text-base text-muted">{{$inventory->product->flavor}}</h6>
                                        </div>

                                    <p class="card-text">{{$inventory->product->description}}</p>
                                    <a href="{{route('products.show',$inventory->product_id)}}" class="btn btn-primary mt-3">Ver Produto</a>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
