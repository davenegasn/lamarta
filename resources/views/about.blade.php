@component('components.app')

@section('title', 'Quiénes Somos')

<div class="about">

	<section class="bg-title">
		<div class="cover">
			<h1 class="half-border center text-white light border-full text-align-center">
				{{ $pageTitle }}
			</h1>
		</div>
	</section>

	<div class="container">

		<div class="row justify-content-md-center">

			<div class="col-md-12 col-sm-12 my-4">
				
				<img src="{{ asset('images/all_products_proportional.jpg') }}" class="rounded-circle float-right img-fluid">

					<h3 class="mb-3">Somos una empresa familiar, nacida en Peñalolén el año 2011.</h3>

					<p>La Marta (o Martita) fue la matriarca de la familia. Hemos usado su nombre como gesto de agradecimiento por habernos enseñado el gusto por la comida y la convivencia, el amor por las preparaciones y la necesidad de compartirlas con nuestros seres queridos.</p>

					<p>Es por esto que productos La Marta llevan consigo ese espíritu; esa naturaleza que nos invita a la camaradería, a los mesones largos y a ese cálido lazo que existe cuando se degusta una rica y tradicional sopaipilla o una jugosa y recién horneada empanada.</p>

					<p>Cada una de nuestras recetas se componen de amor y dedicación. Si a usted la frase le sonó cursi, créame que es la forma que escogimos para obtener los resultados que nos gustan: calidad, compromiso y eficiencia. Siempre pensando en llevar a nuestras propias mesas los alimentos que con tanta delicadeza construimos.</p>

					<p>Cómo, entonces, no hacer extensiva una invitación para todos, más aún reconociendo la riqueza de ser "atendidos por sus propios dueños". Un clásico de servicio personalizado -que asegura soluciones sabrosas hasta los paladares más exigentes de nuestros vecinas y vecinos.</p>

					<p>Hoy estamos felices de estar más cerca de ustedes, gracias a este nuevo medio de comunicación e intercambio. Porque "su opinión es realmente importante para nosotros". Y desde ya podrá hablarnos, criticarnos y sugerirnos, así como también recibir información fresca (al igual que nuestros productos)... horarios y ofertas.</p>

					<p>Reciban un gran abrazo.</p>
				
			</div>

		</div>

	</div>
</div>
@endcomponent