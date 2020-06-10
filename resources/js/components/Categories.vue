<template>
    <article class="message" v-show="isVisible">
      <div class="message-header">
        <p>{{ title }}</p>
        <button class="delete" aria-label="delete" @click="closeMessage"></button>
      </div>
      <div class="message-body">
        {{ body }}
      </div>
    </article>
</template>

<ul class="list-unstyled px-0">
       
        <li v-for="(category, index) in categories" :key="category.id" >
            <a 
                class="text-dark" 
                href="{{ route( 'category-catalog', $category ) }}"> 
                    {{ $category->name }}
            </a>
        </li>
        @endforeach
    </ul>

<script>
    export default {
        props: ['title','body'],
        data(){
            return {
                isVisible: true,
            }
        },
        methods: {
            closeMessage(){
                this.isVisible = false;
            }
        }
    }
</script>