<script setup lang="ts">
import PublicSidebarLayout from '@/Layouts/Sidebar/PublicSidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
import PublicBoardHeader from './Partials/PublicBoardHeader.vue';
import FeedbackList from '../Partials/FeedbackList.vue';
</script>

<template>
    <Head :title="$page.props.board.title || 'Untitled Board'" />

    <PublicSidebarLayout>
        <PublicBoardHeader
            :board-id="$page.props.board.id"
        />
        <div
            v-if="$page.props.board.description"
            class="text-primary-500 mb-6"
        >
            {{ $page.props.board.description }}
        </div>
        <FeedbackList
            :feedback="$page.props.feedback"
        />
    </PublicSidebarLayout>
</template>
