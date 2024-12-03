<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import BoardHeader from '../Partials/BoardHeader.vue';
import AdminSidebarLayout from '@/Layouts/Sidebar/AdminSidebarLayout.vue';
import DeleteBoard from '../Partials/DeleteBoard.vue';
import RemoveEmoji from '../Partials/RemoveEmoji.vue';
import SetVisibility from '../Partials/SetVisibility.vue';
import { Undo2Icon } from 'lucide-vue-next';
import { Button } from 'primevue';
</script>

<template>
    <Head :title="$page.props.board.title || 'Untitled Board'" />

    <AdminSidebarLayout>
        <template #header>Admin » Feedback » {{ $page.props.board.title || 'Untitled Board' }} » Settings</template>

        <Link
            :href="route('admin.board.show', $page.props.board.id)"
        >
            <Button
                severity="secondary"
                class="p-[1px] w-fit h-fit bg-white border-white hover:bg-zinc-200 hover:border-zinc-200"
                v-tooltip.bottom="{ value: 'Go back', class: 'text-xs' }"
            >
                <Undo2Icon :size="30" />
            </Button>
        </Link>

        <SetVisibility
            :board-id="$page.props.board.id"
            :is-public="$page.props.board.is_public"
        />
        <RemoveEmoji
            v-if="$page.props.board.emoji"
            :board-id="$page.props.board.id"
        />
        <DeleteBoard
            :board-id="$page.props.board.id"
        />
    </AdminSidebarLayout>
</template>
