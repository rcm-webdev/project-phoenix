<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

type FlashType = 'success' | 'error' | 'warning' | 'info';

interface FlashMessage {
    type: FlashType;
    message: string;
}

const page = usePage();

const flashMessages = computed<FlashMessage[]>(() => {
    const messages: FlashMessage[] = [];
    const flash = page.props.flash as Record<string, string | undefined>;

    (['success', 'error', 'warning', 'info'] as FlashType[]).forEach((type) => {
        if (flash[type]) {
            messages.push({ type, message: flash[type] as string });
        }
    });

    return messages;
});

const getFlashClasses = (type: FlashType): string => {
    const baseClasses = 'mx-4 mt-4 rounded border px-4 py-3';
    const typeClasses: Record<FlashType, string> = {
        success: 'border-green-600 bg-green-900 text-green-300',
        error: 'border-red-600 bg-red-900 text-red-300',
        warning: 'border-yellow-600 bg-yellow-900 text-yellow-300',
        info: 'border-blue-600 bg-blue-900 text-blue-300',
    };

    return `${baseClasses} ${typeClasses[type]}`;
};
</script>

<template>
    <div v-for="flash in flashMessages" :key="flash.type" :class="getFlashClasses(flash.type)">
        {{ flash.message }}
    </div>
</template>
