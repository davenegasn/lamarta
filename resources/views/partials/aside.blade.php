<aside class="col-md-3 col-sm-12">
	<h2 class="my-2 py-2 half-border left brand border-tiny mb-4">Categorías</h2>
	<ul class="list-unstyled px-0">
		@foreach( $categories as $category )
		<li>
			<a 
				class="text-dark" 

				href="{{ route( 'category-catalog', $category->slug ) }}"> 
					{{ $category->name }}
			</a>
		</li>
		@endforeach
	</ul>
</aside>