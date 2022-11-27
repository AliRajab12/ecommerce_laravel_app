<script setup>
import { Head } from '@inertiajs/inertia-vue3';
import Navbar from './Home/Partials/Navbar.vue';
import axios from 'axios';
import { ref , onMounted} from 'vue'
import Banner from './Home/Partials/Banner.vue';
import FeaturedProducts from './Home/Partials/FeaturedProducts.vue';
import FeaturedCategories from './Home/Partials/FeaturedCategories.vue';
import Footer from './Home/Partials/Footer.vue';

const categories =  ref([]);
const products = ref([]);
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})
defineExpose({
  categories
})
async function loadCategories(){
    await axios.get("/categories").then(response => categories.value = response.data.categories).catch(error => console.log(error));
    }
async function loadProducts(){
    await axios.get("/fetchProducts").then(response => products.value = response.data.products).catch(error => console.log(error));
}

onMounted( () => {
         loadProducts();
         loadCategories();
      });

</script>

<template>
    <Head title="Home Page" />

    <!-- Start Navbar Section -->
    <Navbar :canLogin= canLogin :canRegister= canRegister :categories=categories :products=products></Navbar>
    <!-- End Navbar Section -->

    <!-- Start Banner Section -->
    <Banner/>
    <!-- End Banner Section -->

    <!-- Start Featured Products Section -->
    <FeaturedProducts :products= products></FeaturedProducts>
    <!-- End Featured Products Section -->

    <!-- Start Featured Cateogry Section -->
    <FeaturedCategories :categories=categories></FeaturedCategories>
    <!-- End Featured Cateogry Section -->

    <!-- Start Footer Section -->
    <Footer/>
    <!-- End Footer Section -->

</template>


