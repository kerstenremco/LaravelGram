<template>
    <div>
        <button class="btn btn-primary ml-4" @click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        props: ['userid', 'follows'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function() {
            return {
                status: this.follows,
            }
        },

        methods: {
            followUser() {
                axios.post(`/follow/${this.userid}`)
                    .then(response => {
                        this.status = !this.status
                    })
                    .catch(e => {
                        if(e.response.status == 401) window.location = '/login';
                    })
            }
        },

        computed: {
            buttonText() {
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }
    }
</script>
