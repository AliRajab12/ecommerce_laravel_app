<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import CountCard from './Components/CountCard.vue';

defineProps({
    categoriesCount: Number,
    productsCount: Number,
    usersCount: Number,
})
</script>

<template>
    <Head title="Analytics" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Analytics
            </h2>
        </template>
        <div class='grid grid-cols-3 gap-4 mx-4 mt-4 place-items-stretch'>
            <CountCard title="Products" :numOfItems= productsCount></CountCard>
            <CountCard title="Categories" :numOfItems= categoriesCount></CountCard>
            <CountCard title="Users" :numOfItems= usersCount></CountCard>
        </div>
    </AuthenticatedLayout>
</template>
