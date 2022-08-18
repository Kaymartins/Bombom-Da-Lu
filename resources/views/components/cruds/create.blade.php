@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $action ?? '/' }}" method="post" enctype="multipart/form-data">
    @csrf
    {{$form ?? null}}
    <button type="submit" class="btn btn-primary">Adicionar </button>
</form>

