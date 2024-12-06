<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { PlusIcon } from 'lucide-vue-next';
import { Button, Drawer, InputText, Select, Textarea } from 'primevue';
import { nextTick, ref } from 'vue';

const titleInputRef = ref<{ $el: HTMLElement } | null>(null);

const isDrawerVisible = ref(false);
function openDrawer() {
    isDrawerVisible.value = true;
    nextTick(() => {
        titleInputRef.value!.$el.focus();
    })
}

const form = useForm({
    title: '',
    description: '',
    boardId: null,
});

const submit = () => {
    console.log(form);
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
        <form @submit.prevent="submit">
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
            </div>
            <div class="mb-8">
                <label
                    for="board"
                    class="text-md font-semibold block mb-2"
                >
                    Category
                </label>
                <Select
                    v-model="form.boardId"
                    :options="$page.props.boards"
                    optionLabel="name"
                    placeholder="Select a board"
                    checkmark :highlightOnSelect="false"
                    class="w-full"
                />
            </div>
            <Button
                type="submit"
                class="text-sm font-semibold"
                :disabled="form.processing"
            >
                Submit
            </Button>
        </form>
    </Drawer>
</template>
