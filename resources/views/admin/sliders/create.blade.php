@component('admin.components.page')

	@include('admin.layouts.page-header', [
		'title' => 'Crear Slider',
		'route' => 'categories',
		'label' => 'Volver'
	])

	<!-- Content Row -->
	<div class="row">

		<div class="col-xl-8 col-md-8 mb-8">
			
			<form method="POST" action="{{route('store-slider')}}" enctype="multipart/form-data">
			    @csrf

				@include('admin.sliders._form', ['formMode' => 'create'])
			    
			</form>
		
		</div><!-- /col-12 -->

	</div><!-- /row -->

@endcomponent
