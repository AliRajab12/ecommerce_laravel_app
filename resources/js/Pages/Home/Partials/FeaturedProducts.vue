<template #feat>
    <section>
    <h2 class="text-center text-3xl font-bold whitespace-nowrap dark:text-white pt-10">Featured Products</h2>
            <div class="container px-5 py-2 mx-auto pt-10 lg:px-32">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
                    <div v-for="product in products.filter(product => product.rating.rate > (3.6))" track-by="id" v-if="products.length">
                        <!-- Card Element -->
                        <div class="max-w-sm bg-white h-full flex flex-col justify-between border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <Link :href="route('products.details',{id : product.id})">
                                <img class="rounded-t-lg mt-5 object-contain h-48 w-96 transition-all duration-300 cursor-pointer filter grayscale hover:grayscale-0" :src="product.image" alt="" />
                            </Link>
                            <div class="p-5">
                                <Link :href="route('products.details',{id : product.id})">
                                    <h6 class="mb-2 text-base font-bold tracking-tight text-gray-900 dark:text-white  line-clamp-2">{{ product.title }}</h6>
                                </Link>
                                <h6 class="mt-4 text-base font-bold tracking-tight text-blue-900 dark:text-white">Price: {{ product.price }}$</h6>
                            </div>
                        </div>
                    </div>
                </div>

              </div>
            </section>
</template>
<script setup>
import { Link } from '@inertiajs/inertia-vue3'
defineProps({
    products: Object
    });
</script>

