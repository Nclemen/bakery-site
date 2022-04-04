<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import fullcalendar from "@/Components/Fullcalendar";
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';


</script>


<template>
    <BreezeAuthenticatedLayout>
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
                        <table class="table-auto">
                            <thead>
                            <tr>
                                <th>start time</th>
                                <th>end time</th>
                                <th>recurring</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="hour in hours">
                                <td>{{ hour.start_time }}</td>
                                <td>{{ hour.end_time }}</td>
                                <td>{{ hour.repeated_by }}</td>
                            </tr>
                            </tbody>
                        </table>
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
    </BreezeAuthenticatedLayout>
</template>
