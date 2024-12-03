<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import BoardHeader from '../Partials/BoardHeader.vue';
import AdminSidebarLayout from '@/Layouts/Sidebar/AdminSidebarLayout.vue';
</script>

<template>
    <Head :title="$page.props.board.title || 'Untitled Board'" />

    <AdminSidebarLayout>
        <template #header>Admin » Feedback » {{ $page.props.board.title || 'Untitled Board' }} » Settings</template>
        <BoardHeader :isAdminPage="true" />
        <p class="text-primary-500">Settings for {{ $page.props.board.id }} comes here...</p>
    </AdminSidebarLayout>
</template>
