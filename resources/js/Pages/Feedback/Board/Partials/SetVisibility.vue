<script setup lang="ts">
import { Button, Dialog } from 'primevue';
import { router } from '@inertiajs/vue3'
import { ref } from 'vue';

const props = defineProps<{
    boardId: string;
    isPublic: boolean;
}>();

const isConfirmModalVisible = ref(false);

function onToggleVisibility() {
    isConfirmModalVisible.value = false;
    router.patch(route('admin.board.visibility.update', props.boardId), { isPublic: !props.isPublic })
}
</script>

<template>
    <div class="py-6 border-b border-gray-100">
        <h2 class="text-xl font-semibold text-primary">
            Make Board {{ isPublic ? 'Private' : 'Public' }}
        </h2>
        <p class="mt-1 text-sm text-primary-600 mb-6">
            This board is currently <span class="font-bold">{{ isPublic ? 'public' : 'private' }}</span>. {{ isPublic ? 'Your visitors can see it.' : 'Your visitors cannot see it.' }}
        </p>
        <Button
            :severity="isPublic ? 'secondary' : 'success'"
            class="text-sm font-semibold"
            @click="isConfirmModalVisible = true"
        >
            Make {{ isPublic ? 'private' : 'public' }} now
        </Button>
    </div>
    <Dialog
        v-model:visible="isConfirmModalVisible"
        modal
        :header="isPublic ? 'Make Board Private' : 'Make Board Public'"
        :dismissable-mask="true"
        :style="{ width: '25rem' }"
    >
        <p class="text-sm mb-8">
            {{
                isPublic
                    ? 'Are you sure you want to make this board private? This will hide the board from all visitors.'
                    : 'Are you sure you want to make this board public? This will make the board visible to all visitors.'
            }}
        </p>
        <Button
            :severity="isPublic ? 'secondary' : 'success'"
            class="text-sm font-semibold"
            @click="onToggleVisibility"
        >
            Yes, make {{ isPublic ? 'private' : 'public' }} now
        </Button>
    </Dialog>
</template>
