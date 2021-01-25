<template>
    <validation-observer 
        tag="div"
        ref="observer"
        v-slot="{ invalid }"
    >
        <v-form
            ref="form"
            name="father"
            @reset.native="resetFormData"
            @submit.prevent="validateAndProceed"
        >
            <v-card class="py-0">
                <v-card-text>
                    <v-stepper v-model="question" vertical non-linear class="elevation-0 py-0">
                        <v-stepper-step editable 
                            :complete="hasState('1') ? checkValidation('1') : false"
                            :rules="hasState('1') ? [() => checkValidation('1')] : [() => true]"
                            edit-icon="$complete"
                            step="1"
                            data-question="1"
                            class="py-1"
                        >
                            Occupation:
                        </v-stepper-step>
                        <v-stepper-content step="1" data-question="1" class="my-0 py-0">
                            <v-stepper-items>
                                <v-row class="justify-content-center">
                                    <v-col cols="6" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Father Occupation"
                                            vid="occupation"
                                        >
                                            <v-radio-group 
                                                v-model="father.occupation"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                            >
                                                <v-radio value="Unemployed" label="Unemployed"></v-radio>
                                                <v-radio value="Business" label="Business"></v-radio>
                                                <v-radio value="Service" label="Service"></v-radio>
                                                <v-radio value="Day Labour" label="Day Labour"></v-radio>
                                                <v-radio value="Rikshaw Puller" label="Rikshaw Puller"></v-radio>
                                                <v-radio value="Farmer" label="Farmer"></v-radio>
                                                <v-radio value="Others" label="Others"></v-radio>
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
                                :disabled="hasState('1') ? !checkValidation('1') : true"
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
                            Personal habbit:
                        </v-stepper-step>
                        <v-stepper-content step="2" data-question="2" class="my-0 py-0">
                            <v-stepper-items>
                                <v-row class="flex-wrap">
                                    <validation-provider
                                        rules="required"
                                        v-slot="{ errors, valid, dirty }"
                                        name="Father Habbit"
                                        vid="habbit"
                                    >
                                        <v-radio-group 
                                            v-model="father.habbit"
                                            row
                                            :error-messages="errors"
                                            :success="valid && dirty"
                                        >
                                            <v-radio value="Smoking" label="Smoking"></v-radio>
                                            <v-radio value="Alcohol" label="Alcohol"></v-radio>
                                            <v-radio value="Non-smoking" label="Non-smoking tobacco"></v-radio>
                                        </v-radio-group>
                                    </validation-provider>
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
                            :complete="hasState('3') ? checkValidation('3') : false"
                            :rules="hasState('3') ? [() => checkValidation('3')] : [() => true]"
                            edit-icon="$complete"
                            step="3"
                            data-question="3"
                            class="py-1"
                        >
                            Congenital Anomaly:
                        </v-stepper-step>
                        <v-stepper-content step="3" data-question="3" class="my-0 py-0">
                            <v-stepper-items>
                                <validation-provider
                                    rules="required"
                                    v-slot="{ errors, valid, dirty }"
                                    name="Congenital Anomaly"
                                    vid="congenital_anomaly"
                                >
                                    <v-radio-group 
                                        v-model="father.congenital_anomaly"
                                        row
                                        :error-messages="errors"
                                        :success="valid && dirty"
                                    >
                                        <v-radio :value="true" label="Yes"></v-radio>
                                        <v-radio :value="false" label="No"></v-radio>
                                    </v-radio-group>
                                </validation-provider>
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
                                :disabled="hasState('3') ? !checkValidation('3') : true"
                                small
                            >
                                Continue
                            </v-btn>                
                        </v-stepper-content>

                        <v-stepper-step editable 
                            :complete="hasState('4') && coMorbiditiesValidation"
                            :rules="hasState('4') ? [() => coMorbiditiesValidation] : [() => true]"
                            edit-icon="$complete"
                            step="4"
                            data-question="4"
                            class="py-1"
                        >
                            Co-morbidities:
                            <span v-if="hasState('4') && !coMorbiditiesValidation" >Field is required!</span>
                        </v-stepper-step>
                        <v-stepper-content step="4" data-question="4" class="my-0 py-0">
                            <v-stepper-items>
                                <v-row class="">
                                    <v-col cols="4" class="py-0">
                                        <v-checkbox
                                            v-model="father.co_morbidities"
                                            label="DM"
                                            vid="co_morbidities"
                                            value="DM"
                                            :data-optional="true"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col cols="4" class="py-0">
                                        <v-checkbox
                                            v-model="father.co_morbidities"
                                            label="HTN"
                                            value="HTN"
                                            vid="co_morbidities"
                                            :data-optional="true"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col cols="4" class="py-0">
                                        <v-checkbox
                                            v-model="father.co_morbidities"
                                            label="Asthma"
                                            value="Asthma"
                                            vid="co_morbidities"
                                            :data-optional="true"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col cols="4" class="py-0">
                                        <v-checkbox
                                            v-model="father.co_morbidities"
                                            label="TB"
                                            value="TB"
                                            vid="co_morbidities"
                                            :data-optional="true"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col cols="4" class="py-0">
                                        <v-checkbox
                                            v-model="father.co_morbidities"
                                            label="Epilepsy"
                                            value="Epilepsy"
                                            vid="co_morbidities"
                                            :data-optional="true"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col cols="4" class="py-0">
                                        <v-checkbox
                                            v-model="father.co_morbidities"
                                            label="None"
                                            value="None"
                                            vid="co_morbidities"
                                            :data-optional="true"
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
                                :disabled="hasState('4') && !coMorbiditiesValidation"
                                small
                            >
                                Continue
                            </v-btn>                
                        </v-stepper-content>

                        <v-stepper-step editable 
                            :complete="hasState('5') && medicationsValidation"
                            :rules="hasState('5') ? [() => medicationsValidation] : [() => true]"
                            edit-icon="$complete"
                            step="5"
                            data-question="5"
                            class="py-1"
                        >
                            Medications:
                            <span v-if="hasState('5') && !medicationsValidation" >Field is required!</span>
                        </v-stepper-step>
                        <v-stepper-content step="5" data-question="5" class="my-0 py-0">
                            <v-stepper-items>
                                <v-row class="flex-wrap">
                                    <v-col cols="4" class="py-0">
                                        <v-checkbox
                                            v-model="father.medications"
                                            label="Diazepam"
                                            vid="medications"
                                            value="Diazepam"
                                            :data-optional="true"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col cols="4" class="py-0">
                                        <v-checkbox
                                            v-model="father.medications"
                                            label="Phenobarbitone"
                                            value="Phenobarbitone"
                                            vid="medications"
                                            :data-optional="true"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col cols="4" class="py-0">
                                        <v-checkbox
                                            v-model="father.medications"
                                            label="Phenytoin"
                                            value="Phenytoin"
                                            vid="medications"
                                            :data-optional="true"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col cols="4" class="py-0">
                                        <v-checkbox
                                            v-model="father.medications"
                                            label="Lithium"
                                            value="Lithium"
                                            vid="medications"
                                            :data-optional="true"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    
                                    <v-col cols="4" class="py-0">
                                        <v-checkbox
                                            v-model="father.medications"
                                            label="ACEI/ABR"
                                            value="ACEI/ABR"
                                            vid="medications"
                                            :data-optional="true"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col cols="4" class="py-0">
                                        <v-checkbox
                                            v-model="father.medications"
                                            label="Ayurvedic/Unani"
                                            value="Ayurvedic/Unani"
                                            vid="medications"
                                            :data-optional="true"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col cols="4" class="py-0">
                                        <v-checkbox
                                            v-model="father.medications"
                                            label="Homeopathy"
                                            value="Homeopathy"
                                            vid="medications"
                                            :data-optional="true"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col cols="4" class="py-0">
                                        <v-checkbox
                                            v-model="father.medications"
                                            label="None"
                                            value="None"
                                            vid="medications"
                                            :data-optional="true"
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
            father: {
                // Particulars of Father
                // occupation: 'Service',
                // habbit: 'Non-smoking',
                // congenital_anomaly: true,
                // co_morbidities: ['DM'],
                // medications: ['OCP'],
                
                
                occupation: null,
                habbit: null,
                congenital_anomaly: null,
                co_morbidities: [],
                medications: [],
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
        coMorbiditiesValidation() {
            return this.father['co_morbidities'].length > 0;
        },
        medicationsValidation() {
            return this.father['medications'].length > 0;
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
            this.$refs.observer.validate() ? this.$emit('save', this.father) : false;
            this.processing = false
        },
        resetFormData() {
            this.processing = true
            this.$refs.form.reset();
            this.$emit('reset', this.father);
            this.$nextTick(() => {
                this.stepperState = [];
                this.processing = false
            })
        },
    },
}
</script>
