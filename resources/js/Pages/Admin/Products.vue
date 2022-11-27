<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import {Inertia} from '@inertiajs/inertia';

defineProps({
    products: Object
})

function destroy(id){
    if(confirm('Are you sure?')){
        Inertia.delete(route('admin.products.destroy',id));
    }
}
</script>

<template>
    <Head title="Products" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Products
            </h2>
        </template>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            <div class="flex items-center">
                                Title
                            </div>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <div class="flex items-center">
                                Price
                            </div>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <div class="flex items-center">
                                Category
                            </div>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <div class="flex items-center">
                                Image
                            </div>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <div class="flex items-center">
                                Rating
                            </div>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <span class="sr-only">Edit</span>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            <span class="sr-only">Delete</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="product in products" v-if="products.length" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <p>{{ product.title }}</p>
                        </th>
                        <td class="py-4 px-6">
                            {{ product.price }}
                        </td>
                        <td class="py-4 px-6">
                            {{ product.category }}
                        </td>
                        <td class="flex flex-wrap justify-center">
                            <div>
                                <div class="w-20 px-4">
                                    <img  :src="product.image" alt="image description" class="shadow rounded-full max-w-full h-auto align-middle border-none" />
                                </div>
                              </div>
                        </td>
                        <td class="py-4 px-6 text-center">
                            {{ product.rate }}
                        </td>
                        <td class="py-4 px-6 text-right">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                        <td class="py-4 px-6 text-right">
                            <Button @click="destroy(product.product_id)" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</Button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </AuthenticatedLayout>
</template>
