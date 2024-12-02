<script setup lang="ts">
import { EllipsisIcon, SquareDashedIcon } from 'lucide-vue-next';
import { Button, Popover } from 'primevue';
import EmojiPicker, { EmojiExt } from 'vue3-emoji-picker';
import { router, usePage } from '@inertiajs/vue3'
import { ref } from 'vue';

defineProps<{
    isAdminPage: boolean;
}>();

const emojiPicker = ref();
const toggleEmojiPicker = (event: any) => {
    emojiPicker.value.toggle(event);
}

const page = usePage();
const boardId = page.props.board.id;

function onSelectEmoji(emoji: EmojiExt) {
    emojiPicker.value.hide();
    router.patch(route('admin.board.emoji.update', boardId), { emoji: emoji.i })
}
</script>

<template>
    <div class="flex items-center justify-between gap-2" :class="isAdminPage ? 'mb-6 ml-[-4px]' : 'mb-2'">
        <Button
            v-if="isAdminPage"
            severity="secondary"
            class="p-[1px] w-fit h-fit bg-white border-white hover:bg-zinc-200 hover:border-zinc-200"
            v-tooltip.bottom="{ value: 'Change Emoji', class: 'text-xs' }"
            @click="toggleEmojiPicker"
        >
            <SquareDashedIcon v-if="!$page.props.board.emoji" :size="30" />
            <div class="text-2xl" v-else>{{ $page.props.board.emoji }}</div>
        </Button>
        <div v-if="!isAdminPage && $page.props.board.emoji" class="text-2xl ml-[-4px]">
            {{ $page.props.board.emoji }}
        </div>
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
    <Popover v-if="isAdminPage" ref="emojiPicker">
        <EmojiPicker
            :native="true"
            :disable-skin-tones="true"
            @select="onSelectEmoji"
        />
    </Popover>
</template>
