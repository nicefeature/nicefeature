<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import BoardHeader from '../Partials/BoardHeader.vue';
import AdminSidebarLayout from '@/Layouts/Sidebar/AdminSidebarLayout.vue';
import DeleteBoard from '../Partials/DeleteBoard.vue';
</script>

<template>
    <Head :title="$page.props.board.title || 'Untitled Board'" />

    <AdminSidebarLayout>
        <template #header>Admin » Feedback » {{ $page.props.board.title || 'Untitled Board' }} » Settings</template>
        <BoardHeader :isAdminPage="true" />
        <DeleteBoard />
    </AdminSidebarLayout>
</template>
