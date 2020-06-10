<template>
	<form @submit.prevent="saveCategories" >
		<a @click="addCategory" class="button is-info">Añadir categoría</a>
		<hr>
		<div v-for="(category, index) in categories" :key="category.id" class="box">
			<div class="field">
				<label for="cat-name">Nombre</label>
				<div class="control">
					<input class="inptu" type="text" v-model="category.name " />
				</div>
			</div>
			<div class="field">
				<label for="cat-desc">Descripción</label>
				<div class="control">
					<textarea class="textarea" v-model="category.description"></textarea>
				</div>
			</div>
			
			<div class="field">
				<label for="cat-position">Posición</label>
				<div class="control">
					<input class="inptu" type="text" v-model="category.display_order " />
				</div>
			</div>
			<img :src="`/images/${category.image}`" >
			<input type="text" v-model="category.image">
			<a @click="removeCategory(index)" class="button is-danger">Eliminar</a>
			<hr>
		</div>
		<drop-zone :options="dropzoneOptions" id="dz" ref="dropzone"></drop-zone>
		<button type="submit" class="button is-success">Guardar</button>
		<div class="notification is-success" v-if="actionSuccess">
			<button class="delete"></button>
			{{ feedback }}
		</div>
		

	</form>

</template>

<script>
	import vue2Dropzone from 'vue2-dropzone';
	import 'vue2-dropzone/dist/vue2Dropzone.min.css';

	export default {
		components:{
			dropZone: vue2Dropzone
		},
		props: ['initialCategories'],
		data() {
			return{
				dropzoneOptions: {
					url: '/api/add-image',
					thumbnailWith: 200,
					headers:{
						'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
					},
					success(file, res){
						file.filename = res;
					}
				},
				categories: _.cloneDeep(this.initialCategories),
				feedback: '',
				actionSuccess: false,
			}
		},
		methods: {
			removeCategory(index){
				if(confirm('Atención: Esto eliminará la categoría de forma permante')){
					let id = this.categories[index].id;
					if(id > 0){ 
						axios.delete('/api/categories/' + id);
						this.feedback = 'La categoría ha sido eliminada correctamente.';
						this.actionSuccess = true;
					}
					this.categories.splice(index,1);
				}
			},
			addCategory(){
				this.categories.push({
					id: 0,
					name: '',
					image: '',
					description: '',
					display_order: this.categories.length + 1,
				});
				this.$nextTick(()=>{
					window.scrollTo(0,document.body.scrollHeight);
				});
			},
			saveCategories(){
				let files = this.$refs.dropzone.getAcceptedFiles();
				if(files.length > 0 && files[0].filename){
					this.categories.image = files[0].filename;
				}
				axios.post('/api/categories/upsert', {
					categories: this.categories
				})
				.then((res) => {
					if( res.data.success ){
						this.feedback = 'La categoría ha sido añadida correctamente.';
						this.actionSuccess = true;
						this.categories = res.data.categories;
					} 
				});
			}
		}
	}
</script>