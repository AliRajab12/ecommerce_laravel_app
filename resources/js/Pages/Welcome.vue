<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import {  onMounted} from 'vue'
import Banner from './Home/Partials/Banner.vue';
import FeaturedProducts from './Home/Partials/FeaturedProducts.vue';
import FeaturedCategories from './Home/Partials/FeaturedCategories.vue';
import MainLayout from '../Layouts/MainLayout.vue';
import { useProductStore } from '@/Stores/product';
import { useCategoryStore } from '@/Stores/category';


const productStore = useProductStore();
const categoryStore = useCategoryStore();
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})

onMounted( () => {
         productStore.loadProducts();
         categoryStore.loadCategories();
      });

</script>

<template>
    <Head title="Home Page" />
    <!-- {{ categoryStore.categories }} -->
    <!-- {{ productStore.products }} -->
    <!-- Start Navbar Section -->
    <!-- <Navbar :canLogin= canLogin :canRegister= canRegister :categories=categories :products=products></Navbar> -->
    <!-- End Navbar Section -->
    <MainLayout :canLogin= canLogin :canRegister= canRegister :categories= categoryStore.categories >
    <!-- Start Banner Section -->
    <Banner/>
    <!-- End Banner Section -->

    <!-- Start Featured Products Section -->
    <FeaturedProducts :products= productStore.products></FeaturedProducts>
    <!-- End Featured Products Section -->

    <!-- Start Featured Cateogry Section -->
    <FeaturedCategories :categories= categoryStore.categories></FeaturedCategories>
    <!-- End Featured Cateogry Section -->
    </MainLayout>
    <!-- Start Footer Section -->
    <!-- <Footer/> -->
    <!-- End Footer Section -->

</template>


