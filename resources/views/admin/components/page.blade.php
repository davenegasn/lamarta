{{-- Componente para create methods --}}

@component('components.master')

@section('title', 'Administrar Categorías')

<div id="wrapper">

	@include('admin.layouts.aside')

	<div id="content-wrapper" class="d-flex flex-column">
	
		<div id="content">

			@include('admin.layouts.topnav')
			
			<div class="container-fluid">

				{{ $slot }}

			</div><!-- /container -->

		</div><!-- /content -->

	</div><!-- /content-wrapper -->

</div><!-- /wrapper -->

@endcomponent