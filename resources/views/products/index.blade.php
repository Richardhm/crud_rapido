@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			@if (session('status'))
				<div class="alert alert-danger">
					{{ session('status') }}
				</div>
				@endif
				@if (session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
				@endif
			<div class="card">
				
				<div class="card-header">
					@if(!$products->isEmpty())
					<div class="row">
						<div class="col-6">
							Listar Produtos		
						</div>
						<div class="col-6">
							<small class="d-flex justify-content-end">
								Quantidade de Item(s) cadastrados: {{$products->total()}}
							</small>

						</div>
					</div>
					@else
					Sem Resultados
					@endif
				</div>
				
				<div class="card-body">
					@if(!$products->isEmpty())
					<table class="table table-hover table-bordered">
						<thead class="table-dark">
							<tr>
								<th>#</th>
								<th>Nome</th>
								<th>Preço</th>
								<th>Estoque</th>
								<th></th>
								
							</tr>
						</thead>
						<tbody>
							@foreach($products as $p)
							<tr>
								<td>{{$p->id}}</td>
								<td>{{$p->name}}</td>
								<td>{{$p->price}}</td>
								<td>{{$p->stock}}</td>
								<td class="d-flex justify-content-center">
									<a class="btn btn-outline-primary btn-sm mr-5" href="{{route('products.show',$p->id)}}">Visualizar</a>
									<a class="btn btn-outline-info btn-sm" href="{{route('products.edit',['product'=>$p->id])}}">Atualizar</a>
									<form style="display: inline;" id="form_{{$p->id}}" method="POST" action="{{route('products.destroy',['product'=>$p->id])}}">
										@csrf
										@method('DELETE')
										<a href="#" class="btn btn-outline-danger btn-sm" onclick="document.getElementById('form_{{$p->id}}').submit()">Deletar</a>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					@else
					<div class="d-grid gap-2 col-6 mx-auto">
						<a href="{{route('products.create')}}" class="btn btn-outline-dark">
							Cadastrar de Produto
						</a>
					</div>    
					@endif	
				</div>
				@if($products->total() > 3)
				<nav class="d-flex justify-content-center">
					<ul class="pagination">
						<li class="page-item"><a class="page-link" href="{{$products->previousPageUrl()}}">Voltar</a></li>
						@for($i=1;$i<=$products->lastPage();$i++)
						<li class="page-item {{$products->currentPage() == $i ? 'active' : ''}}">
							<a class="page-link" href="{{$products->url($i)}}">{{$i}}</a>
						</li>
						@endfor
						<li class="page-item"><a class="page-link" href="{{$products->nextPageUrl()}}">Proximo</a></li>
					</ul>
				</nav>
				@endif


			</div>
		</div>
	</div>
</div>
@endsection
