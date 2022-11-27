<script setup>
import UsersModal from './UsersModal.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import { ref , onMounted} from 'vue';
import {Inertia} from '@inertiajs/inertia';

defineProps({
    users: Object
})
const show = ref(false);
const user = ref(Object);
function toggleModal(puser){
    user.value = puser;

    show.value = !show.value;
}
function destroy(id){
    if(confirm('Are you sure?')){
        Inertia.delete(route('admin.users.destroy',id));
    }
}
</script>
<template>

    <Head title="Users" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Users
            </h2>
        </template>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        User Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <div class="flex items-center">
                            Email
                        </div>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <div class="flex items-center">
                            User Type
                        </div>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        <div class="flex items-center">
                            Phone
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
                <tr v-for="user in users" v-if="users.length" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ user.firstName + " " + user.lastName }}
                    </th>
                    <td class="py-4 px-6">
                        {{ user.email }}
                    </td>
                    <td class="py-4 px-6">
                        {{ (user.userType == 1) ? "Admin" : "User" }}
                    </td>
                    <td class="py-4 px-6">
                        {{ user.phone }}
                    </td>
                    <td class="py-4 px-6 text-right">
                        <button  @click="toggleModal(user)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                    </td>
                    <td class="py-4 px-6 text-right">
                        <button @click="destroy(user.id)" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                    </td>

                </tr>

            </tbody>
        </table>

    </div>
    <UsersModal :show= show :user= user></UsersModal>
    </AuthenticatedLayout>
</template>
