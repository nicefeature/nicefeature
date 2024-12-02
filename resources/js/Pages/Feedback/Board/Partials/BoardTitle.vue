<script setup lang="ts">
import { EllipsisIcon, SquareDashedIcon } from 'lucide-vue-next';
import { Button } from 'primevue';

const props = defineProps<{
    isAdminPage: boolean;
}>();
</script>

<template>
    <div class="flex items-center justify-between gap-4" :class="isAdminPage ? 'mb-6 ml-[-4px]' : 'mb-2'">
        <Button
            v-if="isAdminPage"
            severity="secondary"
            class="p-[1px] w-fit h-fit bg-white border-white hover:bg-zinc-200 hover:border-zinc-200"
            v-tooltip.bottom="{ value: 'Change Emoji', class: 'text-xs' }"
        >
            <SquareDashedIcon :size="30" />
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
</template>
