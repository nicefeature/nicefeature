<script setup lang="ts">
import { Button } from 'primevue';
</script>

<template>
    <div class="mt-6 py-6 border-t border-b border-t-gray-100">
        <h2 class="text-xl font-semibold text-primary">
            Delete Board
        </h2>
        <p class="mt-1 text-sm text-primary-600 mb-6">
            Once your board is deleted, all of its resources and data will
            be permanently deleted.
        </p>
        <Button severity="danger" class="text-sm font-semibold">
            Delete Now
        </Button>
    </div>
</template>
