@component('mail::message')
    # Produto criado

    - Nome : {{$product_name}}
    - Sabor : {{$product_flavor }}
    - Preço : {{$product_price}}

@component('mail::button', ['url' => route('products.show',$product_id)])
        Ver produto
@endcomponent

    Obrigado,<br>
    {{ config('app.name') }}

@endcomponent
