@extends('layout.app')

@section('content')
@include('shared.alert_success')
<div class="card">
    <h5 class="card-header">Produtos cadastrados</h5>
    <div class="card-body">
        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('products.create')}}">Cadastrar produto</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Tags</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product )
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->name}}</td>
                    <td>
                        @foreach ($product->tags as $tag)
                        <span class="badge bg-info text-dark">{{ $tag->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="{{route('products.destroy',$product->id)}}"
                                class="btn btn-sm btn-danger">Deletar</a>
                            <a href="{{route('products.edit',$product->id)}}" class="btn btn-sm btn-warning">Editar</a>
                        </div>

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3">Sem produtos</td>
                </tr>
                @endforelse

            </tbody>
        </table>
        {{ $products->links() }}
    </div>
</div>

@endsection
