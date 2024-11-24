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
            class="p-1 m-4"
        >
            <ChevronsRightIcon :size="16" />
        </Button>

        <!-- Page Content -->
        <main class="flex-1">
            <slot />
        </main>
    </div>
</template>
