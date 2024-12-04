<script setup lang="ts">
import AdminSidebarLayout from '@/Layouts/Sidebar/AdminSidebarLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import BoardHeader from './Partials/BoardHeader.vue';
import EditableInput from '@/Components/EditableInput.vue';

function updateBoardDescription(value: string) {
    console.log(value);
}
</script>

<template>
    <Head :title="$page.props.board.title || 'Untitled Board'" />

    <AdminSidebarLayout>
        <template #header>Admin » Feedback » {{ $page.props.board.title || 'Untitled Board' }}</template>

        <BoardHeader
            :is-admin-page="true"
            :board-id="$page.props.board.id"
        />
        <EditableInput
            :value="$page.props.board.description"
            placeholder="Add description (optional)"
            class="text-primary-500 mb-6"
            :is-editable="true"
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
