<script setup lang="ts">
import AdminSidebarLayout from '@/Layouts/Sidebar/AdminSidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<!-- Board title should come from DB, if it's null we put a placeholder -->
<template>
    <Head title="Untitled Board" />

    <AdminSidebarLayout>
        <template #header>Admin » Feedback » Untitled Board</template>
        <h1 class="text-2xl font-semibold mb-2">Untitled Board</h1>
        <p class="text-primary-500">Description for {{ $page.props.board.id }} comes here...</p>
    </AdminSidebarLayout>
</template>
