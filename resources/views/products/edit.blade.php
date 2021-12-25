@extends('layout.app')

@section('content')
@include('shared.errors')
<form method="POST" action="{{route('products.update',['id'=>$product->id])}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Produto</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}"
            placeholder="Informe o nome do produto">
        <input type="hidden" name="id" value="{{ $product->id }}">
    </div>
    <input type="submit" value="Salvar">
</form>
@endsection
