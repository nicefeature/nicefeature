<script setup lang="ts">
import SidebarLayout from '@/Layouts/SidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Admin Panel" />

    <SidebarLayout>
        <template #header>Admin Panel</template>
        <div>Admin Panel comes here...</div>
    </SidebarLayout>
</template>
