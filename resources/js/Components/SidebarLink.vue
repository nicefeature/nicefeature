<script setup lang="ts">
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';
import { Button } from 'primevue';

const props = defineProps<{
    href: string;
    active?: boolean;
}>();

const classes = computed(() =>
    props.active
        ? 'bg-zinc-200 border-zinc-200'
        : 'bg-zinc-50 border-zinc-50',
);
</script>

<template>
    <Link :href="href" as="button">
        <Button severity="secondary" :class="classes" class="text-sm font-semibold py-1 px-3 w-full justify-start gap-4">
            <slot />
        </Button>
    </Link>
</template>
