<script setup lang="ts">
import AdminSidebarLayout from '@/Layouts/Sidebar/AdminSidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Feedback" />

    <AdminSidebarLayout>
        <template #header>Admin Panel » Feedback</template>
        <div>
            You have no feedback boards yet, but you can <span class="underline cursor-pointer">create a first one here</span>!
        </div>
    </AdminSidebarLayout>
</template>
