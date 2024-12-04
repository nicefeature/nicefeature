<script setup lang="ts">
import { CheckIcon, PencilIcon, XIcon } from 'lucide-vue-next';
import { Button } from 'primevue';
import { ref } from 'vue';

withDefaults(
    defineProps<{
        value: string|null;
        placeholder?: string;
        class?: string;
        isEditable?: boolean;
        iconSize?: number;
    }>(),
    {
        isEditable: true,
        iconSize: 16,
    }
)

const isEditing = ref(false);
</script>

<template>
    <div :class="class" class="flex items-center gap-2">
        <div v-if="value">
            {{ value }}
        </div>
        <div v-else>
            {{ placeholder }}
        </div>

        <div v-if="isEditable && !isEditing">
            <Button
                severity="secondary"
                class="p-[2px] w-fit h-fit"
                v-tooltip.bottom="{ value: 'Edit', class: 'text-xs' }"
                @click="isEditing = true"
            >
                <PencilIcon :size="iconSize" class="text-primary" />
            </Button>
        </div>
        <div v-if="isEditable && isEditing" class="flex gap-1 items-center">
            <Button
                severity="secondary"
                class="p-[2px] w-fit h-fit"
                @click="isEditing = false"
            >
                <CheckIcon :size="iconSize" class="text-green-600" />
            </Button>
            <Button
                severity="secondary"
                class="p-[2px] w-fit h-fit"
                @click="isEditing = false"
            >
                <XIcon :size="iconSize" class="text-red-600" />
            </Button>
        </div>
    </div>
</template>
