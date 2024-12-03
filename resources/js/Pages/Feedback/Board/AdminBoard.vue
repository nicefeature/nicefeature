<script setup lang="ts">
import AdminSidebarLayout from '@/Layouts/Sidebar/AdminSidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
import BoardHeader from './Partials/BoardHeader.vue';
</script>

<template>
    <Head :title="$page.props.board.title || 'Untitled Board'" />

    <AdminSidebarLayout>
        <template #header>Admin » Feedback » {{ $page.props.board.title || 'Untitled Board' }}</template>
        <BoardHeader
            :is-admin-page="true"
            :board-id="$page.props.board.id"
        />
        <p class="text-primary-500">Description for {{ $page.props.board.id }} comes here...</p>
    </AdminSidebarLayout>
</template>
