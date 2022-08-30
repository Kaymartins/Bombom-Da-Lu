<form>
    <div class="mb-3">
        <label for="product_name" class="form-label">Produto:</label>
        <input type="text"
               id="product_name"
               name="product_name"
               class="form-control mb-2"
               readonly
               disabled
               value="{{$inventory->product->name}}">

        <label for="product_flavor" class="form-label">Sabor:</label>
        <input type="text"
               id="product_flavor"
               name="product_flavor"
               class="form-control mb-2"
               readonly
               disabled
               value="{{$inventory->product->flavor}}">

        <label for="product_price" class="form-label">Preço Unitario:</label>
        <input type="text"
               id="product_price"
               name="product_price"
               class="form-control mb-2"
               readonly
               disabled
               value="{{$inventory->product->price}}">

        <label for="amount" class="form-label">Quantidade:</label>
        <input type="text"
               id="amount"
               name="amount"
               class="form-control mb-2"
               readonly
               disabled
               value="{{$inventory->amount}}">

    </div>
    <div class="d-flex justify-content-end">

        @can('update')
            <a href="{{route("inventories.edit",$inventory->id)}}" class="btn btn-primary me-2">Editar</a>
        @endcan

        <a href="{{route("products.show",$inventory->product_id)}}" class="btn btn-secondary me-2">Ver produto</a>
        <a href="{{route("inventories.index")}}" class="btn btn-secondary me-2">Voltar</a>

    </div>
</form>
