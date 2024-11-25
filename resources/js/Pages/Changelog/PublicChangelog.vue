<script setup lang="ts">
import PublicSidebarLayout from '@/Layouts/Sidebar/PublicSidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Changelog" />

    <PublicSidebarLayout>
        <template #header>Changelog</template>
        <div>Public Changelog View</div>
    </PublicSidebarLayout>
</template>
