<script setup>

import Navbar from '../Pages/Home/Partials/Navbar.vue';
import Footer from '../Pages/Home/Partials/Footer.vue';
import { useGeneralStore } from '@/Stores/general';
const generalStore = useGeneralStore();
defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    categories: Array,
})

</script>

<template>

    <!-- Start Navbar Section -->
    <Navbar :canLogin= generalStore.canLogin :canRegister= generalStore.canLogin :categories=categories ></Navbar>
    <!-- End Navbar Section -->

    <!-- Page Content -->
    <main>
        <slot />
    </main>


    <!-- Start Footer Section -->
    <Footer/>
    <!-- End Footer Section -->

</template>


