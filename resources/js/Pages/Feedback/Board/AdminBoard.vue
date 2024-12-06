<script setup lang="ts">
import AdminSidebarLayout from '@/Layouts/Sidebar/AdminSidebarLayout.vue';
import { Head, Link, router, usePage } from '@inertiajs/vue3';
import EditableInput from '@/Components/EditableInput.vue';
import { ref, watch } from 'vue';
import AdminBoardHeader from './Partials/AdminBoardHeader.vue';

const page = usePage();
const boardId = ref(page.props.board.id);
watch(() => page.props.board, (newBoard) => {
    boardId.value = newBoard.id;
});

function updateBoardDescription(value: string|null) {
    router.patch(route('admin.board.description.update', boardId.value), { description: value })
}
</script>

<template>
    <Head :title="$page.props.board.title || 'Untitled Board'" />

    <AdminSidebarLayout>
        <template #header>Admin » Feedback » {{ $page.props.board.title || 'Untitled Board' }}</template>

        <AdminBoardHeader
            :board-id="$page.props.board.id"
        />
        <EditableInput
            :value="$page.props.board.description"
            placeholder="Add description (optional)"
            class="text-primary-500 mb-6"
            input-class="w-1/2"
            :callback-fn="updateBoardDescription"
        />
        <div
            v-if="!$page.props.board.is_public"
            class="text-xs mb-6 bg-yellow-50 border border-yellow-200 text-yellow-600 px-3 p-2 rounded-md w-fit"
        >
            <div class="text-xs">
                This board is currently private, you can adjust it to your liking and then <Link class="font-semibold underline hover:text-yellow-700" :href="route('admin.board.settings.show', $page.props.board.id)">make it public in the settings</Link>.
            </div>
        </div>
    </AdminSidebarLayout>
</template>
