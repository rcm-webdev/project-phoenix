<script setup lang="ts">
import { Link, useForm } from '@inertiajs/vue3';

const categories = ['Medical Supplies', 'Equipment', 'Pharmaceuticals', 'Consumables', 'Laboratory', 'Administrative', 'Other'];

const form = useForm({
    sku: '',
    name: '',
    category: '',
    unit: '',
    description: '',
    reorder_level: null as number | null,
});

const submit = () => {
    form.post('/items', {
        onSuccess: () => {
            form.reset();
        },
    });
};
</script>

<template>
    <div class="container mx-auto p-4">
        <h1 class="mb-4 text-2xl font-bold text-white">Create Item</h1>
        <Link href="/items" class="mb-4 inline-block rounded bg-gray-600 px-4 py-2 text-white hover:bg-gray-500">Back to Items</Link>

        <form @submit.prevent="submit" class="mx-auto max-w-lg rounded border border-neutral-700 bg-neutral-800 p-8 shadow">
            <div class="mb-6">
                <label for="sku" class="block text-sm font-medium text-gray-300">SKU</label>
                <input
                    id="sku"
                    v-model="form.sku"
                    type="text"
                    class="mt-1 block w-full rounded-md border-neutral-600 bg-neutral-700 px-4 py-3 text-white shadow-sm focus:border-blue-400 focus:ring-blue-400"
                    required
                />
                <span v-if="form.errors.sku" class="text-sm text-red-400">{{ form.errors.sku }}</span>
            </div>

            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-300">Name</label>
                <input
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full rounded-md border-neutral-600 bg-neutral-700 px-4 py-3 text-white shadow-sm focus:border-blue-400 focus:ring-blue-400"
                    required
                />
                <span v-if="form.errors.name" class="text-sm text-red-400">{{ form.errors.name }}</span>
            </div>

            <div class="mb-6">
                <label for="category" class="block text-sm font-medium text-gray-300">Category</label>
                <select
                    id="category"
                    v-model="form.category"
                    class="mt-1 block w-full rounded-md border-neutral-600 bg-neutral-700 px-4 py-3 text-white shadow-sm focus:border-blue-400 focus:ring-blue-400"
                    required
                >
                    <option value="" class="bg-neutral-700">Select a category</option>
                    <option v-for="cat in categories" :key="cat" :value="cat" class="bg-neutral-700">{{ cat }}</option>
                </select>
                <span v-if="form.errors.category" class="text-sm text-red-400">{{ form.errors.category }}</span>
            </div>

            <div class="mb-6">
                <label for="unit" class="block text-sm font-medium text-gray-300">Unit</label>
                <input
                    id="unit"
                    v-model="form.unit"
                    type="text"
                    class="mt-1 block w-full rounded-md border-neutral-600 bg-neutral-700 px-4 py-3 text-white shadow-sm focus:border-blue-400 focus:ring-blue-400"
                    required
                />
                <span v-if="form.errors.unit" class="text-sm text-red-400">{{ form.errors.unit }}</span>
            </div>

            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-300">Description</label>
                <textarea
                    id="description"
                    v-model="form.description"
                    class="mt-1 block w-full rounded-md border-neutral-600 bg-neutral-700 px-4 py-3 text-white shadow-sm focus:border-blue-400 focus:ring-blue-400"
                    rows="3"
                ></textarea>
                <span v-if="form.errors.description" class="text-sm text-red-400">{{ form.errors.description }}</span>
            </div>

            <div class="mb-6">
                <label for="reorder_level" class="block text-sm font-medium text-gray-300">Reorder Level</label>
                <input
                    id="reorder_level"
                    v-model.number="form.reorder_level"
                    type="number"
                    min="0"
                    class="mt-1 block w-full rounded-md border-neutral-600 bg-neutral-700 px-4 py-3 text-white shadow-sm focus:border-blue-400 focus:ring-blue-400"
                />
                <span v-if="form.errors.reorder_level" class="text-sm text-red-400">{{ form.errors.reorder_level }}</span>
            </div>

            <button
                type="submit"
                :disabled="form.processing"
                class="w-full rounded-md bg-blue-600 px-4 py-3 text-white hover:bg-blue-500 disabled:opacity-50"
            >
                {{ form.processing ? 'Creating...' : 'Create Item' }}
            </button>
        </form>
    </div>
</template>
