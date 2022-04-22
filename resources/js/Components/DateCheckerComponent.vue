<script>
export default {
    data() {
        return {
            date: '2022-04-15',
            url: '',
            times: '',
        }
    },
    methods: {
        updatePosts: function () {
            let link =  route('api.test', this.date);

            axios.get(link).then(response => (this.times = response.data));
        },
        log: function (){
            console.log(this.date);
        },
        getStartTime: function (target){
            return target.start_time.replace(this.date+' ','');
        },
        getEndTime: function (target){
            return target.end_time.replace(this.date+' ','');
        },
        startDate: function (){
            const today = new Date();
            const date = today.getFullYear()+"-"+("0" + (today.getMonth() + 1)).slice(-2)+"-"+today.getDate();
            this.date = date;
        },
    },
    created: function () {
        this.updatePosts();
        this.startDate();
    }
}
</script>

<template>
    <div id="app">
        <button @click="log">click me</button>
        <input v-model="date" type="date" @change="updatePosts">
        <h3>
            check if the store is open on {{ date }}:
        </h3>
        <p>
            <ul>
                <li v-for="time in times">
                    title:
                    {{time.title}}<br>
                    start time:
                    {{this.getStartTime(time)}}<br>
                    end time:
                    {{this.getEndTime(time)}}
                </li>
            </ul>
        </p>
    </div>
</template>
