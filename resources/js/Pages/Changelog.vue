<script setup lang="ts">
import AuthSidebarLayout from '@/Layouts/Sidebar/AuthSidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Changelog" />

    <AuthSidebarLayout>
        <template #header>Changelog</template>
        <div>Changelog will come here...</div>
    </AuthSidebarLayout>
</template>
