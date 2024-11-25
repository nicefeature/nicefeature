<script setup lang="ts">
import AdminSidebarLayout from '@/Layouts/Sidebar/AdminSidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Feedback" />

    <AdminSidebarLayout>
        <template #header>Feedback</template>
        <div>Feedback on all your boards will come here...</div>
    </AdminSidebarLayout>
</template>
