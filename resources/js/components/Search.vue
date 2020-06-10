<template>
    <div> 
        <div class="input-group">
        
            <input 
                type="text" 
                class="form-control" 
                placeholder="Buscar productos" 
                v-model="search"
                @input="onChange"
                v-on:keyup.delete="down"
                >

            <div v-if="spinner"  class="input-group-prepend">
                <div class="input-group-text bg-white">
                  <div class="spinner-border spinner-border-sm" role="status"></div>
                </div>
            </div>

        </div>

        <ul v-show="isOpen">
            <li v-for="result in results" :key="result.id">
                <a :href="result.slug">{{result.title}} | {{ result.short_description }}</a>
            </li>
        </ul>
    </div>
</template>

<script>

export default {
    data() {
        return {
            search: '',
            results: [],
            spinner: false,
            isOpen: false,
        };
    },
    methods: {
        onChange(){
            this.isOpen = true;
            this.fetch(); 
        },
        down(){
            this.isOpen = false;
        },
        fetch() {
            axios.post('/api/search', {
                keywords: this.search
            })
            .then(response => this.results = response.data)
            .then(this.spinner = false);
        }
    }
}
</script>