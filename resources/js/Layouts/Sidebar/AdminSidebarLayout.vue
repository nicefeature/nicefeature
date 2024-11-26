<script setup lang="ts">
import BaseSidebarLayout from './BaseSidebarLayout.vue';
import SidebarLink from '@/Components/SidebarLink.vue';
import { Link } from '@inertiajs/vue3';
import { LogOutIcon, MapIcon, RocketIcon, StarIcon } from 'lucide-vue-next';
import { Message } from 'primevue';
</script>

<template>
    <BaseSidebarLayout>
        <template #sidebarLogo>
            <Link :href="route('admin')" class="text-md font-bold flex items-center gap-2">
                <img src="https://avatars.githubusercontent.com/u/189303411?s=200&v=4" class="size-6 rounded" />
                nicefeature.io
            </Link>
        </template>
        <template #message>
            <Message class="mx-5 mb-6">
                <div class="text-xs">
                    <p class="font-semibold uppercase">Admin View</p>
                    <Link href="/" class="hover:underline">Switch to Public Site</Link>
                </div>
            </Message>
        </template>
        <template #sidebarTopLinks>
            <SidebarLink
                :href="route('admin/feedback')"
                :active="route().current('admin/feedback')"
            >
                <StarIcon :size="16" />
                Feedback
            </SidebarLink>
            <SidebarLink
                :href="route('admin/roadmap')"
                :active="route().current('admin/roadmap')"
            >
                <MapIcon :size="16" />
                Roadmap
            </SidebarLink>
            <SidebarLink
                :href="route('admin/changelog')"
                :active="route().current('admin/changelog')"
            >
                <RocketIcon :size="16" />
                Changelog
            </SidebarLink>
        </template>
        <template #sidebarBottomLinks>
            <SidebarLink
                :href="route('logout')"
                method="post"
            >
                <LogOutIcon :size="16" />
                Logout
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
