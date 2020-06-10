@component('components.app', ['categories' => $categories])


<div class="slider-container">
	<slider :slides="{{$slides}}" ></slider>
</div>

<div class="home">

	<section class="featured-cats">

		<div class="container">
		
			<div class="row">
			
				<div class="col-md-12">
					<h2 class="text-center mt-4 mb-3 py-2 half-border brand center border-full">
						Nuestros productos destacados
					</h2>
					<p class="products-description mb-5">
						Conoce nuestra gran variedad de productos, listos para freir y para hornear.
					</p>
				</div><!-- /col-12 -->
			</div><!-- /row -->

			<div class="row">

			@foreach($homeCats as $category)

				<div class="col-md-3">
					
					
					@isset( $category->image )
					<div class="thumb-container">
						<a 	href="{{ route('category-catalog', $category->slug) }}"
							class="cat-thumb mb-2" 
							style="background-image:url({{ $category->image }})" >
						</a>
					</div>
					@endisset
					<h3 class="text-center mt-2">
						<a 	href="{{ route('category-catalog', $category) }}"
							class="text-dark">
							{{ $category->name }}
						</a>
					</h3>

				</div><!-- /col-md-3 -->
				
			@endforeach

			</div><!-- /row -->

			<a href="{{route('catalog')}}" class="custom-button section-end dark">
				Ver catálogo completo
			</a>

		</div><!-- /container -->

	</section><!-- /featured-cats -->

	<section class="home-info my-5 py-5">

		<div class="container">

			<div class="d-flex row">

				<div class="align-self-center col-md-6">

					<h2 class="text-white mb-4 py-2 half-border left light border-small">
						Dónde encontrarnos
					</h2>

					<p class="text-white">Nuestro equipo está para ayudarte, visita nuestra fábrica y punto de venta ubicado en Av. Grecia 5616, Penalolen, Metro Grecia.</p>
					
					<div class="d-flex justify-content-between text-white" >
						<span>Teléfono</span>
						<span>23 269 9052</span>
					</div><!-- /flex -->
					

					<h2 class="text-white mb-4 py-2 half-border left light border-small">
						Horarios de atención
					</h2>

					<div class="d-flex justify-content-between text-white" >
						<span>Lunes a Viernes</span>
						<span>09:00 a 19:00</span>
					</div><!-- /flex -->

					<div class="d-flex justify-content-between text-white" >
						<span>Sábado</span>
						<span>09:00 a 14:00</span>
					</div><!-- /flex -->

					<div class="d-flex justify-content-between text-white" >
						<span>Festivos</span>
						<span>Consultar</span>
					</div><!-- /flex -->

				</div><!-- /col-6 -->

				
				<div class="map-overlay align-self-center col-md-6" style="height: 450px;">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13312.8691051663!2d-70.5724386!3d-33.4696935!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x14b434f4e5466eb9!2sMasas%20La%20Marta!5e0!3m2!1ses!2scl!4v1587533547964!5m2!1ses!2scl" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div><!-- /col-6 -->
				
			</div><!-- /flex -->

		</div><!-- /container -->

	</section>

	@include('partials.newsletter')

</div>

@endcomponent
