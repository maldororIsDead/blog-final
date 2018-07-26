<template>
    <div class="col-8 mb-3 mx-5">
        <div class="card">
            <div class="col-md-12 mx-2">
                <form action='/api/admin/posts' method="POST" @submit.prevent=onSubmit>
                    <div class="form-group">
                        <label for="inputTitle">Title</label>
                        <input type="text" class="form-control" id="inputTitle" name="title"
                               placeholder="Enter your post title" v-model="post.title">
                    </div>
                    <div class="form-group">
                        <label for="inputSummary">Summary</label>
                        <textarea class="form-control" name="summary" id="inputSummary"
                                  rows="3" v-model="post.summary"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Body</label>
                        <textarea class="form-control" name="body" id="exampleFormControlTextarea1"
                                  rows="5" v-model="post.body"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputFile">Upload file</label>
                        <input type="file" @change="addFile" id="inputFile" name="thumbnail"/>
                    </div>
                    <div class="form-group">
                        <button @click="create" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                post: {
                    title: '',
                    summary: '',
                    body: '',
                    thumbnail: null
                }
            }
        },

        methods: {
            addFile(event) {
                this.post.thumbnail = event.target.files[0];
            },
            onSubmit() {
                axios.post('/api/admin/posts', this.$data)
                    .then(response => {
                        this.post = {};
                        this.$router.push({name: 'admin'});
                    })
            }
        }
    }
</script>

<style scoped>

</style>