<template>
    <div class="container">
        <button class="btn btn-outline-primary" @click="followUser" v-text="buttonText"></button>
    </div>
<!-- you have to wrap everything in one big div-->
</template>

<script>
    export default {
        props:['userId', 'follows'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function(){
            return {
                status: this.follows,
            }
        },

        methods:{
            followUser(){
                axios.post('/follow/' + this.userId)
                    .then(response =>{
                        this.status = ! this.status
                        console.log(response.data);
                    })
                    .catch(errors=>{
                        if (errors.response.status == 401) {
                            window.location = '/login';
                        }
                    });
            }
        },

        computed: {
            buttonText() {
                return (this.status) ? 'Unfollow' : 'Follow'
            } //I am having a problem with the initial condition of the button upon login
        }

    }
</script>
