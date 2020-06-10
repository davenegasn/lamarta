@component('components.app')

@section('title', 'Catálogo')

<div class="prices">

	<section class="bg-title">

		<div class="cover">

			<h1 class="half-border center text-white light border-full text-align-center">

				{{ $pageTitle }}
			</h1>

		</div>

	</section>

	<div class="container">

		<div class="row">

			<div class="col-md-9 col-sm-12">

				@foreach($categories as $category)

				<h2 
					class="my-2 py-2 half-border left brand border-tiny mb-4">
					{{ $category->name }}
				</h2>

					<div id="accordion-{{ $category->id }}">

					@foreach($category->products as $product)

						<div class="card">

							<div 
								class="card-header" 
								id="headingOne">

								<h5 class="mb-0">

									<button 
										class="btn btn-link text-dark" 
										data-toggle="collapse" 
										data-target="#product-{{$product->id}}" aria-expanded="true" 
										aria-controls="collapseOne">
									  {{$product->title}} 
									  <span class="text-muted">
									  	| {{ $product->short_description }}
									  </span>
									</button>

								</h5>

							</div><!-- /card-header -->

							<div 
								id="product-{{$product->id}}" 
								class="collapse" 
								aria-labelledby="headingOne" 
								data-parent="#accordion-{{ $category->id }}">

								<div class="card-body p-0">

									<table 
										class="table table-striped table-bordered table-hover m-0">

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
										   				$ {{$product->unit_price}} 
										   				pesos c/u
										   			</td>
										   		</tr>
												
										   	@endif

										</tbody>

									</table>

								</div><!-- /card-body -->

							</div><!-- /collapse -->

						</div><!-- /card -->

					@endforeach

					</div><!-- /accordion -->

			  	@endforeach
				
			</div><!-- /col-md-9  -->

			@include('partials.aside')

		</div><!-- /row -->

	</div><!-- /container -->

</div><!-- /prices -->

@endcomponent