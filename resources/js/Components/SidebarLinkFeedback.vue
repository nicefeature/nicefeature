<script setup lang="ts">
import { computed, ref, watch } from 'vue';
import { Link, router, usePage } from '@inertiajs/vue3';
import { Button } from 'primevue';
import { PlusIcon, StarIcon } from 'lucide-vue-next';
import draggable from 'vuedraggable';

const props = defineProps<{
    href: string;
    active: boolean;
    isAdminPage: boolean;
}>();

const activeClasses = 'bg-zinc-200 border-zinc-200'
const inactiveClasses = 'bg-zinc-50 border-zinc-50'

const classes = computed(() =>
    props.active
        ? activeClasses
        : inactiveClasses,
);

const page = usePage();
const allBoards = ref(page.props.allBoards ?? []);
watch(() => page.props.allBoards, (newBoards) => {
    allBoards.value = newBoards;
});

function onSortEnd() {
    const reorderedBoardIds = allBoards.value.map(board => board.id);
    router.patch(route('admin.board.order.update'), { boardIds: reorderedBoardIds });
}
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
        v-if="isAdminPage && $page.props.allBoards.length === 0"
        class="text-xs text-primary-500 mb-4 mt-2 ml-4 mr-2"
    >
        You have no feedback boards yet, but you can <Link class="underline cursor-pointer hover:text-primary-700" :href="route('admin.board.store')" method="post" as="button">create a new one</Link>
    </div>

    <!-- All Boards for Admins -->
    <div
        v-if="isAdminPage && $page.props.allBoards.length > 0"
        class="flex flex-col"
    >
        <draggable
            v-model="allBoards"
            item-key="id"
            class="flex flex-col"
            @end="onSortEnd"
        >
            <template #item="{element}">
                <Link
                    as="button"
                    :key="element.id"
                    :href="route('admin.board.show', element.id)"
                >
                    <Button
                        severity="secondary"
                        :class="route().current('admin.board.show', element.id) || route().current('admin.board.settings.show', element.id) ? activeClasses : inactiveClasses"
                        class="text-xs font-semibold py-1 pl-8 pr-2 w-full justify-between">
                        <div class="flex gap-1 items-center">
                            <div v-if="element.emoji"class="text-sm ml-[-2px]">{{ element.emoji }}</div>
                            {{ element.title || 'Untitled Board' }}
                        </div>
                    </Button>
                </Link>
            </template>
        </draggable>
    </div>

    <!-- Only Public Boards for Non-Admins -->
    <div
        v-if="!isAdminPage && $page.props.boards.length > 0"
        class="flex flex-col"
    >
        <Link
            v-for="board in $page.props.boards"
            as="button"
            :key="board.id"
            :href="route('board.show', board.id)"
        >
            <Button
                severity="secondary"
                :class="route().current('board.show', board.id) ? activeClasses : inactiveClasses"
                class="text-xs font-semibold py-1 pl-8 pr-2 w-full justify-between">
                <div class="flex gap-1 items-center">
                    <div v-if="board.emoji"class="text-sm ml-[-2px]">{{ board.emoji }}</div>
                    {{ board.title || 'Untitled Board' }}
                </div>
            </Button>
        </Link>
    </div>

</template>
