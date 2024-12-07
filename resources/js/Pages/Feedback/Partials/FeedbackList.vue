<script setup lang="ts">
</script>

<template>
    <div
        class="flex flex-col gap-8"
        v-if="$page.props.feedback.length > 0"
    >
        <div
            v-for="feedback in $page.props.feedback"
        >
            <div class="font-semibold text-lg">{{ feedback.title }}</div>
            <div class="text-md">{{ feedback.description }}</div>
        </div>
    </div>
    <div v-else>
        No feedback received yet
    </div>
</template>
