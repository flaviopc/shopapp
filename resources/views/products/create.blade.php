@extends('layout.app')

@section('content')
@include('shared.errors')
<form method="POST" action="{{route('products.store')}}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Produto</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Informe o nome do produto">
    </div>
    <input type="submit" value="Salvar">
</form>
@endsection
