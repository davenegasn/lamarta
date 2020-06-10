@component('admin.components.page')

	@include('admin.layouts.page-header', [
		'title' => 'Crear Categoría',
		'route' => 'categories',
		'label' => 'Volver'
		])

	<!-- Content Row -->
	<div class="row">

		<div class="col-xl-8 col-md-8 mb-8">
			
			<form method="POST" action="{{route('store-category')}}" enctype="multipart/form-data">
			    @csrf

				@include('admin.categories._form', ['formMode' => 'create'])
			    
			</form>
		
		</div><!-- /col-12 -->

	</div><!-- /row -->

@endcomponent
			