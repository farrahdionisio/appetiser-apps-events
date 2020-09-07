<template>
    <div class="col-md-4">
        <b-form @submit.prevent="onSubmit">
            <b-form-group
                id="input-group-1"
                label="Event"
                label-for="event-name"
            >
                <b-form-input
                id="input-1"
                type="text"
                placeholder="Event Name"
                v-model="name"
                :class="{ 'is-invalid': onSubmit && $v.name.$error }"
                ></b-form-input>
                <div v-if="onSubmit && !$v.name.required" class="invalid-feedback">Event name is required</div>

            </b-form-group>

            <div class="row">
                <div class="col-md-6">
                    <b-form-group
                        id="input-group-1"
                        label="From"
                        label-for="start-date"
                    >
                        <b-form-datepicker v-model="start_date" id="start-date-datepicker" class="mb-2" :class="{ 'is-invalid': onSubmit && $v.start_date.$error }"></b-form-datepicker>
                        <div v-if="onSubmit && !$v.start_date.required" class="invalid-feedback">Start Date is required</div>
                    </b-form-group>
                </div>
                <div class="col-md-6">
                    <b-form-group
                        id="input-group-1"
                        label="To"
                        label-for="end-date"
                    >
                        <b-form-datepicker v-model="end_date" id="end-date-datepicker" class="mb-2" :class="{ 'is-invalid': onSubmit && $v.end_date.$error }"></b-form-datepicker>
                        <div v-if="onSubmit && !$v.end_date.required" class="invalid-feedback">End Date is required</div>
                    </b-form-group>
                </div>
            </div>

            <b-form-group label="Days">
                <b-form-checkbox
                    v-model="selected"
                    v-for="option in options"
                    :key="option.id"
                    :value="option.id"
                    inline
                    :class="{ 'is-invalid': onSubmit && $v.selected.$error }"
                >{{option.name}}</b-form-checkbox>
                <div v-if="onSubmit && !$v.selected.required" class="invalid-feedback">Days are required</div>
            </b-form-group>
            <b-button type="submit" variant="primary">Save</b-button>
        </b-form>
    </div>
</template>

<script>
import axios from 'axios';
import { required, minLength } from 'vuelidate/lib/validators'
import { EventBus } from '../bus.js';

export default {
    data() {
        return {
            options: [],
            selected: [],
            name: '',
            start_date: '',
            end_date: '',
        }
    },
    async created () {
        try{
            const response = await axios.get('/api/days')
            this.options = response.data
        } catch(e) {
            console.log(e)
        }
    },
    validations: {
        name: {
            required,
        },
        start_date:{
            required
        },
        end_date:{
            required
        },
        selected:{
            required
        },
    },
    methods: {
        onSubmit(e){
            this.$v.$touch()
            this.submitted = true;
            this.$v.$touch();
            if (this.$v.$invalid) {
                return;
            }
            axios.post('api/event', {
                name: this.name,
                start_date: this.start_date,
                end_date: this.end_date,
                days: this.selected
            }).then((response)=> {
                this.$notify({
                    group: 'foo',
                    title: 'Event Successfully Saved',
                });
                EventBus.$emit('on-submit', 'Successfully Saved');
            })
        }
    },
}
</script>