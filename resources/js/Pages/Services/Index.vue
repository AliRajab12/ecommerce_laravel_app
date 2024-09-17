<script setup>
import MainLayout from '../../Layouts/MainLayout.vue';
import { useCategoryStore } from '@/Stores/category';


const categoryStore = useCategoryStore();
</script>
<template #services>
    <MainLayout  :categories=categoryStore.categories>
        <h1 class="container">Hello World</h1>
    </MainLayout>
</template>
