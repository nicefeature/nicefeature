<script setup lang="ts">
import SidebarLink from '@/Components/SidebarLink.vue';
import { Link } from '@inertiajs/vue3';
import { ChevronsLeftIcon, ChevronsRightIcon, MapIcon, RocketIcon, StarIcon } from 'lucide-vue-next';
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
                    <Link :href="route('dashboard')" class="text-md font-semibold">nicefeature</Link>
                    <Button
                        @click="toggleSidebar"
                        severity="secondary"
                        class="p-1"
                    >
                        <ChevronsLeftIcon :size="16" />
                    </Button>
                </div>
                <div class="flex flex-col gap-2">
                    <SidebarLink
                        :href="route('feedback')"
                        :active="route().current('feedback')"
                    >
                        <StarIcon :size="16" class="mr-1" />
                        Feedback
                    </SidebarLink>
                    <SidebarLink
                        :href="route('roadmap')"
                        :active="route().current('roadmap')"
                    >
                        <MapIcon :size="16" class="mr-1" />
                        Roadmap
                    </SidebarLink>
                    <SidebarLink
                        :href="route('changelog')"
                        :active="route().current('changelog')"
                    >
                        <RocketIcon :size="16" class="mr-1" />
                        Changelog
                    </SidebarLink>
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
