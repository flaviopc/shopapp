@extends('layout.app')

@section('content')
@include('shared.errors')
<form method="POST" action="{{route('tags.update',['id'=>$tag->id])}}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Produto</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $tag->name }}"
            placeholder="Informe o nome da tag">
        <input type="hidden" name="id" value="{{ $tag->id }}">
    </div>
    <input type="submit" value="Salvar">
</form>
@endsection
