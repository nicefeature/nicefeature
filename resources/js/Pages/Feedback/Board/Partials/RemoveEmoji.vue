<script setup lang="ts">
import { router, usePage } from '@inertiajs/vue3'
import { Button } from 'primevue';

const page = usePage();
const boardId = page.props.board.id;

function onRemoveEmoji() {
    router.patch(route('admin.board.emoji.update', boardId), { emoji: null })
}
</script>

<template>
    <div class="py-6 border-b border-gray-100">
        <h2 class="text-xl font-semibold text-primary">
            Remove Emoji
        </h2>
        <p class="mt-1 text-sm text-primary-600 mb-6">
            You can remove {{ $page.props.board.emoji }} as the board emoji here
        </p>
        <Button
            severity="secondary"
            class="text-sm font-semibold"
            @click="onRemoveEmoji"
        >
            Remove
        </Button>
    </div>
</template>
