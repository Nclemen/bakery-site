<script setup>
import BaseLayout from '@/Layouts/Base.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';


</script>


<template>
    <BaseLayout>
        <Head title="Hours Management" />
        <BreezeValidationErrors class="mb-4" />
        <template #header>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Shop
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                                <tr>
                                    <th scope="col" class="px-6 py-3">name</th>
                                    <th scope="col" class="px-6 py-3">description</th>
                                    <th scope="col" class="px-6 py-3">price</th>
                                </tr>
                                </thead>
                                <tbody v-for="product in $page.props.products">
                                    <a :href="route('shop.product', product.id )" class="w-full">
                                        <tr class="bg-white border-b hover:bg-gray-100 odd:bg-white even:bg-gray-50">
                                            <td class="px-6 py-4">{{ product.name }}</td>
                                            <td class="px-6 py-4">{{ product.description }}</td>
                                            <td class="px-6 py-4">{{ product.price }}</td>
                                        </tr>
                                    </a>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BaseLayout>
</template>
