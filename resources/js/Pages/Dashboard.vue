<script setup lang="ts">
import SidebarLayout from '@/Layouts/SidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <SidebarLayout>
        <template #header>Dashboard</template>
        <div>Dashboard comes here...</div>
    </SidebarLayout>
</template>
