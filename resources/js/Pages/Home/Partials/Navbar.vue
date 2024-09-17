<script setup>
import { ref , onMounted} from 'vue'
import CategoriesDropdown from './CategoriesDropdown.vue';
import { Link } from '@inertiajs/inertia-vue3'
import { useGeneralStore } from '@/Stores/general';

const isOpen = ref(false);
function toggleNavbar() {
            this.isOpen = !this.isOpen;
        }

const props = defineProps({
    canLogin: useGeneralStore.canLogin,
    canRegister: useGeneralStore.canLogin,
    categories: Object,
    products: Object
    });
    console.log(props.canLogin)

</script>
<style>
.active{
  font-weight: bold;
    color:#017bfebb;
    font-size: medium;
}
</style>
<template>
  <!-- <h1>{{ products.length }}</h1> -->
    <nav class="px-2 bg-white border-gray-200  sticky top-0 z-50 dark:bg-gray-900 dark:border-gray-700">
        <div class="container flex flex-wrap items-center justify-around mx-auto">
          <a href="/" class="flex items-center">
              <img src='/images/logo.png' class="h-6 mr-3 sm:h-10" alt="Logo" />
              <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Company Name</span>
          </a>
          <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 ml-3 mt-2 mb-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false" v-on:click="toggleNavbar()">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
          </button>
          <div :class="{'hidden': !isOpen, 'flex':isOpen}"   class="w-full md:block md:w-auto" id="navbar-dropdown">
            <ul class="flex flex-col p-4 mt-2  rounded-lg  md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 lg">
              <Link href="/" preserve-scroll :class="{ 'active': $page.url === '/' }" class="nav-link block py-2 pl-3 pr-4  text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</Link>
              <!-- <li class="nav-item">
                <a href="/"  class="nav-link block py-2 pl-3 pr-4  text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
              </li> -->
              <!-- <li class="nav-item"> -->

                <Link href="/products" :class="{ 'active': $page.url === '/products' }"  class="nav-link block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-400 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Products</Link>
                <!-- :href="route('products')" -->
              <!-- </li> -->
              <li class="nav-item">
                <CategoriesDropdown :categories=categories></CategoriesDropdown>
              </li>
              <Link href="/services" :class="{ 'active': $page.url === '/services' }" class="nav-link block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-400 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</Link>
              <Link href="#"  class="nav-link block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-400 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</Link>

            </ul>


          </div>
          <div :class="{'hidden': !isOpen, 'flex':isOpen}"   class="w-full md:block md:w-auto" id="navbar-dropdown">
            <ul v-if="canLogin" class="flex flex-col p-4 mt-2 items-center rounded-lg  md:flex-row  md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 lg">
                <li v-if="$page.props.auth.user" >
                    <a :href="route('dashboard')" class="nav-item text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                </li>
                <template v-else>
                    <Link :href="route('login')" class="nav-link text-sm text-gray-700 dark:text-gray-500 underline">Login</Link>
                    <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</Link>
                </template>
            </ul>
            </div>
        </div>
      </nav>


</template>

<style>
    .is-active{
        color:red;
    }
</style>
