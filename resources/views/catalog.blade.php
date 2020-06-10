@component('components.app')

@section('title', 'Catálogo')

<div class="container catalog">

	<div class="row">

		<div class="col-md-9 col-sm-12">

			<h1 class="my-2 py-2 half-border left dark border-small mb-4">
				{{ $pageTitle }}
			</h1>
			
			<ul class="row list-unstyled p-0">

			@foreach($products as $product)

				<li class="col-md-4 col-sm-12 mb-2">

					<div class="product pb-3">
						
						<a href="{{ route('single-product', ['category' => $product->getFirstProductCatSlug(), 'product' => $product->slug ]) }}" class="product-thumb">
						
							<img src="{{ $product->image }}" class="img-fluid">

							<button class="contact" onclick="location.href='{{$product->slug}}';">Ver producto</button>

						</a>

						<h4 class="mt-2 mb-0 text-center">
							{{ $product->short_description }}
						</h4>
						
						<h3 class="text-center mt-1 mb-1">
							<a href="{{ route('single-product', ['category' => $product->getFirstProductCatSlug(), 'product' => $product->slug ]) }}" class="text-dark"> {{ $product->title }} </a>
						</h3>
						
					</div>

				</li>
				
			@endforeach
			
			</ul>
			
		</div>

		@include('partials.aside')

	</div>

</div>

@endcomponent