<script setup>
import Navbar from '../Home/Partials/Navbar.vue';
import axios from 'axios';
import { ref , onMounted} from 'vue';
import Footer from '../Home/Partials/Footer.vue';

const categories =  ref([]);


async function loadCategories(){
    await axios.get("/categories").then(response => categories.value = response.data.categories).catch(error => console.log(error));
    }
     
onMounted( () => {

         loadCategories();
      });

</script>
<template>
    <Navbar :categories= categories></Navbar>
    <h1 class="container">Hello World</h1>
    <Footer/>
</template>