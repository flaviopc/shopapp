@extends('layout.app')

@section('content')
@include('shared.errors')
<div class="card">
    <h5 class="card-header">Alterar produto</h5>
    <div class="card-body">

        <form method="POST" action="{{route('products.update',['id'=>$product->id])}}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Produto</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}"
                    placeholder="Informe o nome do produto">
                <input type="hidden" name="id" value="{{ $product->id }}">
            </div>
            <div class="mb-3">
                <label for="tags-select" class="form-label">Tags</label>
                @if ($tags)
                <select id="tags-select" name="tags[]" class="form-select" size="5" multiple>
                    @foreach ($tags as $tag)
                    @if ($product->tags->contains($tag))
                    <option selected value="{{$tag->id}}">{{$tag->name}}</option>
                    @else
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endif
                    @endforeach
                </select>
                @else
                <p>Você ainda não cadastrou tags <a href="{{ route('tags.create')}}">Cadastre agora</a></p>
                @endif
            </div>
            <a class="btn btn-warning" href="{{ route('products.index')}}">Cancelar</a>
            <input class="btn btn-primary" type="submit" value="Salvar">
        </form>
    </div>
</div>
@endsection
