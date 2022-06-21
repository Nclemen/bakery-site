<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import BaseLayout from '@/Layouts/Base.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import fullcalendar from "@/Components/Fullcalendar";
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';


</script>


<template>
    <BaseLayout>
        <Head title="Hours Management" />
        <BreezeValidationErrors class="mb-4" />
        <template #header>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboards
            </h2>
        </template>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{ $page.props.store.nextOpening }}
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                                <tr>
                                    <!--                                <th>day of week</th>-->
                                    <th scope="col" class="px-6 py-3">name</th>
                                    <th scope="col" class="px-6 py-3">amount</th>
                                    <th scope="col" class="px-6 py-3">total</th>
                                    <th scope="col" class="px-6 py-3">options</th>
<!--                                    <th scope="col" class="px-6 py-3">end time</th>-->
<!--                                    <th scope="col" class="px-6 py-3">recurring</th>-->
<!--                                    <th scope="col" class="px-6 py-3">repeat increment</th>-->
                                    <!--                                <th>created at</th>-->
                                    <!--                                <th>updated at</th>-->
                                    <th scope="col" class="px-6 py-3"   ></th>
                                </tr>
                                </thead>
                                <tbody v-for="item in $page.props.cart.items">
                                <tr class="bg-white border-b hover:bg-gray-100 odd:bg-white even:bg-gray-50">
                                    <!--                                <td></td>-->
                                    <td class="px-6 py-4">{{ item.Product.name }}</td>
                                    <td class="px-6 py-4">{{ item.Amount }}</td>
                                    <td class="px-6 py-4">{{ item.Total }}</td>
<!--                                    <td class="px-6 py-4">{{ product.options }}</td>-->
<!--                                    <td class="px-6 py-4">{{ hour.end_time }}</td>-->
<!--                                    <td class="px-6 py-4">{{ hour.repeated_by }}</td>-->
<!--                                    <td class="px-6 py-4">{{ hour.repeat_increment }}</td>-->
                                    <!--                                <td>{{ hour.created_at }}</td>-->
                                    <!--                                <td>{{ hour.updated_at }}</td>-->
                                    <td><a href="#">edit</a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        <Link :href="route('add-hours')" class="underline text-sm text-gray-600 hover:text-gray-900">
                            Add hours
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </BaseLayout>
</template>
