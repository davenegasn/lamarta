@component('admin.components.page')

	@include('admin.layouts.page-header', [
		'title' => 'Editar Categoría',
		'route' => 'categories',
		'label' => 'Volver'
		])

	<!-- Content Row -->
	<div class="row">

		<div class="col-xl-8 col-md-8 mb-8">
			
			<form method="POST" action="{{route('update-category', $category->id)}}" enctype="multipart/form-data">
			    @csrf
			    @method('PATCH')

				@include('admin.categories._form', ['formMode' => 'edit'])
			    
			</form>
		
		</div><!-- /col-12 -->

	</div>

@endcomponent