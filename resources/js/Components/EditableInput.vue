<script setup lang="ts">
const props = withDefaults(
    defineProps<{
        value: string|null;
        placeholder: string;
        class?: string;
        isEditable?: boolean;
    }>(),
    {
        isEditable: true
    }
)
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
    {{ isEditable }}
</template>
