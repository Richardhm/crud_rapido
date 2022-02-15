@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card border-secondary mb-3">
                <div class="card-header">Detalhes do Produto</div>
                <div class="card-body">
                    <h3 class="card-title">{{$product->name}}</h3>
                    <p class="card-text">{{$product->description}}</p>
                    <p><b>Preço:</b> {{$product->price}}</p>
                    <p><b>Estoque:</b> {{$product->stock}}</p>
                </div>
                <div class="card-footer">
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <a href="{{route('products.index')}}" class="btn btn-outline-dark">
                            Listagem de Produto
                        </a>
                    </div>    
                    
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
