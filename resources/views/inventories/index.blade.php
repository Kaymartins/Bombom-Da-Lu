<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Estoque') }}
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
                        @can('create',Auth::user())
                            <a href="{{route('inventories.create')}}" class="btn btn-dark mb-3">Adicionar</a>
                        @endcan
                    </div>
                    <div class="card-body table-responsive ">
                        <table  class="table table-hover table-striped" id="table">
                            <thead>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Data</th>
                                <th></th>
                            </thead>
                            <tbody id="tbody">
                                @foreach($inventories as $inventory)
                                    <tr>
                                        <td>{{$inventory->product->name}}</td>
                                        <td>{{$inventory->amount}}</td>
                                        <td>{{date('d/m/Y',strtotime($inventory->date))}}</td>

                                        <td class="options d-flex flex-row flex-wrap justify-content-end gap-1">
                                            <a href="{{route('inventories.show',$inventory->id)}}" class="btn btn-secondary btn-sm me-2 mt-1 mb-1">Visualizar</a>

                                            @can('update',Auth::user())
                                                <a href="{{route('inventories.edit',$inventory->id)}}" class="btn btn-primary btn-sm me-2 mt-1 mb-1">Editar</a>
                                            @endcan

                                            @can('delete',Auth::user())
                                                <form action="{{route('inventories.destroy',$inventory->id)}}" method="post" class="me-2 mt-1 mb-1">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm">Excluir</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
