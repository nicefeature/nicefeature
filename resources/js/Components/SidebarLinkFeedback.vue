<script setup lang="ts">
import { computed } from 'vue';
import { Link, router } from '@inertiajs/vue3';
import { Button } from 'primevue';
import { PlusIcon, StarIcon } from 'lucide-vue-next';

const props = defineProps<{
    href: string;
    active: boolean;
    isAdminPage: boolean;
}>();

const classes = computed(() =>
    props.active
        ? 'bg-zinc-200 border-zinc-200 hover:bg-zinc-200 hover:border-zinc-200'
        : 'bg-zinc-50 border-zinc-50 hover:bg-zinc-200 hover:border-zinc-200',
);

function createBoard() {
    // TODO: Now redirect to admin.board.show with the ID (should I return a JSON instead and redirect here? Research!)
    router.post(route('admin.board.store'));
}
</script>

<template>
    <Link :href="href" as="button">
        <Button severity="secondary" :class="classes" class="text-sm font-semibold py-1 pl-3 pr-2 w-full justify-between">
            <div class="flex gap-4 items-center">
                <StarIcon :size="16" />
                Feedback
            </div>
            <Button
                v-if="isAdminPage"
                @click="createBoard"
                severity="secondary"
                class="p-[1px] bg-transparent border-transparent hover:bg-zinc-300 hover:border-zinc-300"
                v-tooltip.bottom="{ value: 'Create new board', class: 'text-xs' }"
            >
                <PlusIcon :size="16" />
            </Button>
        </Button>
    </Link>
    <div
        v-if="isAdminPage"
        class="text-xs text-primary-500 mb-4 mt-2 ml-4 mr-2"
    >
        You have no feedback boards yet, but you can <span class="underline cursor-pointer hover:text-primary-700" @click="createBoard">create a new one</span>
    </div>
</template>
