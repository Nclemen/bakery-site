<script setup>
import BaseLayout from '@/Layouts/Base.vue';
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'


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
                                    <form :action="route('shop.addToCart')" @submit.prevent="submit">
                                        <input type="number" id="tentacles" name="amount" value="1" min="1" max="15" >
                                        <input type="hidden" name="id" id="id" :value= $page.props.product.id >
                                        <button type="submit">add</button>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
        </div>
    </BaseLayout>
</template>

<script >
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'

export default {
    setup () {
        const form = reactive({
            id: null,
            amount: null,
        })

        function submit() {
            Inertia.post('/shop/cart', form)
        }

        return { form, submit }
    },
}
</script>
