<script setup lang="ts">
import BaseSidebarLayout from './BaseSidebarLayout.vue';
import SidebarLink from '@/Components/SidebarLink.vue';
import SidebarLinkFeedback from '@/Components/SidebarLinkFeedback.vue';
import { Link } from '@inertiajs/vue3';
import { IdCardIcon, LogInIcon, MapIcon, RocketIcon, ShieldIcon, StarIcon } from 'lucide-vue-next';
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
                v-if="$page.props.auth.user"
                :href="route('admin.feedback')"
                class="mb-4"
            >
                <ShieldIcon :size="16" />
                Admin Panel
            </SidebarLink>
            <template v-else>
                <SidebarLink
                    :href="route('login')"
                >
                    <LogInIcon :size="16" />
                    Log in
                </SidebarLink>
                <SidebarLink
                    :href="route('register')"
                    class="mb-6"
                >
                    <IdCardIcon :size="16" />
                    Register
                </SidebarLink>
            </template>

            <SidebarLinkFeedback
                :href="route('feedback')"
                :active="route().current('feedback')"
                :isAdminPage="false"
            />
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
            <div class="text-xs text-center">
                <a href="https://nicefeature.io" class="hover:underline">
                    powered by <span class="font-semibold">nicefeature</span>
                </a>
            </div>
        </template>
        <template #header>
            <slot name="header" />
        </template>
        <template #mainContent>
            <slot />
        </template>
    </BaseSidebarLayout>
</template>
