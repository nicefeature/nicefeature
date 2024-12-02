<script setup lang="ts">
import AdminSidebarLayout from '@/Layouts/Sidebar/AdminSidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
import BoardTitle from './Partials/BoardTitle.vue';
</script>

<!-- Board title should come from DB, if it's null we put a placeholder -->
<template>
    <Head :title="$page.props.board.title || 'Untitled Board'" />

    <AdminSidebarLayout>
        <template #header>Admin » Feedback » {{ $page.props.board.title || 'Untitled Board' }}</template>
        <BoardTitle />
        <p class="text-primary-500">Description for {{ $page.props.board.id }} comes here...</p>
    </AdminSidebarLayout>
</template>
