@component('components.master')

	<header>

	@include('layouts.nav')

	</header>
  
    {{ $slot }}

    @include('layouts.footer')
  

@endcomponent