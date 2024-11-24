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
        ? 'bg-slate-200 border-slate-200 hover:bg-slate-200 hover:border-slate-200'
        : 'bg-slate-50 border-slate-50 hover:bg-slate-200 hover:border-slate-200',
);
</script>

<template>
    <Link :href="href">
        <Button severity="secondary" :class="classes" class="text-sm font-semibold py-1 px-2 w-full justify-start gap-4">
            <slot />
        </Button>
    </Link>
</template>
