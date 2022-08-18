<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Editar $product->name") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @component('components.cruds.edit')
                        @slot('action',route('products.update',$product->id))
                        @slot('form')
                            @include('products.form')
                        @endslot
                        @slot('back')
                            <a href="{{route('products.index')}}" class="btn btn-secondary me-2 mt-1">Voltar</a>
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
