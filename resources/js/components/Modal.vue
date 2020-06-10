<template>
	
	<div class="modal is-active">
	<div class="modal-background"></div>
	<div class="modal-content">
		<div class="box">
			<h5>{{title}}</h5>
			<p>{{body}} </p>
		</div>
	</div>
	<button class="modal-close is-large" aria-label="close" @click="closeModal"></button>
</div>


</template>

<script>
    export default {
        props: ['title','body'],
        data(){
            return {
                isVisible: true,
            }
        },
        methods: {
            closeModal(){
                this.isVisible = false;
            }
        }
    }
</script>