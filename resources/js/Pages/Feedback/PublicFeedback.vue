<script setup lang="ts">
import PublicSidebarLayout from '@/Layouts/Sidebar/PublicSidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Feedback" />

    <PublicSidebarLayout>
        <template #header>Feedback</template>
        <div>Public Feedback View</div>
    </PublicSidebarLayout>
</template>
