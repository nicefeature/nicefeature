<script setup lang="ts">
import NewFeedback from '../../Partials/NewFeedback.vue';


const props = defineProps<{
    boardId: string;
}>();
</script>

<template>
    <div class="flex items-center justify-between gap-2 mb-2">
        <div v-if="$page.props.board.emoji" class="text-2xl ml-[-4px]">
            {{ $page.props.board.emoji }}
        </div>
        <div
            v-if="$page.props.board.title"
            class="text-2xl font-semibold flex-1"
        >
            {{ $page.props.board.title }}
        </div>
        <div
            v-else
            class="text-2xl font-semibold flex-1"
        >
            Untitled Board
        </div>
        <NewFeedback />
    </div>
</template>
