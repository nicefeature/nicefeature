<script setup lang="ts">
import AdminSidebarLayout from '@/Layouts/Sidebar/AdminSidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Admin Panel" />

    <AdminSidebarLayout>
        <template #header>Admin Panel</template>
        <div>Admin Panel comes here...</div>
    </AdminSidebarLayout>
</template>
