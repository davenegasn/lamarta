@if($errors->any())
	<ul class="mb-3 alert alert-danger">
	@foreach($errors->all() as $error)
		<li>{{ $error }}</li>
	@endforeach
	</ul>
@endif

<div class="form-group">

	<label for="title">Nombre</label>
	
	<input 	type="text" 
			class="form-control" 
			name="title" 
			id="title" 
			placeholder="Título" 
			value="{{ isset($product) ? $product->title : '' }}">
	
</div>

<div class="form-group">

	<div class="row">

    	<div class="col">

			<label for="slug">Slug</label>

			<div class="input-group">

				<div class="input-group-prepend">

		          <div class="input-group-text">/</div>

		        </div>

				<input 	type="text" 
						class="form-control" 
						name="slug" 
						id="title" 
						placeholder="url-amigable" 
						value="{{ isset($product) ? $product->slug : '' }}">
			</div>

		</div>

		<div class="col">

			<label for="unit_price">Valor unitario (de referencia)</label>


			<div class="input-group">

				<div class="input-group-prepend">

		          <div class="input-group-text">$</div>

		        </div>

				<input 	type="text" 
					class="form-control" 
					name="unit_price" 
					id="unit_price" 
					placeholder="Valor unitario" 
					value="{{ isset($product) ? $product->unit_price : '' }}">
			</div>

		</div>

	</div>
	
</div>

<div class="form-group">

	<label for="description">Descripción</label>
	
	<textarea 
		name="description" 
		class="form-control" 
		cols="40" 
		rows="10"
		placeholder="La descripción del producto">
		{{ isset($product) ? $product->description : ''}}
	</textarea>
	
</div>

<div class="form-group">

	<label for="short_description">Descripción corta</label>
	
	<textarea 
		name="short_description" 
		class="form-control" 
		cols="20" 
		rows="10"
		placeholder="La descripción corta del producto">
		{{ isset($product) ? $product->short_description : ''}}
	</textarea>
	
</div>

<div class="form-group d-flex">
	
	@if(isset($product))

		<img 
			src="{{ $product->image }}" 
			alt="{{ $product->title }}" 
			class="img-responsive mr-2"
			style="max-height: 300px;display: block;border:1px solid #ccc;">

	@endif

	<div class="align-self-center">
		<label for="file" >Imagen del producto (catálogo)</label>
		<input type="file" name="image" class="form-control">
	</div>
	
</div>

<div class="form-group d-flex">
	
	@if(isset($product))

		<img 
			src="{{ $product->image_big }}" 
			alt="{{ $product->title }}" 
			class="img-responsive mr-2"
			style="max-height: 300px;display: block;border:1px solid #ccc;">

	@endif

	<div class="align-self-center">
		<label for="file" >Imagen del producto (grande)</label>
		<input type="file" name="image_big" class="form-control">
	</div>
	
</div>
<div class="form-group">

	<label for="display_order" >Orden</label>
	
	<input 
		type="text" 
		class="form-control" 
		id="display_order" 
		placeholder="Orden"
		name="display_order" 
		value="{{ isset($product) ? $product->display_order : $display_order }}">

	<small class="form-text text-muted">
		El orden en el que se va a desplegar
	</small>
	
</div>

<div class="form-group">
	<label for="categories">Categorías del producto</label>

	<select 
		name="categories[]" 
		id="categories" 
		class="form-control"
		multiple>
		@foreach($categories as $category)
			<option 
				value="{{ $category->id }}" 
				{{ isset($product) && in_array($category->id, $product->categories()->pluck('id')->toArray()) ? 'selected' : '' }}>
					{{ $category->name }}
			</option>
		@endforeach
	</select>
</div>

<hr>

Precios

<hr>

<div class="product-prices">

	@isset($product->prices)

		@foreach($product->prices as $price)

			<div class="form-group row">

				<div class="col-md-3 col-sm-12">

					<label for="description" >Desde</label>

					<input 
						type="number" 
						name="quantity_from[]"
						value="{{$price->quantity_from}}" 
						class="form-control" 
						>

				</div><!-- /col-4 -->

				<div class="col-md-3 col-sm-12">

					<label for="description" >Hasta</label>

					<input 
						type="number" 
						name="quantity_to[]"
						value="{{$price->quantity_to}}" 
						class="form-control"
						>

				</div><!-- /col-4 -->

				<div class="col-md-3 col-sm-12">

					<label for="description" >Precio</label>

					<input 
						type="text" 
						name="prices[]" 
						value="{{$price->price}}" 
						class="form-control"
						>

				</div><!-- /col-4 -->

				<div class="col-md-3 col-sm-12">

						<label for="description" >Medida</label>

						<select name="unit[]" class="form-control">
							<option 
								value="1" 
								{{ $price->unit->id == 1 ? 'selected' : '' }}
								>Unidad
							</option>
							<option 
								value="2"
								{{ $price->unit->id == 2 ? 'selected' : '' }}
								>Bandejas
							</option>
						</select>

					</div>

			</div><!-- /form-group -->

		@endforeach

	@endisset

	<product-price></product-price>

</div><!-- /product-prices -->

<hr>

  <button type="submit" class="btn btn-primary">
    {{ $formMode === 'edit' ? 'Editar' : 'Crear' }}
</button>