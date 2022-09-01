<div class="mb-3">
    <label for="product_id" class="form-label">Produto:</label>
    <select
        name="product_id"
        id="product_id"
        class="form-control form-select mb-2">
        <option value="{{ old('product_id', $inventory->product_id ?? null) }}" hidden>{{old('product_name', $inventory->product->name ?? 'Selecione um produto')}}</option>
        @foreach($products as $product)
            <option value="{{$product->id}}">{{$product->name}} ({{$product->flavor}})</option>
        @endforeach

    </select>

    <label for="amount" class="form-label">Quantidade:</label>
    <input type="number"
           id="amount"
           name="amount"
           class="form-control mb-2"
           value="{{ old('amount',$inventory->amount)}}"
           onkeypress="filterInput(event)">

    <label for="date" class="form-label">Data:</label>
    <input type="date"
           id="date"
           name="date"
           class="form-control mb-2"
           value="{{ old('date',$inventory->date)}}">

</div>

<script>
    function filterInput(event){
        var ch = String.fromCharCode(event.which);
        if(!(/[0-9]+/.test(ch))){
            event.preventDefault();
        }
    }
</script>


