<template>
    <validation-observer
        tag="div"
        ref="observer"
        v-slot="{ invalid }"
    >
        <v-form
            ref="form"
            name="delivery"
            @reset.native="resetFormData"
            @submit.prevent="validateAndProceed"
        >
            <v-card class="py-0">
                <v-card-text>
                    <v-stepper v-model="question" vertical non-linear class="elevation-0 py-0">
                        <v-stepper-step editable
                            :complete="checkValidation('1')"
                            :rules="hasState('1') ? [() => checkValidation('1')] : [() => true]"
                            edit-icon="$complete"
                            step="1"
                            data-question="1"
                            class="py-1"
                        >
                            Delivery mode:
                        </v-stepper-step>
                        <v-stepper-content step="1" data-question="1" class="my-0 py-0">
                            <v-stepper-items>
                                <v-row class="justify-content-center">
                                    <v-col cols="6" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Delivery mode"
                                            vid="mode"
                                        >
                                            <v-radio-group
                                                v-model="form.mode"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                                <v-radio value="NVD" label="NVD (Normal Vaginal Delivery)"></v-radio>
                                                <v-radio value="Caesar" label="Caesarean Section Delivery"></v-radio>
                                            </v-radio-group>
                                        </validation-provider>
                                    </v-col>
                                </v-row>
                            </v-stepper-items>
                            <v-btn
                                color="primary"
                                v-on:click="question--"
                                small
                                outlined
                            >
                                Back
                            </v-btn>
                            <v-btn
                                color="primary"
                                v-on:click="question++"
                                :disabled="!checkValidation('1')"
                                small
                            >
                                Continue
                            </v-btn>
                        </v-stepper-content>

                        <v-stepper-step editable
                            :complete="checkValidation('2')"
                            :rules="hasState('2') ? [() => checkValidation('2')] : [() => true]"
                            edit-icon="$complete"
                            step="2"
                            data-question="2"
                            class="py-1"
                        >
                            Delivery type:
                        </v-stepper-step>
                        <v-stepper-content step="2" data-question="2" class="my-0 py-0">
                            <v-stepper-items>
                                <v-row class="justify-content-center">
                                    <v-col cols="6" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Delivery type"
                                            vid="type"
                                        >
                                            <v-radio-group
                                                v-model="form.type"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                                <v-radio value="Spontaneous" label="Spontaneous"></v-radio>
                                                <v-radio value="Induced" label="Induced"></v-radio>
                                            </v-radio-group>
                                        </validation-provider>
                                    </v-col>
                                </v-row>
                            </v-stepper-items>
                            <v-btn
                                color="primary"
                                v-on:click="question--"
                                small
                                outlined
                            >
                                Back
                            </v-btn>
                            <v-btn
                                color="primary"
                                v-on:click="question++"
                                :disabled="!checkValidation('2')"
                                small
                            >
                                Continue
                            </v-btn>
                        </v-stepper-content>
                        <v-stepper-step editable
                            :complete="checkValidation('3')"
                            :rules="hasState('3') ? [() => checkValidation('3')] : [() => true]"
                            edit-icon="$complete"
                            step="3"
                            data-question="3"
                            class="py-1"
                        >
                            Membrane rupture:
                        </v-stepper-step>
                        <v-stepper-content step="3" data-question="3" class="my-0 py-0">
                            <v-stepper-items>
                                <v-row class="justify-content-center">
                                    <v-col cols="6" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Delivery membranes rupture type"
                                            vid="membranes_rupture_type"
                                        >
                                            <v-radio-group
                                                v-model="form.membranes_rupture_type"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                                <v-radio value="Spontaneous" label="Spontaneous rupture of  membranes"></v-radio>
                                                <v-radio value="Artificial" label="Artificial rupture of  membranes (ARM)"></v-radio>
                                            </v-radio-group>
                                        </validation-provider>
                                    </v-col>
                                </v-row>
                            </v-stepper-items>
                            <v-btn
                                color="primary"
                                v-on:click="question--"
                                small
                                outlined
                            >
                                Back
                            </v-btn>
                            <v-btn
                                color="primary"
                                v-on:click="question++"
                                :disabled="!checkValidation('3')"
                                small
                            >
                                Continue
                            </v-btn>
                        </v-stepper-content>
                        <v-stepper-step editable
                            :complete="checkValidation('4')"
                            :rules="hasState('4') ? [() => checkValidation('4')] : [() => true]"
                            edit-icon="$complete"
                            step="4"
                            data-question="4"
                            class="py-1"
                        >
                            Time between rupture of  membranes and delivery:
                        </v-stepper-step>
                        <v-stepper-content step="4" data-question="4" class="my-0 py-0">
                            <v-stepper-items>
                                <v-row class="justify-content-center">
                                    <v-col cols="6" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Delivery delay after membranes rupture"
                                            vid="time_after_membranes_rupture"
                                        >
                                            <v-radio-group
                                                v-model="form.time_after_membranes_rupture"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                                <v-radio value="less_a_hour" label="< 1 Hour"></v-radio>
                                                <v-radio value="one_to_six_hours" label="1-6 Hours"></v-radio>
                                                <v-radio value="seven_to_twenty_four_hours" label="7-24 Hours"></v-radio>
                                                <v-radio value="more_than_twenty_four_hours" label="> 24 Hours"></v-radio>
                                            </v-radio-group>
                                        </validation-provider>
                                    </v-col>
                                </v-row>
                            </v-stepper-items>
                            <v-btn
                                color="primary"
                                v-on:click="question--"
                                small
                                outlined
                            >
                                Back
                            </v-btn>
                        </v-stepper-content>
                    </v-stepper>
                </v-card-text>
                <v-card-actions class="pl-15">
                    <v-btn
                        color="primary"
                        v-on:click="$emit('previous')"
                        small
                        outlined
                    >
                        Back
                    </v-btn>
                    <v-btn
                        small
                        type="reset"
                        color="secondary"
                        :loading="processing"
                    >
                        Reset
                    </v-btn>
                    <v-btn
                        small
                        type="submit"
                        color="primary"
                        :loading="processing"
                        :disabled="invalid"
                    >
                        Save and Proceed
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-form>
    </validation-observer>
</template>

<script>
export default {
    data() {
        return {
            drawer: false,
            processing: false,
            booted: false,
            question: '1',
            form: {
                // Particulars of Delivery
                // mode: 'NVD',
                // type: 'Spontaneous',
                // membranes_rupture_type: 'Spontaneous',
                // time_after_membranes_rupture: 'less_a_hour',

                mode: null,
                type: null,
                membranes_rupture_type: null,
                time_after_membranes_rupture: null,
            },
            stepperState: [],
        };
    },
    watch: {
        // console.log('Component mounted.')
    },
    mounted() {
        // console.log(this.$el)
    },
    computed: {
        // console.log(this.$el)
    },
    methods:{
        test() {
            console.log(event)
        },
        hasState(question) {
            let hasState = false;

            if(this.$el) {
                const target = this.$el.querySelector(`[class*='v-stepper__content'][data-question='${question}']`);
                const inputs = target.querySelectorAll('.v-input')

                for (let index = 0; index < inputs.length; index++) {
                    const element = inputs[index];
                    if(this.stepperState.includes(question)) {
                        hasState = true;
                    } else {
                        if(element.classList.contains('v-input--has-state') || (element.querySelector('input').dataset.optional && this.question == question)) {
                            this.stepperState.push(question);
                            hasState = true;
                            break;
                        }
                    }
                }
            }

            return hasState;
        },
        checkValidation(question) {
            let valid = true;

            if(this.$el) {
                const target = this.$el.querySelector(`[class*='v-stepper__content'][data-question='${question}']`);

                const inputs = target.querySelectorAll('.v-input')
                for (let index = 0; index < inputs.length; index++) {
                    const element = inputs[index];
                    if(element.querySelector('input').dataset.optional) {
                        if (element.classList.contains('error--text')){
                            valid = false;
                            break;
                        }
                        continue;
                    } else {
                        if (!element.classList.contains('v-input--has-state') || !element.classList.contains('success--text')){
                            valid = false;
                            break;
                        }
                    }
                }
            }

            return valid;
        },
        validateAndProceed() {
            this.processing = true
            this.$emit('save', this.form);
            this.processing = false
        },
        resetFormData() {
            this.processing = true
            this.$refs.form.reset();
            this.$emit('reset', this.form);
            this.$nextTick(() => {
                this.stepperState = [];
                this.processing = false
            })
        },
    },
}
</script>
