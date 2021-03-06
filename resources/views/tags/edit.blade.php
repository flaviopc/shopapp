@extends('layout.app')

@section('content')
@include('shared.errors')
<div class="card">
    <h5 class="card-header">Alterar tag</h5>
    <div class="card-body">

        <form method="POST" action="{{route('tags.update',['id'=>$tag->id])}}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Tag</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $tag->name }}"
                    placeholder="Informe o nome da tag">
                <input type="hidden" name="id" value="{{ $tag->id }}">
            </div>
            <a class="btn btn-warning" href="{{ route('tags.index')}}">Cancelar</a>
            <input class="btn btn-primary" type="submit" value="Salvar">
        </form>
    </div>
</div>
@endsection
