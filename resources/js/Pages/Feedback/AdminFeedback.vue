<script setup lang="ts">
import AdminSidebarLayout from '@/Layouts/Sidebar/AdminSidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Feedback" />

    <AdminSidebarLayout>
        <template #header>Admin » Feedback</template>
        <h1 class="text-2xl font-semibold mb-2">Feedback</h1>
        <p class="text-primary-500">Feedback across all boards will appear here.</p>
    </AdminSidebarLayout>
</template>
