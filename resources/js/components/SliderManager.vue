<template>
	<form @submit.prevent="saveSliders" >
		<a @click="addSlider" class="button is-info">Añadir slider</a>
		<hr>
		<div v-for="(slider, index) in sliders" :key="slider.id" class="box">
			<div class="field">
				<label for="cat-name">Título</label>
				<div class="control">
					<input class="input" type="text" v-model="slider.title " />
				</div>
			</div>
			<div class="field"> 
				<label for="cat-desc">Descripción</label>
				<div class="control">
					<textarea class="textarea" v-model="slider.description"></textarea>
				</div>
			</div>
			<div class="field">
				<label for="cat-name">Imagen</label>
				<div class="control">
					<input class="input" type="text" v-model="slider.image " />
				</div>
			</div>
			<div class="field">
				<label for="cat-position">Posición</label>
				<div class="control">
					<input class="input" type="text" v-model="slider.display_order " />
				</div>
			</div>
			<a @click="removeSlider(index)" class="button is-danger">Eliminar</a>
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
		props: ['initialSliders'],
		data() {
			return{
				sliders: _.cloneDeep(this.initialSliders),
				feedback: '',
				actionSuccess: false,
			}
		},
		methods: {
			removeSlider(index){
				if(confirm('Atención: Esto eliminará el slider de forma permante')){
					let id = this.sliders[index].id;
					if(id > 0){ 
						axios.delete('/api/slider/' + id);
						this.feedback = 'El slider ha sido eliminado correctamente.';
						this.actionSuccess = true;
					}
					this.sliders.splice(index,1);
				}
			},
			addSlider(){
				this.sliders.push({
					id: 0,
					title: '',
					description: '',
					image: '',
					display_order: this.sliders.length + 1,
				});

				this.$nextTick( () => {
					window.scrollTo(0,document.body.scrollHeight);
				});

			},
			saveSliders(){
				axios.post('/api/slider/upsert', {
					sliders: this.sliders
				})
				.then((res) => {
					if( res.data.success ){
						this.feedback = 'El slider ha sido añadido correctamente.';
						this.actionSuccess = true;
						this.sliders = res.data.sliders;
					} 
				});
			}
		}
	}
</script>