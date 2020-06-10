@component('admin.components.page')

	@include('admin.layouts.page-header', [
		'title' => 'Editar Slider',
		'route' => 'sliders',
		'label' => 'Volver'
	])

	<!-- Content Row -->
	<div class="row">

		<div class="col-xl-8 col-md-8 mb-8">
			
			<form method="POST" action="{{route('update-slider', $slider)}}" enctype="multipart/form-data">
			    @csrf
				@method('PATCH')
				@include('admin.sliders._form', ['formMode' => 'edit'])
			</form>
		
		</div><!-- /col-12 -->

	</div><!-- /row -->

@endcomponent
