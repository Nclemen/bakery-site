<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import BaseLayout from '@/Layouts/Base.vue';
import BreezeButton from '@/Components/Button.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import BreezeCheckbox from "@/Components/Checkbox";


const form = useForm({
    name: 'text',
    description: 'text',
    price: 0,
    min: '0',
    max: '10',
});


const submit = () => {
    form.post(route('opening-hours.store'), {
        onFinish: () => form.reset('name', 'description', 'price', 'min', 'max', 'submit'),
    });
};

form.post(route('opening-hours.store'), {
    preserveScroll: false,
    onSuccess: () => form.reset('name', 'description', 'price', 'min', 'max', 'submit'),
})
</script>


<template>
    <BaseLayout>
        <Head title="Hours Management"/>
        <BreezeValidationErrors class="mb-4"/>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add new product
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div>
                    <div class="p-6 bg-white border-b border-gray-200">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg">

                                    <form @submit.prevent="form.post(route('products.store'))">
                                        <BreezeLabel for="name">name</BreezeLabel>
                                        <breeze-input v-model="form.name" id="name"  type="text" required/>
                                        <BreezeLabel for="description">description</BreezeLabel>
                                        <breeze-input v-model="form.description" id="description"  type="text"/>
                                        <BreezeLabel for="price">price</BreezeLabel>
                                        <breeze-input v-model="form.price" id="price" min="0" type="number" ></breeze-input>
                                        <BreezeLabel for="min">minimum</BreezeLabel>
                                        <breeze-input v-model="form.min" id="min" min="0" type="number" required/>
                                        <BreezeLabel for="max">max</BreezeLabel>
                                        <breeze-input v-model="form.max" id="max" min="0"  type="number" required/>
                                        <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                            submit
                                        </BreezeButton>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </BaseLayout>
</template>
