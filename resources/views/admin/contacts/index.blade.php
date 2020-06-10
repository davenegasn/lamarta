@component('admin.components.page')

	@include('admin.layouts.page-header', [
					'title' => 'Solicitudes de contacto',
					'route' => 'create-category',
					'label' => 'Añadir Categoría'
					])

	<!-- Content Row -->
	<div class="row">

		<div class="col-xl-12 col-md-12 mb-12">
			
			@component('admin.components.table-loop', 
				[
					'headings' 		=> $headings,
					'items'			=> $items,
					'route_edit'	=> 'edit-category',
					'route_delete'	=> 'delete-category',
				])
			@endcomponent

		</div><!-- /col-12 -->

	</div>
	
@endcomponent

