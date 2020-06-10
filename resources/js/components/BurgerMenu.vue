<template>

	<div>

		<a class="responsive-nav-btn" @click="showMenu">Menu</a>

		<div class="responsive-nav" :class="{'show': show}">
			<div class="logo-nav">
				<img :src="'/images/logo_white_simple.png'" class="img-fluid">
			</div>
			<ul class="responsive-nav-items">
				<li v-for="category in categories">
					<a :href="getCatLink(category.slug)">{{category.name}}</a>
				</li> 
			</ul>

			<a class="custom-button centered brand" :href="getContactLink()">Contacto</a>
		</div>

	</div>
   
</template>

<script>

export default {
	props: ['categories'],
    data(){
    	return{
    		show: false,
    		base_url: window.location.origin,
    	}
    },
    methods: {
    	showMenu(){
    		this.show = !this.show;
    		document.body.classList.toggle('pushCanvas');
    	},
    	getCatLink(slug){
    		return this.base_url + '/productos/' + slug;
    	},
    	getContactLink(){
    		return this.base_url + '/contacto';
    	}
    }
}
</script>

<style lang="scss" scoped>

	.responsive-nav-btn{
		position: fixed;
		right: 10px;
		top:5px;
		z-index:5;
		background-color:#121315;
		color:#fff !important;
		padding:10px;
		border-radius:3px;
		cursor:pointer;
		box-shadow: 0 2px 4px rgba(50, 50, 93, 0.1);
	}
	.responsive-nav-btn:hover{
		color:#fff;
	}
	.responsive-nav{

		.custom-button{
			padding:15px 40px;
		}

		position: fixed;
		top: 0;
		left: 0;
		width: 0;
		min-height: 100vh;
		background-color:#0f0f0f;
		z-index: 4;
		transition: all .5s ease-in-out;
		overflow: hidden;
		box-shadow: 0 2px 4px rgba(50, 50, 93, 0.1);
	
		.logo-nav{
			padding:30px;
			background-color:#000;

			img{
				display:block;
				margin: 0 auto;
				max-height:100px;
			}
		}

		ul{
			list-style:none;
			padding:0;

			li a{
				display:block;
				padding:10px;
				border-bottom: 1px solid #000;
				color: #fff;
				font-size:1.1em;
				text-align:center;
			}
		}
	}
	
	.show{
		width: 75%;
	}
	

</style>