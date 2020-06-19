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
					<span>Lunes a Viernes</span> <span>09:00 a 19:00</span>
				</div>
				<div class="d-flex text-white">
					<span>Sábados</span> <span>09:00 a 14:00</span>
				</div>
				<div class="d-flex text-white">
					<span>Teléfono</span> <span>23 269 9052</span>
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

<!-- GetButton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+56 9 9664 9062", // WhatsApp number
            call_to_action: "Consultas y cotizaciones", // Call to action
            position: "right", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /GetButton.io widget -->