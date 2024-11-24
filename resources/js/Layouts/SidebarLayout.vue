<script setup lang="ts">
import { PlusIcon } from 'lucide-vue-next';
import { Button } from 'primevue';

</script>

<template>
    <div class="p-10">
        Sidebar comes here... <br>
        <div class="flex gap-2 my-4">
            <Button label="Primary" />
            <Button label="Secondary" severity="secondary" />
            <Button label="Success" severity="success" />
            <Button label="Info" severity="info" />
            <Button label="Warn" severity="warn" />
            <Button label="Help" severity="help" />
            <Button label="Danger" severity="danger" />
            <Button label="Contrast" severity="contrast" />
        </div>
        <slot />
    </div>
</template>
