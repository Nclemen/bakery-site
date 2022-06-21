<script setup>
import BaseLayout from '@/Layouts/Base.vue';
import BreezeInput from '@/Components/Input.vue';
import BreezeLabel from '@/Components/Label.vue';
import BreezeButton from '@/Components/Button.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'

import {useForm} from "@inertiajs/inertia-vue3";
import product from "@/Pages/Product";

const form = useForm({
    amount: '',
    id: '',
});


const submit = () => {
    form.post(route('shop.addToCart'), {
        onFinish: () => form.reset('amount', 'id'),
    });
};

form.post(route('shop.addToCart'), {
    preserveScroll: false,
    onSuccess: () => form.reset('amount', 'id'),
})
</script>

<template>
    <BaseLayout>
        <BreezeValidationErrors class="mb-4" />
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200 grid grid-flow-row grid-cols-4">
                                <div class="col-span-3">
                                    <h1>{{ $page.props.product.name }}</h1>
                                    <h2>{{ $page.props.product.description }}</h2>
                                </div>
                                <div class="col-span-1">
                                    <h4>Price: {{ $page.props.product.price }}</h4>
                                    <form @submit.prevent="form.post(route('shop.addToCart'))">
                                        <input type="number" v-model="form.amount" id="amount" name="amount" min="1" max="15" >
                                        <input type="hidden" v-model="form.id" name="id" id="id" >
                                        <BreezeButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                            add
                                        </BreezeButton>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
        </div>
    </BaseLayout>
</template>
