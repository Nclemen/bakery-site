<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
})
</script>

<template>
    <BreezeAuthenticatedLayout>
        <Head title="Dashboard" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboards
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div v-if="$page.props.store.isOpen" class="p-6 bg-white border-b border-gray-200">
                        the store is open
                    </div>
                    <div v-else class="p-6 bg-white border-b border-gray-200">
                        the store is closed
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
