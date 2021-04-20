<template>
    <validation-observer
        tag="div"
        ref="observer"
        v-slot="{ invalid }"
    >
        <v-form
            ref="form"
            name="treatment"
            @reset.native="resetFormData"
            @submit.prevent="validateAndProceed"
        >
            <v-card class="py-0">
                <v-card-text>
                    <v-stepper v-model="question" vertical non-linear class="elevation-0 py-0">
                        <v-stepper-step editable
                            :complete="hasState('1') ? evaluationOfImagingValidation : false"
                            :rules="hasState('1') ? [() => evaluationOfImagingValidation] : [() => true]"
                            edit-icon="$complete"
                            step="1"
                            data-question="1"
                            class="py-1"
                        >
                            Evaludation of Imaging(Original):
                            <span v-if="hasState('1') && !evaluationOfImagingValidation">Please, select involved system</span>
                        </v-stepper-step>

                        <v-stepper-content step="1" data-question="1" class="my-0 py-0">
                            <v-stepper-items>
                                <v-row class="">
                                    <v-col cols="3" class="py-0">
                                        <v-checkbox
                                            v-model="form.evaluation_of_imaging"
                                            label="X-rays"
                                            value="X-rays"
                                            :data-optional="true"
                                            class="my-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col cols="3" class="py-0">
                                        <v-checkbox
                                            v-model="form.evaluation_of_imaging"
                                            value="CT"
                                            label="CT"
                                            :data-optional="true"
                                            class="my-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col cols="3" class="py-0">
                                        <v-checkbox
                                            v-model="form.evaluation_of_imaging"
                                            value="MRI"
                                            label="MRI"
                                            :data-optional="true"
                                            class="my-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col cols="3" class="py-0">
                                        <v-checkbox
                                            v-model="form.evaluation_of_imaging"
                                            value="None"
                                            label="None"
                                            :data-optional="true"
                                            class="my-0"
                                        >
                                        </v-checkbox>
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
                                :disabled="hasState('1') ? !evaluationOfImagingValidation : true"
                                small
                            >
                                Continue
                            </v-btn>
                        </v-stepper-content>

                        <v-stepper-step editable
                            :complete="hasState('2') ? checkValidation('2') : false"
                            :rules="hasState('2') ? [() => checkValidation('2')] : [() => true]"
                            edit-icon="$complete"
                            step="2"
                            data-question="2"
                            class="py-1"
                        >
                            Treatment Pathway:
                        </v-stepper-step>

                        <v-stepper-content step="2" data-question="2" class="my-0 py-0">
                            <v-stepper-items>
                                <v-row>
                                    <v-col>
                                            Descriptions and timing of operations including:
                                    </v-col>
                                </v-row>
                                <v-row class="">
                                    <v-col cols="4" class="py-0">
                                        Whether dissection was:
                                    </v-col>
                                    <v-col cols="8" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Dissection type"
                                            vid="dissection_type"
                                        >
                                            <v-radio-group
                                                v-model="form.dissection_type"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                                <v-radio value="Supra periosteal" label="Supra periosteal"></v-radio>
                                                <v-radio value="Sub periosteal" label="Sub periosteal"></v-radio>
                                            </v-radio-group>
                                        </validation-provider>
                                    </v-col>
                                    <v-col cols="4" class="py-0">
                                        Surgery to eyelids:
                                    </v-col>
                                    <v-col cols="8" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Eyelid surgery"
                                            vid="dissection_of_eyelid_surgery"
                                        >
                                            <v-radio-group
                                                v-model="form.dissection_of_eyelid_surgery"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                                <v-radio :value="true" label="Yes"></v-radio>
                                                <v-radio :value="false" label="No"></v-radio>
                                            </v-radio-group>
                                        </validation-provider>
                                    </v-col>
                                    <v-col cols="4" class="py-0">
                                        Surgery to choanal atresia:
                                    </v-col>
                                    <v-col cols="8" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Eyelid surgery"
                                            vid="dissection_of_choanal_atresia_surgery"
                                        >
                                            <v-radio-group
                                                v-model="form.dissection_of_choanal_atresia_surgery"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                                <v-radio :value="true" label="Yes"></v-radio>
                                                <v-radio :value="false" label="No"></v-radio>
                                            </v-radio-group>
                                        </validation-provider>
                                    </v-col>
                                    <v-col cols="4" class="py-0">
                                        Surgery to palate:
                                    </v-col>
                                    <v-col cols="8" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Eyelid surgery"
                                            vid="dissection_of_eyelid_surgery"
                                        >
                                            <v-radio-group
                                                v-model="form.dissection_of_palate_surgery"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                                <v-radio :value="true" label="Yes"></v-radio>
                                                <v-radio :value="false" label="No"></v-radio>
                                            </v-radio-group>
                                        </validation-provider>
                                    </v-col>
                                    <v-col cols="4" class="py-0">
                                        Surgery to alveolar cleft:
                                    </v-col>
                                    <v-col cols="8" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Eyelid surgery"
                                            vid="dissection_of_alveolar_cleft_surgery"
                                        >
                                            <v-radio-group
                                                v-model="form.dissection_of_alveolar_cleft_surgery"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                                <v-radio :value="true" label="Yes"></v-radio>
                                                <v-radio :value="false" label="No"></v-radio>
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
                                :disabled="hasState('2') ? !checkValidation('2') : true"
                                small
                            >
                                Continue
                            </v-btn>
                        </v-stepper-content>

                        <v-stepper-step editable
                            :complete="hasState('3') ? orthodonticCareValidation : false"
                            :rules="hasState('3') ? [() => orthodonticCareValidation] : [() => true]"
                            edit-icon="$complete"
                            step="3"
                            data-question="3"
                            class="py-1"
                        >
                            Orthodontic care:
                            <span v-if="hasState('3') && !orthodonticCareValidation">Please, select an option.</span>
                        </v-stepper-step>

                        <v-stepper-content step="3" data-question="3" class="my-0 py-0">
                            <v-stepper-items>
                                <v-row class="">
                                    <v-col cols="3" class="py-0">
                                        <v-checkbox
                                            v-model="form.orthodontic_care"
                                            label="X-rays"
                                            value="X-rays"
                                            :data-optional="true"
                                            class="my-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col cols="3" class="py-0">
                                        <v-checkbox
                                            v-model="form.orthodontic_care"
                                            value="CT"
                                            label="CT"
                                            :data-optional="true"
                                            class="my-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col cols="3" class="py-0">
                                        <v-checkbox
                                            v-model="form.evaluation_of_imaging"
                                            value="MRI"
                                            label="MRI"
                                            :data-optional="true"
                                            class="my-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col cols="3" class="py-0">
                                        <v-checkbox
                                            v-model="form.orthodontic_care"
                                            value="None"
                                            label="None"
                                            :data-optional="true"
                                            class="my-0"
                                        >
                                        </v-checkbox>
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
                                :disabled="hasState('3') ? !orthodonticCareValidation : true"
                                small
                            >
                                Continue
                            </v-btn>
                        </v-stepper-content>

                        <v-stepper-step editable
                            :complete="hasState('4') ? checkValidation('4') : false"
                            :rules="hasState('4') ? [() => checkValidation('4')] : [() => true]"
                            edit-icon="$complete"
                            step="4"
                            data-question="4"
                            class="py-1"
                        >
                            Any Cancer/ Malignancy developed in this Cleft child:
                        </v-stepper-step>
                        <v-stepper-content step="4" data-question="4" class="my-0 py-0">
                            <v-stepper-items>
                                <v-row class="justify-content-center">
                                    <v-col md="6" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Eyelid surgery"
                                            vid="cancer_malignancy_developed_cleft_child"
                                        >
                                            <v-radio-group
                                                v-model="form.cancer_malignancy_developed_cleft_child"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                                <v-radio :value="true" label="Yes"></v-radio>
                                                <v-radio :value="false" label="No"></v-radio>
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
                                :disabled="hasState('4') ? !checkValidation('4') : true"
                                small
                            >
                                Continue
                            </v-btn>
                        </v-stepper-content>

                        <v-stepper-step editable
                            :complete="hasState('5') ? checkValidation('5') : false"
                            :rules="hasState('5') ? [() => checkValidation('5')] : [() => true]"
                            edit-icon="$complete"
                            step="5"
                            data-question="5"
                            class="py-1"
                        >
                            Genetic Analysis:
                        </v-stepper-step>

                        <v-stepper-content step="5" data-question="5" class="my-0 py-0">
                            <v-stepper-items>
                                <v-row>
                                    <v-col md="6" class="py-0">
                                        i) Blood sample taken:
                                    </v-col>
                                    <v-col md="6" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Eyelid surgery"
                                            vid="genetic_analysis_blood_sample_taken"
                                        >
                                            <v-radio-group
                                                v-model="form.genetic_analysis_blood_sample_taken"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                                <v-radio :value="true" label="Yes"></v-radio>
                                                <v-radio :value="false" label="No"></v-radio>
                                            </v-radio-group>
                                        </validation-provider>
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col md="6" class="py-0">
                                        ii)  Buccal Mucosal sample taken:
                                    </v-col>
                                    <v-col md="6" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Eyelid surgery"
                                            vid="genetic_analysis_buccal_mucosal_sample_taken"
                                        >
                                            <v-radio-group
                                                v-model="form.genetic_analysis_buccal_mucosal_sample_taken"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                            <v-radio :value="true" label="Yes"></v-radio>
                                            <v-radio :value="false" label="No"></v-radio>
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
                // evaluation_of_imaging: ['CT'],

                // dissection_type: 'Supra periosteal',
                // dissection_of_eyelid_surgery: true,
                // dissection_of_choanal_atresia_surgery: true,
                // dissection_of_palate_surgery: true,
                // dissection_of_alveolar_cleft_surgery: true,

                // orthodontic_care: ['Appliance'],

                // cancer_malignancy_developed_cleft_child: true,

                // genetic_analysis_blood_sample_taken: true,
                // genetic_analysis_buccal_mucosal_sample_taken: true,

                evaluation_of_imaging: [],

                dissection_type: null,
                dissection_of_eyelid_surgery: null,
                dissection_of_choanal_atresia_surgery: null,
                dissection_of_palate_surgery: null,
                dissection_of_alveolar_cleft_surgery: null,

                orthodontic_care: [],

                cancer_malignancy_developed_cleft_child: null,

                genetic_analysis_blood_sample_taken: null,
                genetic_analysis_buccal_mucosal_sample_taken: null,
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
        evaluationOfImagingValidation() {
            return this.form['evaluation_of_imaging'].length > 0;
        },
        orthodonticCareValidation() {
            return this.form['orthodontic_care'].length > 0;
        },
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
