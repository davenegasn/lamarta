<div class="form-group">

	<label for="name">Nombre</label>
	
	<input 	type="text" 
			class="form-control" 
			name="name" 
			id="name" 
			placeholder="Nombre" 
			value="{{ isset($category) ? $category->name : '' }}">
	
</div>

<div class="form-group">

	<label for="slug">Slug</label>
	
	<input 	type="text" 
			class="form-control" 
			name="slug" 
			id="slug" 
			placeholder="url amigable" 
			value="{{ isset($category) ? $category->slug : '' }}">
	
</div>

<div class="form-group">

	<label for="description" >Descripción</label>
	
	<textarea 
		name="description" 
		class="form-control" 
		cols="40" 
		rows="10"
		placeholder="La descripción de la categoría">
		{{ isset($category) ? $category->description : ''}}
	</textarea>
	
	
</div>

<div class="form-group d-flex">
	
	@if(isset($category))

	<img 
		src="{{ $category->image }}" 
		alt="{{ $category->name }}" 
		class="img-responsive mr-2"
		style="max-height: 300px;display: block;border:1px solid #ccc;">

	@endif

	<div class="align-self-center">
		<label for="file" >Imagen para la categoría</label>
		
		<input type="file" name="image" class="form-control">
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
		value="{{ isset($category) ? $category->display_order : '' }}">

	<small class="form-text text-muted">El orden en el que se va a desplegar en el menú</small>
	
</div>

  <button type="submit" class="btn btn-primary">
    {{ $formMode === 'edit' ? 'Editar' : 'Crear' }}
</button>