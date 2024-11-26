<script setup lang="ts">
import AdminSidebarLayout from '@/Layouts/Sidebar/AdminSidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Changelog" />

    <AdminSidebarLayout>
        <template #header>Admin Panel » Changelog</template>
        <div>Admin Changelog View</div>
    </AdminSidebarLayout>
</template>
