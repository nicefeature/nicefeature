<script setup lang="ts">
import { ref } from 'vue';

const isSidebarOpen = ref<boolean>(true);
const toggleSidebar = () => {
    isSidebarOpen.value = !isSidebarOpen.value;
}
</script>

<!-- TODO: Make sidebar responsive -->
<template>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div
            :class="`bg-zinc-50 border-zinc-100 border-r transition-all duration-300 ${
                isSidebarOpen ? 'w-64' : 'w-0'
            }`"
            class="h-full overflow-hidden relative"
        >
            <div v-if="isSidebarOpen" class="p-5">
                <!-- Close Button -->
                <button
                    @click="toggleSidebar"
                    class="absolute top-2 right-2 bg-red-500 text-white p-1 rounded-full shadow-md hover:bg-red-600 transition">
                    ✖
                </button>
                Menu comes here...
            </div>
        </div>

        <!-- Open Button -->
        <button
            v-if="!isSidebarOpen"
            @click="toggleSidebar"
            class="absolute top-2 left-2 bg-blue-500 text-white p-2 rounded-full shadow-md hover:bg-blue-600 transition z-10"
        >
            ☰
        </button>

        <!-- Page Content -->
        <main class="flex-1">
            <slot />
        </main>
    </div>
</template>
