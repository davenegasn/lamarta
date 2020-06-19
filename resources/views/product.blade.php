@component('components.app')

@section('title', 'Catálogo')

<div class="container catalog single-product">

	<div class="row">

		<div class="col-md-9 col-sm-12">

			<h1 class="my-2 py-2 half-border left dark border-small mb-4">
				{{ $pageTitle }}
			</h1>
			
			<div class="row equal">
				<div class="col-md-5 col-sm-12">
					<img src="{{ $product->image }}" class="img-fluid" style="box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.11);">
				</div>

				<div class="col-md-7 col-sm-12">

					<div class="product-info" style="background-color: #fff;box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.11); padding:10px;">

						<h2 class="h4">{{ $product->getFirstProductCatName() }}</h2>

						<span style="color:#F3AB23;text-decoration: underline;">
							{{ $product->short_description }}
						</span>

						<hr>

						{{$product->description}}

					</div>

				</div>

			</div>

			<div class="row">

				<div class="col-md-12">

					<h4 class="my-3">Tabla de valores</h4>

					<table 
						class="table table-striped table-bordered table-hover">

						<thead>
						    <tr>
						      <th 
						      	scope="col" 
						      	class="text-center">Desde</th>
						      <th 
						      	scope="col"  
						      	class="text-center">Hasta</th>
						      <th 
						      	scope="col"  
						      	class="text-center">Valor</th>
						    </tr>
						</thead>

						<tbody>

							@if(count($product->prices))

								@foreach($product->prices as $price)

							    <tr>
							      <td class="text-center">
							      	{{ $price->quantity_from }}
							      	{{ $price->unit->unit }}(s)
							      </td>

							      <td class="text-center">
							      	@if($price->quantity_to > 999)
							      		O más
							      	@else
							      		{{ $price->quantity_to }}
							      		{{ $price->unit->unit }}(s)
							      	@endif
							      </td>

							      <td class="text-center"> 
							      	$ {{ $price->price }} pesos c/u
							      </td>
							    </tr>

								@endforeach

						   	@else

						   		<tr>
						   			<td class="text-center">
						   				1
						   			</td>
						   			<td class="text-center">
						   				O más
						   			</td>
						   			<td class="text-center">
						   				{{$product->unit_price}} 
						   				pesos c/u
						   			</td>
						   		</tr>
								
						   	@endif

						</tbody>

					</table>
				</div>
			</div>
			
		</div>

		@include('partials.aside')

	</div>

</div>

@endcomponent