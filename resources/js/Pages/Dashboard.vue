<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

</script>

<template>
    <AppLayout title="Dashboard">
       <h1>Welcome back, {{ $page.props.auth.user.name }}!</h1>
    </AppLayout>
</template>

<style scoped>

</style>
