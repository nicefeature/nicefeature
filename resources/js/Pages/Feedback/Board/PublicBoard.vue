<script setup lang="ts">
import PublicSidebarLayout from '@/Layouts/Sidebar/PublicSidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
import EditableInput from '@/Components/EditableInput.vue';
import PublicBoardHeader from './Partials/PublicBoardHeader.vue';
</script>

<template>
    <Head :title="$page.props.board.title || 'Untitled Board'" />

    <PublicSidebarLayout>
        <PublicBoardHeader
            :board-id="$page.props.board.id"
        />
        <EditableInput
            v-if="$page.props.board.description"
            :value="$page.props.board.description"
            :is-editable="false"
            class="text-primary-500 mb-6"
        />
    </PublicSidebarLayout>
</template>
