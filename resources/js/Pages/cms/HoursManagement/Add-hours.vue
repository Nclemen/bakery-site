<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import BreezeButton from '@/Components/Button.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import BreezeCheckbox from "@/Components/Checkbox";


const form = useForm({
    title: 'text',
    description: 'text',
    open: '1',
    start_time: '00:00',
    end_time: '00:00',
    repeated_by: '',
    repeat_increment: '',
    terms: false,
});


const submit = () => {
    form.post(route('opening-hours.store'), {
        onFinish: () => form.reset('title', 'description', 'open', 'start_time', 'end_time', 'repeated_by', 'repeat_increment', 'submit'),
    });
};

form.post(route('opening-hours.store'), {
    preserveScroll: false,
    onSuccess: () => form.reset('title', 'description', 'open', 'start_time', 'end_time', 'repeated_by', 'repeat_increment', 'submit'),
})



</script>


<template>
    <BreezeAuthenticatedLayout>
        <Head title="Hours Management" />
        <BreezeValidationErrors class="mb-4" />
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add new hours
            </h2>
        </template>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div>
                    <div class="p-6 bg-white border-b border-gray-200">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg">

                                    <form @submit.prevent="form.post(route('opening-hours.store'))">
                                        <BreezeLabel for="title">title</BreezeLabel>
                                        <breeze-input v-model="form.title" id="title"  type="text" required/>
                                        <BreezeLabel for="description">description</BreezeLabel>
                                        <breeze-input v-model="form.description" id="description"  type="text"/>
                                        <BreezeLabel for="open">open</BreezeLabel>
                                        <breeze-checkbox v-model="form.open"  id="open" checked="true" value="open"></breeze-checkbox>
                                        <BreezeLabel for="start_time">start time</BreezeLabel>
                                        <breeze-input v-model="form.start_time" id="start_time"  type="datetime-local" required/>
                                        <BreezeLabel for="end_time">end time</BreezeLabel>
                                        <breeze-input v-model="form.end_time" id="end_time"  type="datetime-local" required/>
                                        <BreezeLabel for="repeated_by">repeated by</BreezeLabel>
                                        <select v-model="form.repeated_by" id="repeated_by" required>
                                            <option value="never">never</option>
                                            <option value="hour">hourly</option>
                                            <option value="day">daily</option>
                                            <option value="week">weekly</option>
                                            <option value="month">monthly</option>
                                            <option value="year">yearly</option>
                                        </select>
                                        <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                            submit
                                        </BreezeButton>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </BreezeAuthenticatedLayout>
</template>
