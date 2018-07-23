<template>
    <span :class="{ 'text-danger': isLikedCurrent }">
         <i class="fa fa-thumbs-o-up" style="font-size: 1.5rem" @click="likePost" aria-hidden="true">
             {{ likesCurrentCount }}
         </i>
    </span>
</template>

<script>
    export default {
        name: "post-likes",
        props: ['is_liked', 'post_id', 'likes_count'],

        data() {
            return {
                isLikedCurrent: false,
                likesCurrentCount: 0
            }
        },

        mounted() {
            if (this.is_liked) {
                this.isLikedCurrent = true;
            }
            this.likesCurrentCount = this.likes_count;
        },

        methods: {
            likePost() {
                axios.post('/posts/' + this.post_id + '/like')
                    .then(response => {
                        this.likesCurrentCount = response.data.likes_count;
                        this.isLikedCurrent = response.data.is_liked;
                    })
            }
        }

    }
</script>

<style scoped>

</style>