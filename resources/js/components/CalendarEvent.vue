<template>
    <div class="col-md-8">
        <vue-cal class="vuecal--blue-theme" :time="false"
         :disable-views="['years', 'year']"
         :events="events"
         >
        </vue-cal>
    </div>
</template>

<script>
import VueCal from 'vue-cal'
import 'vue-cal/dist/vuecal.css'
import { EventBus } from '../bus.js';

export default {
    components: { VueCal },
    data() {
        return {
            events: []
        }
    },
    created() {
        EventBus.$on('on-submit', data => {
        console.log(data)
            this.fetchEvent()
        });
    },
    methods: {
        async fetchEvent() {
            try{
                const response = await axios.get('/api/events')
                this.events = response.data
                console.log(response)
            } catch(e) {
                console.log(e)
            }
        }
    },
     mounted() {
        this.fetchEvent();
    },
  }
</script>

