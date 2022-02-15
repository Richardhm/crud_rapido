@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Produto {{$product->name}}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('products.update',['product'=>$product->id])}}">
						@csrf
						@method('PUT')	
						<div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Nome:</label>
                            <div class="col-md-8">
                                <input class="form-control" id="name" type="text" name="name" value="{{ $product->name ?? old('name') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Description" class="col-md-4 col-form-label text-md-end">Descricao:</label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="description" id="description" cols="10" rows="5">{{$product->description ?? old('description')}}</textarea>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{$product->id}}">
                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-end">Preço:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="price" id="price" value="{{$product->price ?? old('price')}}" />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="stock" class="col-md-4 col-form-label text-md-end">Estoque:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="stock" id="stock" value="{{$product->stock ?? old('stock')}}" />
                            </div>
                        </div>

                        <div class="row mb-3 col-8 text-center">
                        	<div class="col-mb-8 text-center align-center">
                        		<input type="submit" value="Atualizar" class="btn align-center btn-primary btn-lg btn-block">
                        	</div>
                    	</div>

					</form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
   