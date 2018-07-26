<template>
    <div class="col-12 mb-3 mx-5">
        <div class="card">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Summary</th>
                    <th scope="col">Body</th>
                    <th scope="col">Thumbnail</th>
                    <th scope="col" colspan="3">
                        <router-link class="btn btn-success btn-block" :to="{name: 'createPost'}">Add</router-link>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(post, index) in posts">
                    <th scope="row">{{ post.id }}</th>
                    <td>{{ post.title }}</td>
                    <td>{{ post.summary }}</td>
                    <td>{{ post.body }}</td>
                    <td><img class="post__image" :src="post.thumbnail"></td>
                    <td>
                        <router-link class="btn btn-primary"
                                     :to="{name: 'showPost', params: {id: post.id, post: post} }">Show
                        </router-link>
                    </td>
                    <td>
                        <router-link class="btn btn-primary"
                                     :to="{name: 'updatePost', params: {id: post.id, post: post} }">Edit
                        </router-link>
                    </td>
                    <td>
                        <button @click="deletePost(post.id, index)" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col justify-content-centered">
            <button class="btn btn-default" @click="fetchPosts(pagination.prev_page)"
                    :disabled="!pagination.prev_page">prev
            </button>
            <span class="ml-4 mr-4 p-2">
                    page {{pagination.current_page}} of {{pagination.total}}
                </span>
            <button class="btn btn-default " @click="fetchPosts(pagination.next_page)"
                    :disabled="!pagination.next_page">
                next
            </button>
        </div>
    </div>
</template>


<script>
    export default {
        data() {
            return {
                posts: [],
                pagination: []
            }
        },

        mounted() {
            this.fetchPosts();
        },

        methods: {
            deletePost(id, index) {
                axios.delete('/api/admin/posts/' + id)
                    .then(response => {
                        this.posts.splice(index, 1);
                        this.posts = response.data.data;
                    })
            },
            fetchPosts(url = '/api/admin/posts') {
                axios.get(url)
                    .then(response => {
                        this.posts = response.data.data;
                        this.createPagination(response);
                    })
            },
            createPagination(response) {
                this.pagination = {
                    current_page: response.data.meta.current_page,
                    total: response.data.meta.last_page,
                    next_page: response.data.links.next,
                    prev_page: response.data.links.prev,
                };
            }
        }
    }
</script>

<style scoped>
    .post__image {
        width: 100%;
        max-width: 300px;
    }
</style>