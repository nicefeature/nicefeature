<script setup lang="ts">
import AuthSidebarLayout from '@/Layouts/Sidebar/AuthSidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Admin Panel" />

    <AuthSidebarLayout>
        <template #header>Admin Panel</template>
        <div>Admin Panel comes here...</div>
    </AuthSidebarLayout>
</template>
