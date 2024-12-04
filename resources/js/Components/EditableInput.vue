<script setup lang="ts">
import { ref } from 'vue';

withDefaults(
    defineProps<{
        value: string|null;
        placeholder?: string;
        class?: string;
        isEditable?: boolean;
    }>(),
    {
        isEditable: true
    }
)

const isEditing = ref(false);
</script>

<template>
    <div
        v-if="value"
        :class="class"
    >
        {{ value }}
    </div>
    <div
        v-else
        :class="class"
    >
        {{ placeholder }}
    </div>
</template>
