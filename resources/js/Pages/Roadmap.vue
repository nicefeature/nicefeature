<script setup lang="ts">
import AuthSidebarLayout from '@/Layouts/Sidebar/AuthSidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Roadmap" />

    <AuthSidebarLayout>
        <template #header>Roadmap</template>
        <div>Roadmap will come here...</div>
    </AuthSidebarLayout>
</template>
