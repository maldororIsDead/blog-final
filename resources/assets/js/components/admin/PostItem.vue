<template>
    <div class="col-8 mb-3 mx-5">
        <div class="card">
            <div class="card-header py-4">
                <h3>{{ post.title }}</h3>
            </div>
            <img class="card-img-top" :src="post.thumbnail"
                 alt="Card image cap">
            <div class="card-body">
                <p class="card-text py-2">{{ post.summary }}</p>
            </div>
            <div class="card-footer">
                <p class="card-text py-2">{{ post.body }}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                post: [],
                id: this.$route.params.id
            }
        },

        mounted() {
            axios.get('/api/admin/posts/' + this.id)
                .then(response => {
                    this.post = response.data.data;
                })
        }
    }
</script>

<style scoped>

</style>