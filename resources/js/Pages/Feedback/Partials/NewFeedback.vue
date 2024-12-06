<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import { PlusIcon } from 'lucide-vue-next';
import { Button, Drawer, InputText } from 'primevue';
import { nextTick, ref } from 'vue';

const titleInputRef = ref<{ $el: HTMLElement } | null>(null);

const isDrawerVisible = ref(false);
function openDrawer() {
    isDrawerVisible.value = true;
    nextTick(() => {
        titleInputRef.value!.$el.focus();
    })
}

// TODO: Add board id
const form = useForm({
    title: '',
    description: '',
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
        <p class="text-primary-500 mb-12">Please submit your feedback here.</p>
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
                    placeholder="Enter a title that summarizes your feedback"
                    ref="titleInputRef"
                />
            </div>
        </form>
    </Drawer>
</template>
