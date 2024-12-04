<script setup lang="ts">
import { CheckIcon, PencilIcon, XIcon } from 'lucide-vue-next';
import { Button, InputText } from 'primevue';
import { ref } from 'vue';

const props = withDefaults(
    defineProps<{
        value: string|null;
        callbackFn?: (value: string|null) => void;
        placeholder?: string;
        class?: string;
        isEditable?: boolean;
        iconSize?: number;
    }>(),
    {
        isEditable: true,
        iconSize: 16,
    }
);

const inputValue = ref(props.value);
function onInputSaved() {
    if (props.callbackFn) {
        props.callbackFn(inputValue.value);
    }

    isEditing.value = false;
}

const isEditing = ref(false);
</script>

<template>
    <div :class="class" class="flex items-center gap-2">
        <div v-if="!isEditing">
            <div v-if="value">
                {{ value }}
            </div>
            <div v-else>
                {{ placeholder }}
            </div>
        </div>
        <InputText
            v-else
            type="text"
            v-model="inputValue"
        />

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
                @click="onInputSaved"
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
