<script setup lang="ts">
import { Head} from '@inertiajs/vue3';
const props = defineProps({message : String});
//you can pass props as an array syntax as well
//defineProprs(['message'])
</script>

<template>
     <Head title="Stock Transactions">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <div>
        <h1>Stock Transactions</h1>
        <p>{{ props.message }}</p>
    </div>
</template>