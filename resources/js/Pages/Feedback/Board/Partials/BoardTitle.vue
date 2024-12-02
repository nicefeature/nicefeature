<script setup lang="ts">
import { EllipsisIcon, SquareDashedIcon } from 'lucide-vue-next';
import { Button } from 'primevue';
import EmojiPicker, { Emoji } from 'vue3-emoji-picker';

defineProps<{
    isAdminPage: boolean;
}>();

function onSelectEmoji(emoji: Emoji) {
  console.log(emoji)
}
</script>

<template>
    <div class="flex items-center justify-between gap-4" :class="isAdminPage ? 'mb-6 ml-[-4px]' : 'mb-2'">
        <Button
            v-if="isAdminPage"
            severity="secondary"
            class="p-[1px] w-fit h-fit bg-white border-white hover:bg-zinc-200 hover:border-zinc-200"
            v-tooltip.bottom="{ value: 'Change Emoji', class: 'text-xs' }"
        >
            <SquareDashedIcon v-if="!$page.props.board.emoji" :size="30" />
            <div class="text-xl" v-else>{{ $page.props.board.emoji }}</div>
        </Button>
        <h1 class="text-2xl font-semibold flex-1">
            {{ $page.props.board.title || 'Untitled Board' }}
        </h1>
        <Button
            v-if="isAdminPage"
            severity="secondary"
            class="p-[1px] w-fit h-fit bg-white border-white hover:bg-zinc-200 hover:border-zinc-200"
        >
            <EllipsisIcon :size="30" />
        </Button>
    </div>
    <!-- Should be inside a dropdown -->
    <div v-if="isAdminPage" class="w-fit my-10">
        <EmojiPicker
            :native="true"
            :disable-skin-tones="true"
            @select="onSelectEmoji"
        />
    </div>
</template>
