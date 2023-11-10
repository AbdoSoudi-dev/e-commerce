<script setup>
import {onBeforeMount, ref} from "vue";
    import AppHeader from "../components/AppHeader.vue";
    import AppFooter from "../components/AppFooter.vue";

    import api from "../../axios.js"

    onBeforeMount(()=> {
        api.get('products')
            .then(res => {
                console.log(res)
            })
    });

</script>

<template>
    <div>
        <app-header />
            <router-view />
        <app-footer />
    </div>
</template>

<style scoped>

</style>
