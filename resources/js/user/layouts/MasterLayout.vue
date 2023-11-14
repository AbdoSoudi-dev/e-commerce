<script setup>
import TheHeader from "../components/TheHeader.vue";
import TheFooter from "../components/TheFooter.vue";
</script>

<template>
    <div>
        <the-header />
        <router-view />
        <the-footer />
    </div>
</template>

<style scoped>

</style>
