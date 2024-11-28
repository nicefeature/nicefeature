<script setup lang="ts">
import { ChevronsLeftIcon, ChevronsRightIcon } from 'lucide-vue-next';
import { Button } from 'primevue';
import { ref } from 'vue';

const isSidebarOpen = ref<boolean>(true);
const toggleSidebar = () => {
    isSidebarOpen.value = !isSidebarOpen.value;
}
</script>

<!-- TODO: Make sidebar responsive -->
<template>
    <div :class="`flex ${isSidebarOpen ? 'h-screen' : ''}`">
        <!-- Sidebar -->
        <div
            :class="`bg-zinc-50 border-zinc-100 border-r transition-all duration-300 h-full overflow-hidden relative ${
                isSidebarOpen ? 'w-64' : 'w-0'
            }`"
        >
            <div v-if="isSidebarOpen" class="py-5 flex flex-col h-full">
                <div class="flex items-center justify-between mb-8 px-5">
                    <slot name="sidebarLogo" />
                    <Button
                        @click="toggleSidebar"
                        severity="secondary"
                        class="p-1 bg-zinc-50 border-zinc-50 hover:bg-zinc-200 hover:border-zinc-200"
                    >
                        <ChevronsLeftIcon :size="16" />
                    </Button>
                </div>
                <slot name="message" />
                <div class="flex flex-col gap-1 pl-3 pr-5 flex-1">
                    <slot name="sidebarTopLinks" />
                </div>
                <div class="flex flex-col gap-1 pl-3 pr-5">
                    <slot name="sidebarBottomLinks" />
                </div>
            </div>
        </div>

        <!-- Open Button -->
        <Button
            v-if="!isSidebarOpen"
            @click="toggleSidebar"
            severity="secondary"
            class="p-1 ml-4 mt-5 size-fit"
        >
            <ChevronsRightIcon :size="16" />
        </Button>

        <!-- Page Content -->
        <main class="flex-1">
            <header class="mt-6 mb-9 ml-5 text-sm uppercase font-semibold tracking-widest text-zinc-600">
                <slot name="header" />
            </header>
            <div class="ml-5">
                <slot name="mainContent"/>
            </div>
        </main>
    </div>
</template>
