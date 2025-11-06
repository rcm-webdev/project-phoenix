<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps<{
    items: {
        data: Array<{
            id: number;
            sku: string;
            name: string;
            category: string;
            unit: string;
            description?: string;
            reorder_level?: number;
        }>;
        links: Array<{
            url: string | null;
            label: string;
            active: boolean;
        }>;
        current_page: number;
        last_page: number;
    };
}>();

const activeLinks = computed(() => props.items.links.filter((link) => link.url));
const inactiveLinks = computed(() => props.items.links.filter((link) => !link.url));
</script>

<template>
    <div class="container mx-auto p-4">
        <h1 class="mb-4 text-2xl font-bold text-white">Items</h1>
        <Link href="/items/create" class="mb-4 inline-block rounded bg-blue-500 px-4 py-2 text-white">Create Item</Link>
        <table class="min-w-full border border-neutral-700 bg-neutral-800">
            <thead>
                <tr class="bg-neutral-700">
                    <th class="border border-neutral-600 px-4 py-2 text-left">SKU</th>
                    <th class="border border-neutral-600 px-4 py-2 text-left">Name</th>
                    <th class="border border-neutral-600 px-4 py-2 text-left">Category</th>
                    <th class="border border-neutral-600 px-4 py-2 text-left">Unit</th>
                    <th class="border border-neutral-600 px-4 py-2 text-left">Reorder Level</th>
                    <th class="border border-neutral-600 px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in items.data" :key="item.id" class="hover:bg-neutral-700">
                    <td class="border border-neutral-600 px-4 py-2">{{ item.sku }}</td>
                    <td class="border border-neutral-600 px-4 py-2">{{ item.name }}</td>
                    <td class="border border-neutral-600 px-4 py-2">{{ item.category }}</td>
                    <td class="border border-neutral-600 px-4 py-2">{{ item.unit }}</td>
                    <td class="border border-neutral-600 px-4 py-2">{{ item.reorder_level }}</td>
                    <td class="border border-neutral-600 px-4 py-2">
                        <Link :href="`/items/${item.id}`" class="mr-2 text-blue-400 hover:text-blue-300">View</Link>
                        <Link :href="`/items/${item.id}/edit`" class="mr-2 text-green-400 hover:text-green-300">Edit</Link>
                        <Link :href="`/items/${item.id}`" method="delete" as="button" class="text-red-400 hover:text-red-300">Delete</Link>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-4 flex justify-center">
            <div class="flex space-x-1">
                <Link
                    v-for="link in activeLinks"
                    :key="link.label"
                    :href="link.url"
                    :class="[
                        'rounded border border-neutral-600 px-3 py-2 text-sm',
                        link.active ? 'bg-blue-600 text-white' : 'bg-neutral-700 text-gray-300 hover:bg-neutral-600',
                    ]"
                >
                    <span v-html="link.label"></span>
                </Link>
                <span
                    v-for="link in inactiveLinks"
                    :key="link.label"
                    :class="[
                        'rounded border border-neutral-600 px-3 py-2 text-sm',
                        link.active ? 'bg-blue-600 text-white' : 'bg-neutral-700 text-gray-300',
                    ]"
                >
                    <span v-html="link.label"></span>
                </span>
            </div>
        </div>
    </div>
</template>
