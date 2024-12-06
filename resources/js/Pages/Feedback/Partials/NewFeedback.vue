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
    board: null,
});

const submit = () => {
    console.log('TITLE: ' + form.title);
    console.log('DESC: ' + form.description);
    console.log(form.board);
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
