<script setup lang="ts">
import { SettingsIcon, SquareDashedIcon } from 'lucide-vue-next';
import { Button, Popover } from 'primevue';
import EmojiPicker, { EmojiExt } from 'vue3-emoji-picker';
import { Link, router } from '@inertiajs/vue3'
import { ref } from 'vue';
import EditableInput from '@/Components/EditableInput.vue';

const props = defineProps<{
    isAdminPage: boolean;
    boardId: string;
}>();

const emojiPicker = ref();
const toggleEmojiPicker = (event: any) => {
    emojiPicker.value.toggle(event);
}

function onSelectEmoji(emoji: EmojiExt) {
    emojiPicker.value.hide();
    router.patch(route('admin.board.emoji.update', props.boardId), { emoji: emoji.i })
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
        <EditableInput
            :value="$page.props.board.title"
            placeholder="Untitled Board"
            class="text-2xl font-semibold flex-1"
            :is-editable="isAdminPage"
            :icon-size="20"
        />
        <Link
            v-if="isAdminPage"
            :href="route('admin.board.settings.show', $page.props.board.id)"
        >
            <Button
                severity="secondary"
                class="p-[1px] w-fit h-fit bg-white border-white hover:bg-zinc-200 hover:border-zinc-200"
                v-tooltip.bottom="{ value: 'Settings', class: 'text-xs' }"
            >
                <SettingsIcon :size="30" />
            </Button>
        </Link>
    </div>
    <Popover
        v-if="isAdminPage"
        ref="emojiPicker"
        :unstyled="true"
    >
        <EmojiPicker
            :native="true"
            :disable-skin-tones="true"
            @select="onSelectEmoji"
        />
    </Popover>
</template>
