<script setup lang="ts">
import PublicSidebarLayout from '@/Layouts/Sidebar/PublicSidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
import NewFeedback from './Partials/NewFeedback.vue';
import FeedbackList from './Partials/FeedbackList.vue';
</script>

<template>
    <Head title="Feedback" />

    <PublicSidebarLayout>
        <div class="flex items-center justify-between gap-2 mb-10">
            <h1 class="text-2xl font-semibold">All Feedback</h1>
            <NewFeedback />
        </div>
        <FeedbackList />
    </PublicSidebarLayout>
</template>
