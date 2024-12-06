<script setup lang="ts">
import { PlusIcon } from 'lucide-vue-next';
import { Button, Drawer } from 'primevue';
import { ref } from 'vue';

const visible = ref(false);
</script>

<template>
    <Button
        class="text-sm font-semibold"
        @click="visible = true"
    >
        <PlusIcon :size="16" />
        New Feedback
    </Button>
    <Drawer
        v-model:visible="visible"
        header="New Feedback"
        position="right"
        class="w-full md:w-1/2"
    >
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </Drawer>
</template>
