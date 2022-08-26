<div class="mb-3">
    <label for="name" class="form-label">Nome:</label>
    <input type="text"
           id="name"
           name="name"
           class="form-control mb-2"
           value="{{ old('name',$product->name)}}">

    <label for="flavor" class="form-label">Sabor:</label>
    <input type="text"
           id="flavor"
           name="flavor"
           class="form-control mb-2"
           value="{{ old('flavor',$product->flavor)}}">

    <label for="price" class="form-label">Preço:</label>
    <input type="text"
           id="price"
           name="price"
           class="form-control mb-2"
           value="{{ old('price',$product->price)}}"
           onkeypress="filterInput(event)">

    <label for="description" class="form-label">Descrição:</label>
    <textarea
           id="description"
           name="description"
           class="form-control mb-2">
            {{ old('$description',$product->description)}}
    </textarea>

    <label for="image" class="form-label">Imagem:</label>
    <input type="file"
           id="image"
           name="image"
           class="form-control mb-2">
    @isset($product->image)
        <img src="/images/{{$product->image}}" class="img-thumbnail" width="300px" height="200px" alt="{{$product->image}}">
    @endisset

</div>

<script>
    function filterInput(event){
        var ch = String.fromCharCode(event.which);
        if(!(/[0-9\.]+/.test(ch))){
            event.preventDefault();
        }
    }
</script>

