<script setup lang="ts">
import { PlusIcon } from 'lucide-vue-next';
import { Button } from 'primevue';

</script>

<template>
    <div class="p-10">
        Sidebar comes here... <br>
        <Button class="text-sm font-semibold">
            <PlusIcon :size="14" />
            Create new board
        </Button>
        <slot />
    </div>
</template>
