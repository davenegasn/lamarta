<div class="form-group">

	<label for="title">Título</label>
	
	<input 	type="text" 
			class="form-control" 
			name="title" 
			id="title" 
			placeholder="Título" 
			value="{{ isset($slider) ? $slider->title : '' }}">
	
</div>

<div class="form-group">

	<label for="short_text">Título corto</label>
	
	<input 	type="text" 
			class="form-control" 
			name="short_text" 
			id="short_text" 
			placeholder="Texto corto" 
			value="{{ isset($slider) ? $slider->short_text : '' }}">
	
</div>


<div class="form-group">

	<label for="description" >Descripción</label>
	
	<textarea 
		name="description" 
		class="form-control" 
		cols="40" 
		rows="10"
		placeholder="La descripción del slider">
		{{ isset($slider) ? $slider->description : ''}}
	</textarea>
	
	
</div>

<div class="form-group d-flex">
	
	@if(isset($slider))

	<img 
		src="{{ $slider->image }}" 
		alt="{{ $slider->name }}" 
		class="img-responsive mr-2"
		style="max-height: 300px;display: block;border:1px solid #ccc;">

	@endif

	<div class="align-self-center">
		<label for="file" >Imagen para el slider</label>
		
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
		value="{{ isset($slider) ? $slider->display_order : '' }}">

	<small class="form-text text-muted">El orden en el que se va a desplegar en el home</small>
	
</div>

<div class="form-group">

	<label for="display_order" >Incluir botón</label>
	
	<select name="button">
		<option value="0" selected="selected">No</option>
		<option value="1">Si</option>
	</select>

	<small class="form-text text-muted">Botón para mostrar en el slider</small>
	
</div>

<div class="form-group">

	<label for="button_text" >Texto del botón</label>
	
	<input 
		type="text" 
		class="form-control" 
		id="button_text" 
		placeholder="Texto del botón"
		name="button_text" 
		value="{{ isset($slider) ? $slider->button_text : '' }}">
	
</div>

<div class="form-group">

	<label for="button_route" >URL del botón</label>
	
	<input 
		type="text" 
		class="form-control" 
		id="button_route" 
		placeholder="URL del botón"
		name="button_route" 
		value="{{ isset($slider) ? $slider->button_route : '' }}">
	
</div>


  <button type="submit" class="btn btn-primary">
    {{ $formMode === 'edit' ? 'Editar' : 'Crear' }}
</button>