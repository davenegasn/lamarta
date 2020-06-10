@component('admin.components.page')

	@include('admin.layouts.page-header', [
		'title' => 'Productos',
		'route' => 'create-product',
		'label' => 'Añadir Producto'
		])

	<!-- Content Row -->
	<div class="row">

		<div class="col-xl-12 col-md-12 mb-12">
			
			@component('admin.components.table-loop', 
				[
					'headings' 		=> $headings,
					'items'			=> $items,
					'route_edit'	=> 'edit-product',
					'route_delete'	=> 'delete-product',
				])
			@endcomponent

		</div><!-- /col-12 -->

	</div>

@endcomponent