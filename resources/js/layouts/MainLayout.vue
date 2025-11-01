<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

const icons = {
    dashboard: '<path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h4a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1m0 12h4a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-2a1 1 0 0 1 1-1m10-4h4a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-6a1 1 0 0 1 1-1m0-8h4a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1"/>',
    package: '<path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m12 3l8 4.5v9L12 21l-8-4.5v-9zm0 9l8-4.5M12 12v9m0-9L4 7.5m12-2.25l-8 4.5"/>',
    arrows: '<path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 3v6m-7 9l-3 3l-3-3m3 3V3m13 3l-3-3l-3 3m3 15v-2m0-4v-2"/>',
    packages: '<g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="m7 16.5l-5-3l5-3l5 3V19l-5 3z"/><path d="M2 13.5V19l5 3m0-5.455l5-3.03m5 2.985l-5-3l5-3l5 3V19l-5 3zM12 19l5 3m0-5.5l5-3m-10 0V8L7 5l5-3l5 3v5.5M7 5.03v5.455M12 8l5-3"/></g>'
} as const;

type IconName = keyof typeof icons;

const listLinks: { label: string; href: string; icon: IconName }[] = [
    { label: 'Dashboard', href: '/', icon: 'dashboard' },
    { label: 'Items', href: '/items', icon: 'packages' },
    { label: 'Inventory', href: '/inventory', icon: 'package' },
    { label: 'Transactions', href: '/stock', icon: 'arrows' }
];

const currentYear = new Date().getUTCFullYear();
</script>



<template>
    <div class="flex h-screen">
        <div class="flex flex-col gap-5 bg-neutral-950 text-white font-bold w-64">
        <img class="w-44 mt-10 self-center" src="/images/clinicops.svg" alt="logo">
        <Link 
        v-for="link in listLinks" 
        :key="link.href" 
        :href="link.href"
        class="text-gray-400 text-lg hover:bg-neutral-800 hover:text-white transition-colors flex items-center gap-3 mx-5 p-4 rounded-2xl">
        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" class="flex-shrink-0" v-html="icons[link.icon]"></svg>
        {{ link.label }}
    </Link>
    <div class="w-full border-t-2 border-neutral-800 justify-between"></div>
    <div class="text-neutral-700 mx-5">

        <p>&#169; {{ currentYear }} ClinicOps</p>
        <p class="text-sm">Healthcare Operations Platform</p>
        
    </div>
    </div>
        
    <slot></slot>
    
    </div>
    
</template>