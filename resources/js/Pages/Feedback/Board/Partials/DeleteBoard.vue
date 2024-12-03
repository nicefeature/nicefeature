<script setup lang="ts">
import { Button, Dialog } from 'primevue';
import { ref } from 'vue';
import { router, usePage } from '@inertiajs/vue3'

const isConfirmModalVisible = ref(false);
const page = usePage();
const boardId = page.props.board.id;

function onDeleteBoard() {
    isConfirmModalVisible.value = false;
    router.delete(route('admin.board.delete', boardId));
}
</script>

<template>
    <div class="py-6">
        <h2 class="text-xl font-semibold text-primary">
            Delete Board
        </h2>
        <p class="mt-1 text-sm text-primary-600 mb-6">
            Once your board is deleted, all of its resources and data will
            be permanently deleted.
        </p>
        <Button
            severity="danger"
            class="text-sm font-semibold"
            @click="isConfirmModalVisible = true"
        >
            Delete
        </Button>
    </div>
    <Dialog
        v-model:visible="isConfirmModalVisible"
        modal
        header="Delete Board"
        :dismissable-mask="true"
        :style="{ width: '25rem' }"
    >
        <p class="text-sm mb-8">
            Are you sure you want to delete this board? This  action cannot be undone.
        </p>
        <Button
            severity="danger"
            class="text-sm font-semibold"
            @click="onDeleteBoard"
        >
            Yes, delete now
        </Button>
    </Dialog>
</template>
