<script setup lang="ts">
import AdminSidebarLayout from '@/Layouts/Sidebar/AdminSidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Feedback" />

    <AdminSidebarLayout>
        <template #header>Admin Panel » Feedback</template>
        <div>Admin Feedback View</div>
    </AdminSidebarLayout>
</template>
