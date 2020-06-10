@component('admin.components.page')

	@include('admin.layouts.page-header', [
		'title' => 'Sliders',
		'route' => 'create-slider',
		'label' => 'Añadir Slider'
		])

	<!-- Content Row -->
	<div class="row">

		<div class="col-xl-12 col-md-12 mb-12">
			
			@component('admin.components.table-loop', 
				[
					'headings' 		=> $headings,
					'items'			=> $items,
					'route_edit'	=> 'edit-slider',
					'route_delete'	=> 'delete-product',
					
				])
			@endcomponent

		</div><!-- /col-12 -->

	</div>

@endcomponent