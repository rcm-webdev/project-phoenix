<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <div class="flex gap-2">
        <Link href="/">Dashboard</Link>
        <Link href="/items">Items</Link>
        <Link href="/inventory">Inventory</Link>
        <Link href="/stock">Stock</Link>
    </div>
    <slot></slot>
</template>