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
            class="h-full overflow-hidden"
        >
            <div class="p-5">
                Menu comes here...
            </div>
        </div>

        <!-- Page Content -->
        <main class="flex-1">
            <slot />
        </main>
    </div>
</template>
