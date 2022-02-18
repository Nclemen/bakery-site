<script>
export default {
    data() {
        return {
            open: false
        }
    }
}
</script>

<template>
    <button @click="open = true">Open Modal</button>

<!--    <div v-if="open" class="modal overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center h-modal md:h-full md:inset-0">-->
<!--        <p>Hello from the modal!</p>-->
<!--        <button @click="open = false">Close</button>-->
<!--    </div>-->
    <div v-if="open" id="authentication-modal" aria-hidden="true" class="modal overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center h-modal md:h-full md:inset-0">
        <div class="relative px-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex justify-end p-2">
                    <button @click="open = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <form @submit.prevent="form.post('api/opening-hours')">

                    <breeze-checkbox v-model="form.open"  id="open" checked="true" value="open"></breeze-checkbox>
                    <BreezeLabel for="open">open</BreezeLabel>
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
</template>

<style scoped>
.modal {
    position: fixed;
    z-index: 999;
    top: 20%;
    left: 50%;
    width: 300px;
    margin-left: -150px;

}
</style>
