<script setup lang="ts">
import PublicSidebarLayout from '@/Layouts/Sidebar/PublicSidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
import NewFeedback from './Partials/NewFeedback.vue';
</script>

<template>
    <Head title="Feedback" />

    <PublicSidebarLayout>
        <div class="flex items-center justify-between gap-2 mb-2">
            <h1 class="text-2xl font-semibold mb-2">All Feedback</h1>
            <NewFeedback />
        </div>
        <p class="text-primary-500">No feedback received yet</p>
    </PublicSidebarLayout>
</template>
