<script setup lang="ts">
import { Board } from '@/types/board';
import { useForm } from '@inertiajs/vue3';
import { PlusIcon } from 'lucide-vue-next';
import { Button, Drawer, InputText, Message, Select, Textarea } from 'primevue';
import { nextTick, onMounted, ref } from 'vue';

const props = defineProps<{
    board?: Board;
}>();

onMounted(() => {
    if (props.board) {
        form.board = props.board;
    }
})

const titleInputRef = ref<{ $el: HTMLElement } | null>(null);

const isDrawerVisible = ref(false);
function openDrawer() {
    isDrawerVisible.value = true;
    nextTick(() => {
        titleInputRef.value!.$el.focus();
    })
}

const form = useForm<{
    title: string;
    description: string;
    board: Board | null;
    board_id: string
}>({
    title: '',
    description: '',
    board: null,
    board_id: ''
});

function submitFeedback() {
    if (form.board) {
        form.board_id = form.board.id;
    }

    form
        .transform((data) => ({
            title: data.title,
            description: data.description,
            board_id: data.board_id,
        }))
        .post(route('feedback.store'), {
            onSuccess: () => {
                isDrawerVisible.value = false;
                form.title = '';
                form.description = '';
                form.board = props.board ? props.board : null;
            }
        })
};
</script>

<template>
    <Button
        class="text-sm font-semibold"
        @click="openDrawer"
    >
        <PlusIcon :size="16" />
        New Feedback
    </Button>
    <Drawer
        v-model:visible="isDrawerVisible"
        header="New Feedback"
        position="right"
        class="w-full md:w-1/2 p-8"
    >
        <p class="text-primary-500 mb-12">Thank you for taking the time to give us feedback. Please fill out the form below.</p>
        <form @submit.prevent="submitFeedback">
            <div class="mb-8">
                <label
                    for="title"
                    class="text-md font-semibold block mb-2"
                >
                    Title
                </label>
                <InputText
                    id="title"
                    type="text"
                    v-model="form.title"
                    class="w-full"
                    placeholder="Summarize your feedback"
                    ref="titleInputRef"
                />
                <Message
                    v-if="form.errors.title"
                    severity="error"
                    variant="simple"
                    size="small"
                    class="mt-2"
                >
                    {{ form.errors.title }}
                </Message>
            </div>
            <div class="mb-8">
                <label
                    for="description"
                    class="text-md font-semibold block mb-2"
                >
                    Description
                </label>
                <Textarea
                    id="description"
                    v-model="form.description"
                    class="w-full resize-none"
                    placeholder="Please give us more details here"
                    rows="5"
                />
                <Message
                    v-if="form.errors.description"
                    severity="error"
                    variant="simple"
                    size="small"
                >
                    {{ form.errors.description }}
                </Message>
            </div>
            <div class="mb-8">
                <label
                    for="board"
                    class="text-md font-semibold block mb-2"
                >
                    Category
                </label>
                <Select
                    v-model="form.board"
                    :options="$page.props.boards"
                    optionLabel="title"
                    placeholder="Select a board"
                    checkmark :highlightOnSelect="false"
                    class="w-full"
                >
                    <template #value="slotProps">
                        <div v-if="slotProps.value" class="flex items-center">
                            <div v-if="slotProps.value.emoji"class="mr-2">{{ slotProps.value.emoji }}</div>
                            <div>{{ slotProps.value.title || "Untitled Board" }}</div>
                        </div>
                        <span v-else>
                            {{ slotProps.placeholder }}
                        </span>
                    </template>
                    <template #option="slotProps">
                        <div class="flex items-center">
                            <div v-if="slotProps.option.emoji"class="mr-2">{{ slotProps.option.emoji }}</div>
                            <div>{{ slotProps.option.title || "Untitled Board" }}</div>
                        </div>
                    </template>
                </Select>
                <Message
                    v-if="form.errors.board_id"
                    severity="error"
                    variant="simple"
                    size="small"
                    class="mt-2"
                >
                    {{ form.errors.board_id }}
                </Message>
            </div>
            <Button
                type="submit"
                class="font-semibold"
                :disabled="form.processing"
            >
                Submit
            </Button>
        </form>
    </Drawer>
</template>
