<template>
    <MainLayout :categories= categoryStore.categories>

    <div class="grid container grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 mt-10 mb-10  justify-items-center">
      <div v-for="product in products" track-by="id" v-if="products.length">
        <div class="max-w-sm  bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
          <Link :href="route('products.details',{id : product.id})">
              <img class="rounded-t-lg object-contain h-48 w-96" :src="product.image" alt="" />
          </Link>
          <div class="p-5">
              <Link :href="route('products.details',{id : product.id})">
                  <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white line-clamp-1">{{ product.title }}</h5>
              </Link>
              <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 line-clamp-3 ">{{ product.description }}</p>
              <Link :href="route('products.details',{id : product.id})"  class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  Read more
                  <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
              </Link>
          </div>
      </div>
  </div>
  </div>

</MainLayout>


  </template>

  <script setup>
  import MainLayout from '../../Layouts/MainLayout.vue';
  import { Link } from '@inertiajs/inertia-vue3'
  import { useCategoryStore } from '@/Stores/category';

  const categoryStore = useCategoryStore();
  defineProps({
    products: Object,
  });
  </script>
