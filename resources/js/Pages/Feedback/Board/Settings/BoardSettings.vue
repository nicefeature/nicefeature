<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import BoardHeader from '../Partials/BoardHeader.vue';
import AdminSidebarLayout from '@/Layouts/Sidebar/AdminSidebarLayout.vue';
import DeleteBoard from '../Partials/DeleteBoard.vue';
import RemoveEmoji from '../Partials/RemoveEmoji.vue';
</script>

<template>
    <Head :title="$page.props.board.title || 'Untitled Board'" />

    <AdminSidebarLayout>
        <template #header>Admin » Feedback » {{ $page.props.board.title || 'Untitled Board' }} » Settings</template>
        <BoardHeader
            :is-admin-page="true"
            :board-id="$page.props.board.id"
        />
        <RemoveEmoji
            v-if="$page.props.board.emoji"
            :board-id="$page.props.board.id"
        />
        <DeleteBoard
            :board-id="$page.props.board.id"
        />
    </AdminSidebarLayout>
</template>
