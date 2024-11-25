<script setup lang="ts">
import PublicSidebarLayout from '@/Layouts/Sidebar/PublicSidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Home" />

    <PublicSidebarLayout>
        <template #header>Home</template>
        <div>Public overview will come here</div>
    </PublicSidebarLayout>
</template>
