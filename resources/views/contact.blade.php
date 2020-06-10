@component('components.app')

@section('title', 'Quiénes Somos')

<div class="about">
	@if(!request()->query('sent'))
	<section class="bg-title">
		<div class="cover">
			<h1 class="half-border center text-white light border-full text-align-center">
				{{ $pageTitle }}
			</h1>
		</div>
	</section>
	@endif

	<div class="container">

		<div class="row justify-content-md-center">

			<div class="col-md-8">

				<div id="contact-form">

					@if(request()->query('sent'))
	
						<h2 class="text-center mt-5">¡Gracias por tu interés en contactarnos!</h2>
						<hr>
						<h4 class="text-center">Estamos amasando una respuesta deliciosa para ti. Te contactaremos en menos de lo que horneamos una empanada.<h4>
						<img 
							src="http://lamarta.cl/lamarta.gif" 
							class="img-fluid"
							style="display:block;margin:0 auto 50px auto;max-height: 500px;">

					@else
				
					<p>Para ventas al por mayor, pedidos especiales, eventos, reclamos, sugerencias o felicitaciones escríbenos completando este formulario y nos contactaremos a la brevedad contigo. ¡Gracias por preferirnos!</p>

					<form action="/contacto" method="POST">
						@csrf
						
						<div class="form-group row">

							<div class="col-md-6 col-sm-12">
								<label for="name">Nombre</label>
								<input 
									type="text" 
									name="name" 
									class="form-control"
									placeholder="Nombre y apellido" 
								>
							</div>
							
							<div class="col-md-6 col-sm-12">
								<label for="phone">Teléfono</label>
								<input 
									type="text" 
									name="phone" 
									class="form-control"
									placeholder="(+56)">
							</div>

						</div>

						<div class="form-group row">

							<div class="col-md-6 col-sm-12">
						
								<label for="email">Correo electrónico</label>
								<input 
									type="email" 
									name="email" 
									class="form-control"
									placeholder="Email">
							</div>

							<div class="col-md-6 col-sm-12">
								
								<label for="subject">Asunto</label>
								<select name="subject" class="form-control">
									<option value="0">Cotización</option>
									<option value="1">Pedido especial</option>
									<option value="2">Sugerencia</option>
									<option value="2">Reclamo</option>
									<option value="2">Consulta</option>
									<option value="2">Felicitación</option>
									<option value="2">Otros</option>
								</select>
								
							</div>

						</div>
					
						<div class="form-group">
							<label for="description">Comentario</label> 
							<textarea 
								name="description"
								cols="30" 
								rows="10"
								class="form-control"
								placeholder="Escribir comentario">
							</textarea>
						</div>

						<input 
							type="submit" 
							value="Enviar" 
							class="custom-button section-end dark">
					</form>

					@endif

				</div>
			
			</div>

		</div>

	</div>
</div>
@endcomponent