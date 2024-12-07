<script setup lang="ts">
import AdminSidebarLayout from '@/Layouts/Sidebar/AdminSidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
import FeedbackList from './Partials/FeedbackList.vue';
</script>

<template>
    <Head title="Feedback" />

    <AdminSidebarLayout>
        <template #header>Admin » Feedback</template>
        <h1 class="text-2xl font-semibold mb-8">Feedback</h1>
        <FeedbackList />
    </AdminSidebarLayout>
</template>
