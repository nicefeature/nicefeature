<script setup lang="ts">
import { Feedback } from '@/types/feedback';

const props = defineProps<{
    feedback: Feedback[];
}>();
</script>

<template>
    <div
        v-if="feedback.length > 0"
    >
        Feedback comes here...
    </div>
    <div v-else>
        No feedback received yet
    </div>
</template>
