@extends('layout.app')

@section('content')
@include('shared.alert_success')

<div class="card">
    <h5 class="card-header">Tags cadastradas</h5>
    <div class="card-body">
        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('tags.create')}}">Cadastrar tag</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Tag</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($tags as $tag )
                <tr>
                    <th scope="row">{{$tag->id}}</th>
                    <td>{{$tag->name}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="{{route('tags.destroy',$tag->id)}}" class="btn btn-sm btn-danger">Deletar</a>
                            <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-sm btn-warning">Editar</a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">Sem tags</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{ $tags->links()}}
    </div>
</div>

@endsection
