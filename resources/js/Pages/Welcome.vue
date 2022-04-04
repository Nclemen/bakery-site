<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
import GuestLayout from '@/Layouts/Guest.vue';
</script>

<template>
    <GuestLayout>
        <Head title="Hours Management" />

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{ $page.props.store.nextOpening }}
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            Opening hours this week
                        </h2>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <ul>
                            <li v-for="(day, dayName) in $page.props.weekhours">
                                <h4 class="font-bold">{{ dayName }}</h4>
                                <ul>
                                    <li v-for="hours in day">
                                        from: {{ hours.start_time }}<br>
                                        to: {{ hours.end_time }}
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <a href="/hours-management ">manage hours</a>

            </div>
        </div>
    </GuestLayout>
</template>
