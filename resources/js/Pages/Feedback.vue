<script setup lang="ts">
import AuthSidebarLayout from '@/Layouts/Sidebar/AuthSidebarLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Feedback" />

    <AuthSidebarLayout>
        <template #header>Feedback</template>
        <div>Feedback on all your boards will come here...</div>
    </AuthSidebarLayout>
</template>
