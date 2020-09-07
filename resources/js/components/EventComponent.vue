<template>
    <div class="mr-5 ml-5 mt-5">
        <div class="row">
            <notifications group="foo" />
            <add-event @submit="fetchEventCalendar"></add-event>
            <calendar-event ref="calendar"></calendar-event>
        </div>
    </div>
</template>

<script>
    import AddEvent from './AddEvent';
    import CalendarEvent from './CalendarEvent';

    export default {
        name: 'EventComponent',
        components: {
            AddEvent,
            CalendarEvent,
        },
        methods: {
            fetchEventCalendar() {
                this.$refs.calendar.fetchEvent();
            }
        }
    }
</script>