<script setup>

import Navbar from '../Pages/Home/Partials/Navbar.vue';
import Footer from '../Pages/Home/Partials/Footer.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    categories: Array,
})

</script>

<template>
    <!-- Start Navbar Section -->
    <Navbar :canLogin= canLogin :canRegister= canRegister :categories=categories ></Navbar>
    <!-- End Navbar Section -->

    <!-- Page Content -->
    <main>
        <slot />
    </main>


    <!-- Start Footer Section -->
    <Footer/>
    <!-- End Footer Section -->

</template>


