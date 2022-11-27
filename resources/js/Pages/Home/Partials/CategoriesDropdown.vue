<script setup>
import { ref } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'

const isDropdownOpen = ref(false);

function toggleDropdown(){
    this.isDropdownOpen = !this.isDropdownOpen;
}
defineProps({
    categories: Object
    });

</script>

<template>
    <button id="dropdownNavbarLink" v-on:click="toggleDropdown()" data-dropdown-toggle="dropdownNavbar" class="flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-400 md:p-0  dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Categories<svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
     <div id="dropdownNavbar" :class="{'hidden': !isDropdownOpen, 'flex': isDropdownOpen}" class="z-10 absolute font-normal bg-white mt-2 divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
            <ul  class="py-1 w-full text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                <li v-for="category in categories"  v-if="categories.length">
                    <Link :href="route('products.category',{category : category})" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ category }}</Link>
                </li>
            </ul>
    </div>
</template>
