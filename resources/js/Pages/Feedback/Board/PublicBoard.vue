<script setup lang="ts">
import PublicSidebarLayout from '@/Layouts/Sidebar/PublicSidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<!-- Board title should come from DB, if it's null we put a placeholder -->
<template>
    <Head title="New Board" />

    <PublicSidebarLayout>
        <h1 class="text-2xl font-semibold mb-2">New Board</h1>
        <p class="text-primary-500">Description comes here...</p>
    </PublicSidebarLayout>
</template>
