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
            <div v-if="isSidebarOpen" class="p-5">
                <div class="flex items-center justify-between mb-8">
                    <p class="text-md font-semibold">nicefeature</p>
                    <Button
                        @click="toggleSidebar"
                        severity="secondary"
                        class="p-1"
                    >
                        <ChevronsLeftIcon :size="16" />
                    </Button>
                </div>
                <div>
                    Menu comes here...
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
            <header class="my-6 ml-5 text-sm uppercase font-semibold tracking-widest text-slate-600">
                <slot name="header" />
            </header>
            <div class="ml-5">
                <slot />
            </div>
        </main>
    </div>
</template>
