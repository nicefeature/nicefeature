<script setup lang="ts">
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';
import { Button } from 'primevue';
import { DotIcon, LayersIcon, PlusIcon, SquareDashedIcon, StarIcon } from 'lucide-vue-next';

const props = defineProps<{
    href: string;
    active: boolean;
    isAdminPage: boolean;
}>();

const activeClasses = 'bg-zinc-200 border-zinc-200 hover:bg-zinc-200 hover:border-zinc-200'
const inactiveClasses = 'bg-zinc-50 border-zinc-50 hover:bg-zinc-200 hover:border-zinc-200'

const classes = computed(() =>
    props.active
        ? activeClasses
        : inactiveClasses,
);
</script>

<template>
    <Link :href="href" as="button">
        <Button severity="secondary" :class="classes" class="text-sm font-semibold py-1 pl-3 pr-2 w-full justify-between">
            <div class="flex gap-4 items-center">
                <StarIcon :size="16" />
                Feedback
            </div>
            <Link
                v-if="isAdminPage"
                as="button"
                :href="route('admin.board.store')"
                method="post"
                class="p-[1px] rounded bg-transparent border-transparent hover:bg-zinc-300 hover:border-zinc-300"
                v-tooltip.bottom="{ value: 'Create new board', class: 'text-xs' }"
            >
                <PlusIcon :size="16" />
            </Link>
        </Button>
    </Link>
    <div
        v-if="isAdminPage && $page.props.boards.length === 0"
        class="text-xs text-primary-500 mb-4 mt-2 ml-4 mr-2"
    >
        You have no feedback boards yet, but you can <Link class="underline cursor-pointer hover:text-primary-700" :href="route('admin.board.store')" method="post" as="button">create a new one</Link>
    </div>
    <div
        v-if="$page.props.boards.length > 0"
        class="flex flex-col"
    >
        <Link
            v-for="board in $page.props.boards"
            as="button"
            :key="board.id"
            :href="isAdminPage ? route('admin.board.show', board.id) : route('board.show', board.id)"
        >
            <Button
                severity="secondary"
                :class="route().current('admin.board.show', board.id) || route().current('board.show', board.id) ? activeClasses : inactiveClasses"
                class="text-xs font-semibold py-1 pl-5 pr-2 w-full justify-between">
                <div class="flex gap-2 items-end">
                    <SquareDashedIcon v-if="isAdminPage":size="16" />
                    {{ board.title || 'Untitled Board' }}
                </div>
            </Button>
        </Link>
    </div>
</template>
