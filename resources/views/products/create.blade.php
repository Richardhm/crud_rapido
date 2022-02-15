@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            Cadastrar Produto
                        </div>
                        <div class="col-6">

                            <a class="linkar" href="{{route('products.index')}}">Listagem de Produtos</a>    

                            
                        </div>
                    </div>
                </div>

                <div class="card-body">
                 <form method="POST" action="{{route('products.store')}}">
                  @csrf

                  <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Nome:</label>
                    <div class="col-md-8">
                        <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}">
                        @if($errors->has('name'))
                        <div class="alert alert-danger mt-3" role="alert">
                            {{ $errors->first('name') }}
                        </div>
                        @endif    
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="Description" class="col-md-4 col-form-label text-md-end">Descricao:</label>
                    <div class="col-md-8">
                        <textarea class="form-control" name="description" id="description" cols="10" rows="5">{{old('description')}}</textarea>
                        @if($errors->has('description'))
                        <div class="alert alert-danger mt-3" role="alert">
                            {{ $errors->first('description') }}
                        </div>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="price" class="col-md-4 col-form-label text-md-end">Preço:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="price" id="price" value="{{old('price')}}" />
                        @if($errors->has('price'))
                        <div class="alert alert-danger mt-3" role="alert">
                            {{ $errors->first('price') }}
                        </div>
                        @endif

                    </div>
                </div>

                <div class="row mb-3">
                    <label for="stock" class="col-md-4 col-form-label text-md-end">Estoque:</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="stock" id="stock" value="{{old('stock')}}" />
                        @if($errors->has('stock'))
                        <div class="alert alert-danger mt-3" role="alert">
                            {{ $errors->first('stock') }}
                        </div>
                        @endif
                    </div>
                </div>

                
          </div>

          <div class="d-grid mb-3 gap-2 col-6 mx-auto">
              <button class="btn btn-outline-dark" type="submit">Cadastrar</button>
          </div>

      </form>
  </div>
</div>
</div>
</div>
</div>
@endsection
