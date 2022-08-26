<form>
    <div class="mb-3">
        <label for="name" class="form-label">Nome:</label>
        <input type="text"
               id="name"
               name="name"
               class="form-control mb-2"
               readonly
               disabled
               value="{{$product->name}}">

        <label for="flavor" class="form-label">Sabor:</label>
        <input type="text"
               id="flavor"
               name="flavor"
               class="form-control mb-2"
               readonly
               disabled
               value="{{$product->flavor}}">

        <label for="price" class="form-label">Preço:</label>
        <input type="text"
               id="price"
               name="price"
               class="form-control mb-2"
               readonly
               disabled
               value="{{$product->price}}">

        <label for="description" class="form-label">Descrição:</label>
        <textarea
            id="description"
            name="description"
            class="form-control mb-2"
            readonly
            disabled>
            {{$product->description}}
        </textarea>

        <label for="image" class="form-label">Imagem:</label>
        <img src="/images/{{$product->image}}" class="img-thumbnail" width="300px" height="200px" alt="{{$product->image}}">

    </div>
    <div class="d-flex justify-content-end">
        @can('update',Auth::user())
            <a href="{{route("products.edit",$product->id)}}" class="btn btn-primary me-2">Editar</a>
        @endcan
            <a href="{{route("products.index")}}" class="btn btn-secondary me-2">Voltar</a>

    </div>
</form>
