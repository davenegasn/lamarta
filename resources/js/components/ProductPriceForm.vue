<template>

	<div>

		<a @click="showPrices">Añadir precios</a>

			<div v-if="show" v-for="(item, index) in prices" :key="item.id">

				<div class="form-group row">

					<div class="col-md-3 col-sm-12">

						<label for="description" >Desde</label>

						<input 
							type="number" 
							name="quantity_from[]"
							class="form-control" 
							v-model="item.quantity_from">

					</div>

					<div class="col-md-3 col-sm-12">

						<label for="description" >Hasta</label>

						<input 
							type="number" 
							name="quantity_to[]"
							class="form-control"
							v-model="item.quantity_to">

					</div>

					<div class="col-md-3 col-sm-12">

						<label for="description" >Precio</label>

						<input 
							type="text" 
							name="prices[]" 
							class="form-control"
							v-model="item.price">

						

					</div>

					<div class="col-md-3 col-sm-12">

						<label for="description" >Medida</label>

						<select name="unit[]" class="form-control">
							<option value="1">Unidad</option>
							<option value="2">Bandejas</option>
						</select>

						<a @click="removeInput(index)" class="button is-info">Eliminar</a>

					</div>

				</div>

			<a @click="addInput" class="button is-info">Añadir precios</a>

		</div>

	</div>

</template>

<script>
	export default{
		
		data() {
			
			return{
				show: false,
				prices: [{
			      quantity_from: 1,
			      quantity_to: 5,
			      price: 1000,
			    }]
			}
		},
		methods: {
			showPrices(){
				this.show = true;
			},
			addInput(){
				this.show = true;
				this.prices.push({
					quantity_from: 0,
					quantity_to: 0,
					price: 0,
				});
			},
			removeInput(index){
				this.prices.splice(index,1);
				this.show = false;
			}
		}
		
	}
</script>

