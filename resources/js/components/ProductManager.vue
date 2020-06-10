<template>
	<form @submit.prevent="saveProduct" >
		<a @click="addProduct" class="button is-info">Añadir producto</a>
		<hr>
		<div v-for="(product, index) in products" :key="product.id" class="box">
			<div class="field">
				<label for="cat-name">Nombre</label>
				<div class="control">
					<input class="input" type="text" v-model="product.title " />
				</div>
			</div>
			<div class="field">
				<label for="cat-desc">Description</label>
				<div class="control">
					<textarea class="textarea" v-model="product.description"></textarea>
				</div>
			</div>
			<div class="field">
				<label for="cat-desc">Precio unitario</label>
				<div class="control">
					<input class="input" type="text" v-model="product.unit_price " />
				</div>
			</div>
			<div class="field">
				<label for="cat-name">Imagen</label>
				<div class="control">
					<input class="input" type="text" v-model="product.image " />
				</div>
			</div>
			<div class="field">
				<label for="cat-position">Posición</label>
				<div class="control">
					<input class="input" type="text" v-model="product.display_order " />
				</div>
			</div>
			<a @click="removeProduct(index)" class="button is-danger">Eliminar</a>
			<hr>
		</div>

		<button type="submit" class="button is-success">Guardar</button>

		<div class="notification is-success" v-if="actionSuccess">
			<button class="delete"></button>
			{{ feedback }}
		</div>
		

	</form>

</template>

<script>
	export default {
		props: ['initialProducts'],
		data() {
			return{
				products: _.cloneDeep(this.initialProducts),
				feedback: '',
				actionSuccess: false,
			}
		},
		methods: {
			removeProduct(index){
				if(confirm('Atención: Esto eliminará el producto de forma permante')){
					let id = this.products[index].id;
					if(id > 0){ 
						axios.delete('/api/products/' + id);
						this.feedback = 'El producto ha sido elimiando correctamente.';
						this.actionSuccess = true;
					}
					this.products.splice(index,1);
				}
			},
			addProduct(){
				this.products.push({
					id: 0,
					name: '',
					image: '',
					description: '',
					unit_price: '',
					display_order: this.products.length + 1,
				});
				
				this.$nextTick(()=>{
					window.scrollTo(0,document.body.scrollHeight);
				});

			},
			saveProduct(){
				axios.post('/api/products/upsert', {
					products: this.products
				})
				.then((res) => {
					if( res.data.success ){
						this.feedback = 'El producto ha sido añadido correctamente.';
						this.actionSuccess = true;
						this.products = res.data.products;
					} 
				});
			}
		}
	}
</script>