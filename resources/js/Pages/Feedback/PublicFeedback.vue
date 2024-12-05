<script setup lang="ts">
import PublicSidebarLayout from '@/Layouts/Sidebar/PublicSidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Feedback" />

    <PublicSidebarLayout>
        <h1 class="text-2xl font-semibold mb-2">Feedback</h1>
        <p class="text-primary-500">No feedback received yet</p>
    </PublicSidebarLayout>
</template>
