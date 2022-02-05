<footer class="pt-3">
	
	<div class="container">

		<div class="d-flex row">

			<div class="col-md-3 col-sm-12 align-self-center">
				 <img 
			        src="{{ asset('images/logo_white_simple.png') }}" 
			        class="logo img img-fluid" alt="Masas La Marta">
			        <p class="text-center text-white">masas@lamarta.cl</p>
			</div><!-- /col-md-3 -->

			<div class="col-md-3 col-sm-12 align-items-center">
				<h3 
					class="text-white mb-2 py-2 half-border left light border-tiny">
					Nuestros Productos
				</h3>
				<ul class="list-unstyled px-0">
					@foreach( $categories as $category )
					<li>
						<a 
							class="text-white" 
							href="{{ route( 'category-catalog', $category ) }}"> 
								{{ $category->name }}
						</a>
					</li>
					@endforeach
				</ul>
			</div><!-- /col-md-3 -->

			<div class="col-md-3 col-sm-12 align-items-center">
				
				<h3 
					class="text-white mb-2 py-2 half-border left light border-tiny">
					Horarios de Atención
				</h3>

				<div class="d-flex text-white">
					<span>Lunes a Viernes </span> <span> 09:00 a 19:00</span>
				</div>
				
				<div class="d-flex text-white">
					<span>Teléfono </span> <span> 23 269 9052</span>
				</div>

				<div class="d-flex text-white">
					<span>Febrero </span> <span> Cerrado</span>
				</div>
				
			</div><!-- /col-md-3 -->

			<div class="col-md-3 col-sm-12 align-items-center">
				<h3 
					class="text-white mb-2 py-2 half-border left light border-tiny">
					Nuestra Ubicación
				</h3>
				<p class="text-white m-0">Estamos ubicados en Av. Grecia 5616, Peñalolén</p>

			</div><!-- /col-md-3 -->

		</div><!-- /row -->

		
	</div><!-- /container -->
	
	<div class="footer-stripe p-3">
		<div class="row">
			<div class="col-md-12">
				<p class="m-0 text-center">Masas La Marta, 2020. Diseño y desarrollo Daniela Venegas Navarrete, davenegasn@gmail.com</p>
			</div>
		</div>
	</div>
	
</footer>

