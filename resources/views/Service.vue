<template>
    <div>
        Services page

        <router-link :to="{ name : 'home' }">
            go to home
        </router-link>
    </div>
</template>

<script>
    export default {
        mounted : function(){
            console.log('services')
        }
    }
</script>