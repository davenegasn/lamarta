<template>
  <carousel @changed="changed" :autoplay="true" :autoplaySpeed="150" :nav="false" :items="1">
	
     <div 
     	v-for="image in slides" 
     	class="slide"
     	:style="{ backgroundImage: 'url(' + image.image + ')' }" 
     	:key="image.id">
     	<div class="caption">
     		<span class="h5">{{ image.short_text }}</span>
     		<h3 class="text-white">{{image.title}}</h3>
     		<p>{{image.description}}</p>
     		<a class="custom-button centered brand" :href="image.button_route" v-if="image.button">{{image.button_text}}</a>
     	</div>
     </div>
	
  </carousel>
</template>

<script>

import carousel from 'vue-owl-carousel'

export default {
	props: ['slides'],
  components: { carousel },
  
  methods: {
    changed(){
     
    }
  }
}

</script>
