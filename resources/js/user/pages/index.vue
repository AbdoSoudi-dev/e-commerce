<script setup>
    import { ref } from "vue";
    import AppHeader from "../components/AppHeader.vue";
    import AppFooter from "../components/AppFooter.vue";

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
