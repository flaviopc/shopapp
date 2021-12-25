@extends('layout.app')

@section('content')
@include('shared.errors')
<form method="POST" action="{{route('products.store')}}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Produto</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Informe o nome do produto">
    </div>
    <div class="mb-3">
        <label for="tags-select" class="form-label">Tags</label>
        @if ($tags)
        <select id="tags-select" name="tags[]" class="form-select" size="5" multiple>
            @foreach ($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        </select>
        @else
        <p>Você ainda não cadastrou tags <a href="{{ route('tags.create')}}">Cadastre agora</a></p>
        @endif
    </div>
    <input class="btn btn-primary" type="submit" value="Salvar">
</form>
@endsection
