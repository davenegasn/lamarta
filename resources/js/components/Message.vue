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
