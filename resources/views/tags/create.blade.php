@extends('layout.app')

@section('content')
@include('shared.errors')
@include('shared.title',['title'=>'Cadastrar tag'])
<form method="POST" action="{{route('tags.store')}}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Tag</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Informe o nome da tag">
    </div>
    <a class="btn btn-warning" href="{{ route('tags.index')}}">Cancelar</a>
    <input class="btn btn-primary" type="submit" value="Salvar">
</form>
@endsection
