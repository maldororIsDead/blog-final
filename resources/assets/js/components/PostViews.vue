<template>
    <span>
         <i class="fa fa-eye" style="font-size: 1.5rem" aria-hidden="true"> {{ viewsCurrentCount }}</i>
    </span>
</template>

<script>
    export default {
        name: "post-views",
        props: ['views_count', 'post_id'],

        data() {
            return {
                viewsCurrentCount: 0
            }
        },

        mounted() {
            this.viewsCurrentCount = this.views_count;

            axios.post('/posts/' + this.post_id + '/views')
                .then(response => {
                    this.viewsCurrentCount = response.data.views_count;
                })
        }
    }
</script>