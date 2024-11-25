<script setup lang="ts">
import BaseSidebarLayout from './BaseSidebarLayout.vue';
import SidebarLink from '@/Components/SidebarLink.vue';
import { Link } from '@inertiajs/vue3';
import { MapIcon, RocketIcon, ShieldIcon, StarIcon } from 'lucide-vue-next';
</script>

<template>
    <BaseSidebarLayout>
        <template #sidebarLogo>
            <Link href="/" class="text-md font-bold flex items-center gap-2">
                <img src="https://avatars.githubusercontent.com/u/189303411?s=200&v=4" class="size-6 rounded" />
                nicefeature.io
            </Link>
        </template>
        <template #sidebarTopLinks>
            <SidebarLink
                :href="route('feedback')"
                :active="route().current('feedback')"
            >
                <StarIcon :size="16" />
                Feedback
            </SidebarLink>
            <SidebarLink
                :href="route('roadmap')"
                :active="route().current('roadmap')"
            >
                <MapIcon :size="16" />
                Roadmap
            </SidebarLink>
            <SidebarLink
                :href="route('changelog')"
                :active="route().current('changelog')"
            >
                <RocketIcon :size="16" />
                Changelog
            </SidebarLink>
        </template>
        <template #sidebarBottomLinks>
            <SidebarLink
                :href="route('admin')"
            >
                <ShieldIcon :size="16" />
                Admin Panel
            </SidebarLink>
        </template>
        <template #header>
            <slot name="header" />
        </template>
        <template #mainContent>
            <slot />
        </template>
    </BaseSidebarLayout>
</template>
