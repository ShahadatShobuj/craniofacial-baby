@extends('layouts.frontend', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])


@section('content')
<v-container>
    <v-row class="justify-content-center">
        <v-col md="10" sm="12">
            <validation-observer tag="div" v-slot="{ handleSubmit, invalid, reset }" >
                <v-card>
                    <v-card-title>
                        <h3 class="w-100 text-center">{{ __('Epidemiological and Clinical Study of Craniofacial Clefts in Bangladesh') }}</h3>
                    </v-card-title>
                    <v-card-text>
                        <v-stepper v-model="step" linear class="elevation-0">
                            <v-stepper-header style="height: auto !important">
                                <v-stepper-step
                                    :complete="step > 1"
                                    step="1"
                                    class="py-1"
                                    :editable="step > 1"
                                    edit-icon="$complete"
                                >
                                    Contact Information
                                </v-stepper-step>

                                <v-divider></v-divider>
                                <v-stepper-step
                                    :complete="step > 2"
                                    step="2"
                                    class="py-1"
                                    :editable="step > 2"
                                    edit-icon="$complete"
                                >
                                    Particulars of Mother
                                </v-stepper-step>

                                <v-divider></v-divider>
                                <v-stepper-step
                                    :complete="step > 3"
                                    step="3"
                                    class="py-1"
                                    :editable="step > 3"
                                    edit-icon="$complete"
                                >
                                    Particulars of Pregnancy
                                </v-stepper-step>

                                <v-divider></v-divider>
                                <v-stepper-step
                                    :complete="step > 4"
                                    step="4"
                                    class="py-1"
                                    :editable="step > 4"
                                    edit-icon="$complete"
                                >
                                    Particulars of Father
                                </v-stepper-step>

                                <v-divider></v-divider>
                                <v-stepper-step
                                    :complete="step > 5"
                                    step="5"
                                    class="py-1"
                                    :editable="step > 5"
                                    edit-icon="$complete"
                                >
                                    Delivery Details
                                </v-stepper-step>

                                <v-divider></v-divider>
                                <v-stepper-step
                                    :complete="step > 6"
                                    step="6"
                                    class="py-1"
                                    :editable="step > 6"
                                    edit-icon="$complete"
                                >
                                    Particulars of Newborn
                                </v-stepper-step>

                                <v-divider></v-divider>
                                <v-stepper-step
                                    :complete="step > 7"
                                    step="7"
                                    class="py-1"
                                    :editable="step > 7"
                                    edit-icon="$complete"
                                >
                                    Speech Development
                                </v-stepper-step>

                                <v-divider></v-divider>
                                <v-stepper-step
                                    :complete="step > 8"
                                    step="8"
                                    class="py-1"
                                    :editable="step > 8"
                                    edit-icon="$complete"
                                >
                                    Hearing Development
                                </v-stepper-step>

                                <v-divider></v-divider>
                                <v-stepper-step
                                    :complete="step > 9"
                                    step="9"
                                    class="py-1"
                                    :editable="step > 9"
                                    edit-icon="$complete"
                                >
                                    Treatment Details
                                </v-stepper-step>

                                <v-divider></v-divider>
                                <v-stepper-step
                                    :complete="step > 10"
                                    step="10"
                                    class="py-1"
                                    :editable="step > 10"
                                    edit-icon="$complete"
                                >
                                    Outcome
                                </v-stepper-step>
                            </v-stepper-header>
                        
                            <v-stepper-items>
                                <v-stepper-content step="1" class="pa-1">
                                    <contact-details
                                        ref="contacDetails"
                                        v-on:previous="step--"
                                        v-on:save="saveAndProceed"
                                        v-on:reset="reset"
                                    >
                                    </contact-details>
                                </v-stepper-content>

                                <v-stepper-content step="2" class="pa-1">
                                    <mother-details
                                        ref="motherDetails"
                                        v-on:previous="step--"
                                        v-on:save="saveAndProceed"
                                        v-on:reset="reset"
                                    >
                                    </mother-details>
                                </v-stepper-content>

                                <v-stepper-content step="3" class="pa-1">
                                    <pregnancy-details
                                        ref="pregnancyDetails"
                                        v-on:previous="step--"
                                        v-on:save="saveAndProceed"
                                        v-on:reset="reset"
                                    >
                                    </pregnancy-details>
                                </v-stepper-content>

                                <v-stepper-content step="4" class="pa-1">
                                    <father-details
                                        ref="fatherDetails"
                                        v-on:previous="step--"
                                        v-on:save="saveAndProceed"
                                        v-on:reset="reset"
                                    >
                                    </father-details>
                                </v-stepper-content>

                                <v-stepper-content step="5" class="pa-1">
                                    <delivery-details
                                        ref="deliveryDetails"
                                        v-on:previous="step--"
                                        v-on:save="saveAndProceed"
                                        v-on:reset="reset"
                                    >
                                    </delivery-details>
                                </v-stepper-content>

                                <v-stepper-content step="6" class="pa-1">
                                    <newborn-details
                                        ref="newbornDetails"
                                        v-on:previous="step--"
                                        v-on:save="saveAndProceed"
                                        v-on:reset="reset"
                                    >
                                    </newborn-details>
                                </v-stepper-content>

                                <v-stepper-content step="7" class="pa-1">
                                    <speech-development-details
                                        ref="speechDevelopmentDetails"
                                        v-on:previous="step--"
                                        v-on:save="saveAndProceed"
                                        v-on:reset="reset"
                                    >
                                    </speech-development-details>
                                </v-stepper-content>

                                <v-stepper-content step="8" class="pa-1">
                                    <hearing-development-details
                                        ref="hearingDevelopmentDetails"
                                        v-on:previous="step--"
                                        v-on:save="saveAndProceed"
                                        v-on:reset="reset"
                                    >
                                    </hearing-development-details>
                                </v-stepper-content>

                                <v-stepper-content step="9" class="pa-1">
                                    <treatment-details
                                        ref="treatmentDetails"
                                        v-on:previous="step--"
                                        v-on:save="saveAndProceed"
                                        v-on:reset="reset"
                                    >
                                    </treatment-details>
                                </v-stepper-content>

                                <v-stepper-content step="10" class="pa-1">
                                    <v-form
                                        ref="form"
                                        name="outcome"
                                        @reset.native="reset"
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
                                                        Outcome:
                                                    </v-stepper-step>
                                                    
                                                    <v-stepper-content step="1" data-question="1" class="my-0 py-0">
                                                        <v-stepper-items>
                                                            <v-row>
                                                                <v-col md="6" class="py-0">
                                                                    a) Standard photographic views(critically assessed by surgeons):
                                                                </v-col>
                                                                <v-col md="6" class="py-0">
                                                                    <validation-provider
                                                                        rules="required"
                                                                        v-slot="{ errors, valid, dirty }"
                                                                        name="Eyelid surgery"
                                                                        vid="standard_photographic_views"
                                                                    >
                                                                        <v-radio-group 
                                                                            v-model="form.outcome.standard_photographic_views"
                                                                            row
                                                                            :error-messages="errors"
                                                                            :success="valid && dirty"
                                                                            class="my-0"
                                                                        >
                                                                            <v-radio value="Available" label="Available"></v-radio>
                                                                            <v-radio value="Not Available" label="Not Available"></v-radio>
                                                                        </v-radio-group>
                                                                    </validation-provider>
                                                                </v-col>
                                                            </v-row>
                                                            <v-row>
                                                                <v-col md="6" class="py-0">
                                                                    b) Video speech recordings (to be evaluated by speech and language therapist):
                                                                </v-col>
                                                                <v-col md="6" class="py-0">
                                                                    <validation-provider
                                                                        rules="required"
                                                                        v-slot="{ errors, valid, dirty }"
                                                                        name="Eyelid surgery"
                                                                        vid="video_speech_recordings"
                                                                    >
                                                                        <v-radio-group 
                                                                            v-model="form.outcome.video_speech_recordings"
                                                                            row
                                                                            :error-messages="errors"
                                                                            :success="valid && dirty"
                                                                            class="my-0"
                                                                        >
                                                                            <v-radio value="Available" label="Available"></v-radio>
                                                                            <v-radio value="Not Available" label="Not Available"></v-radio>
                                                                        </v-radio-group>
                                                                    </validation-provider>
                                                                </v-col>
                                                            </v-row>
                                                            <v-row>
                                                                <v-col md="6" class="py-0">
                                                                    c) Vision Test:
                                                                </v-col>
                                                                <v-col md="6" class="py-0">
                                                                    <validation-provider
                                                                        rules="required"
                                                                        v-slot="{ errors, valid, dirty }"
                                                                        name="Eyelid surgery"
                                                                        vid="vision_test"
                                                                    >
                                                                        <v-radio-group 
                                                                            v-model="form.outcome.vision_test"
                                                                            row
                                                                            :error-messages="errors"
                                                                            :success="valid && dirty"
                                                                            class="my-0"
                                                                        >
                                                                            <v-radio value="Available" label="Available"></v-radio>
                                                                            <v-radio value="Not Available" label="Not Available"></v-radio>
                                                                        </v-radio-group>
                                                                    </validation-provider>
                                                                </v-col>
                                                            </v-row>
                                                            <v-row>
                                                                <v-col md="6" class="py-0">
                                                                    d) Nasal airway evaluation:
                                                                </v-col>
                                                                <v-col md="6" class="py-0">
                                                                    <validation-provider
                                                                        rules="required"
                                                                        v-slot="{ errors, valid, dirty }"
                                                                        name="Eyelid surgery"
                                                                        vid="nasal_airway_evaluation"
                                                                    >
                                                                        <v-radio-group 
                                                                            v-model="form.outcome.nasal_airway_evaluation"
                                                                            row
                                                                            :error-messages="errors"
                                                                            :success="valid && dirty"
                                                                            class="my-0"
                                                                        >
                                                                            <v-radio value="Done" label="Done"></v-radio>
                                                                            <v-radio value="Not Done" label="Not Done"></v-radio>
                                                                        </v-radio-group>
                                                                    </validation-provider>
                                                                </v-col>
                                                            </v-row>
                                                            <v-row>
                                                                <v-col md="6" class="py-0">
                                                                    e) Educational and occupational attainments:
                                                                </v-col>
                                                                <v-col md="6" class="py-0">
                                                                    <input-text 
                                                                        v-model="form.outcome.educational_occupational_attainments"
                                                                        rules="required|min:2|max:50"
                                                                        label="Educational Occupational attainments"
                                                                        vid="educational_occupational_attainments"
                                                                        :counter="50"
                                                                        :data-optional="true"
                                                                    >
                                                                    </input-text>
                                                                </v-col>
                                                            </v-row>
                                                            <v-row>
                                                                <v-col md="4" class="py-0">
                                                                    e) Marital Status:
                                                                </v-col>
                                                                <v-col md="8" class="py-0">
                                                                    <validation-provider
                                                                        rules="required"
                                                                        v-slot="{ errors, valid, dirty }"
                                                                        name="Eyelid surgery"
                                                                        vid="marital_status"
                                                                    >
                                                                        <v-radio-group 
                                                                            v-model="form.outcome.marital_status"
                                                                            row
                                                                            :error-messages="errors"
                                                                            :success="valid && dirty"
                                                                            class="my-0"
                                                                        >
                                                                            <v-radio value="Single" label="Single"></v-radio>
                                                                            <v-radio value="Married" label="Married"></v-radio>
                                                                        </v-radio-group>
                                                                    </validation-provider>
                                                                    <v-row v-if="form.outcome.marital_status === 'Married'">
                                                                        <v-col md="4" class="py-0">
                                                                            If married:
                                                                        </v-col>
                                                                        <v-col md="8" class="py-0">
                                                                            <v-row>
                                                                                <v-col cols="12" class="py-0">
                                                                                    <input-text 
                                                                                        v-model="form.outcome.marital_status_child"
                                                                                        rules="min:1|numeric"
                                                                                        label="Number of child"
                                                                                        vid="marital_status_child"
                                                                                        :data-optional="true"
                                                                                    >
                                                                                    </input-text>
                                                                                </v-col>
                                                                                <v-col cols="12" class="py-0">
                                                                                    <input-text
                                                                                        v-model="form.outcome.marital_status_abnormal_child"
                                                                                        rules="min:1|numeric"
                                                                                        label="Number of abnormal child"
                                                                                        vid="marital_status_abnormal_child"
                                                                                        :data-optional="true"
                                                                                    >
                                                                                    </input-text>
                                                                                </v-col>
                                                                            </v-row>
                                                                        </v-col>
                                                                    </v-row>
                                                                </v-col>
                                                            </v-row>
                                                            <v-row>
                                                                <v-col md="4" class="py-0">
                                                                    g) The patient’s concerns, priorities and view of their outcome:
                                                                </v-col>
                                                                <v-col md="8" class="py-0">
                                                                    <v-row>
                                                                        <v-col cols="4" class="py-0">
                                                                            i)Appearance:
                                                                        </v-col>
                                                                        <v-col cols="8" class="py-0">
                                                                            <validation-provider
                                                                                rules="required"
                                                                                v-slot="{ errors, valid, dirty }"
                                                                                name="Eyelid surgery"
                                                                                vid="parents_review_of_appearance"
                                                                            >
                                                                                <v-radio-group 
                                                                                    v-model="form.outcome.parents_review_of_appearance"
                                                                                    row
                                                                                    :error-messages="errors"
                                                                                    :success="valid && dirty"
                                                                                    class="my-0"
                                                                                >
                                                                                    <v-radio value="Satisfied" label="Satisfied"></v-radio>
                                                                                    <v-radio value="Not Satisfied" label="Not Satisfied"></v-radio>
                                                                                    <v-radio value="Indifferent" label="Indifferent"></v-radio>
                                                                                </v-radio-group>
                                                                            </validation-provider>
                                                                        </v-col>
                                                                    </v-row>
                                                                    <v-row>
                                                                        <v-col cols="4" class="py-0">
                                                                            ii) Speech:
                                                                        </v-col>
                                                                        <v-col cols="8" class="py-0">
                                                                            <validation-provider
                                                                                rules="required"
                                                                                v-slot="{ errors, valid, dirty }"
                                                                                name="Eyelid surgery"
                                                                                vid="parents_review_of_speech"
                                                                            >
                                                                                <v-radio-group 
                                                                                    v-model="form.outcome.parents_review_of_speech"
                                                                                    row
                                                                                    :error-messages="errors"
                                                                                    :success="valid && dirty"
                                                                                    class="my-0"
                                                                                >
                                                                                    <v-radio value="Satisfied" label="Satisfied"></v-radio>
                                                                                    <v-radio value="Not Satisfied" label="Not Satisfied"></v-radio>
                                                                                    <v-radio value="Indifferent" label="Indifferent"></v-radio>
                                                                                </v-radio-group>
                                                                            </validation-provider>
                                                                        </v-col>
                                                                    </v-row>
                                                                    <v-row>
                                                                        <v-col cols="4" class="py-0">
                                                                            iii) Eating:
                                                                        </v-col>
                                                                        <v-col cols="8" class="py-0">
                                                                            <validation-provider
                                                                                rules="required"
                                                                                v-slot="{ errors, valid, dirty }"
                                                                                name="Eyelid surgery"
                                                                                vid="parents_review_of_eating"
                                                                            >
                                                                                <v-radio-group 
                                                                                    v-model="form.outcome.parents_review_of_eating"
                                                                                    row
                                                                                    :error-messages="errors"
                                                                                    :success="valid && dirty"
                                                                                    class="my-0"
                                                                                >
                                                                                    <v-radio value="Satisfied" label="Satisfied"></v-radio>
                                                                                    <v-radio value="Not Satisfied" label="Not Satisfied"></v-radio>
                                                                                    <v-radio value="Indifferent" label="Indifferent"></v-radio>
                                                                                </v-radio-group>
                                                                            </validation-provider>
                                                                        </v-col>
                                                                    </v-row>
                                                                    <v-row>
                                                                        <v-col cols="4" class="py-0">
                                                                            iv) Breathing:
                                                                        </v-col>
                                                                        <v-col cols="8" class="py-0">
                                                                            <validation-provider
                                                                                rules="required"
                                                                                v-slot="{ errors, valid, dirty }"
                                                                                name="Eyelid surgery"
                                                                                vid="parents_review_of_breathing"
                                                                            >
                                                                                <v-radio-group 
                                                                                    v-model="form.outcome.parents_review_of_breathing"
                                                                                    row
                                                                                    :error-messages="errors"
                                                                                    :success="valid && dirty"
                                                                                    class="my-0"
                                                                                >
                                                                                    <v-radio value="Satisfied" label="Satisfied"></v-radio>
                                                                                    <v-radio value="Not Satisfied" label="Not Satisfied"></v-radio>
                                                                                    <v-radio value="Indifferent" label="Indifferent"></v-radio>
                                                                                </v-radio-group>
                                                                            </validation-provider>
                                                                        </v-col>
                                                                    </v-row>
                                                                    <v-row>
                                                                        <v-col cols="4" class="py-0">
                                                                            v) Dental:
                                                                        </v-col>
                                                                        <v-col cols="8" class="py-0">
                                                                            <validation-provider
                                                                                rules="required"
                                                                                v-slot="{ errors, valid, dirty }"
                                                                                name="Eyelid surgery"
                                                                                vid="parents_review_of_dental"
                                                                            >
                                                                                <v-radio-group 
                                                                                    v-model="form.outcome.parents_review_of_dental"
                                                                                    row
                                                                                    :error-messages="errors"
                                                                                    :success="valid && dirty"
                                                                                    class="my-0"
                                                                                >
                                                                                    <v-radio value="Satisfied" label="Satisfied"></v-radio>
                                                                                    <v-radio value="Not Satisfied" label="Not Satisfied"></v-radio>
                                                                                    <v-radio value="Indifferent" label="Indifferent"></v-radio>
                                                                                </v-radio-group>
                                                                            </validation-provider>
                                                                        </v-col>
                                                                    </v-row>
                                                                </v-col>
                                                            </v-row>
                                                        </v-stepper-items>
                                                    </v-stepper-content>
                                                </v-stepper>
                                            </v-card-text>
                                            <v-card-actions class="pl-15">
                                                <v-btn
                                                    color="primary"
                                                    v-on:click="step--"
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
                                            </v-card-actions>
                                        </v-card>
                                    </v-form>
                                </v-stepper-content>
                            </v-stepper-items>
                        </v-stepper>
                    </v-card-text>
                    <v-card-actions class="text-right px-10">
                        <v-spacer />
                        <v-btn
                            type="reset" 
                            :disabled="invalid"
                            outlined
                        >
                            Reset
                        </v-btn>
                        <v-btn
                            type="submit"
                            :loading="processing"
                            class="primary"
                            :disabled="invalid"
                            @click.prevent="handleSubmit(submit)"
                        >
                            Submit
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </validation-observer>
        </v-col>
    </v-row>
    <v-row class="justify-content-center">
        <v-col cols="12">
            <p>
                Dr. Mohammad Rabiul Karim Khan, Dr. Shahreen Kalam, Dr. Tanmoy Prakash Ghosh,Dr. Aminur Rashid, Dr. Abida Sultana,Nargis Jahan, Dr. Md. Mahfuzul Gani, Prof. Dr. Rayhana Awwal, Prof. Dr. Md. Abul Kalam,Dr. B.C. Sommerlad.
            </p>
            <h5>Introduction:</h5>
            <p>
                Craniofacial clefts appear to be relatively common in Bangladesh. This project aims to review approximately 60 patients seen over last 18 years at  Sheikh HasinaNational Institute of  Burn and Plastic  Surgery (SHNIBPS)  and  Dhaka Medical CollegeHospital (DMCH). These  patient will be evaluated now at SHNIBPS or DMCH or at  their homes.
            </p>
            <p>
                The aims are to attempt to elucidate possible causes, define the deformities (particulary looking for choanal atresia), outline the treatment pathway and assess outcomes where possible.
            </p>
        </v-col>
    </v-row>
</v-container>
@endsection
@push('script')
<script>
const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    data() {
        return {
            drawer: false,
            processing: false,
            booted: false,
            question: '1',
            step: '1',
            form: {
                outcome: {
                    // standard_photographic_views: 'Available',
                    // video_speech_recordings: 'Available',
                    // vision_test: 'Available',
                    // nasal_airway_evaluation: 'Done',
                    // educational_occupational_attainments: 'Done',
                    // marital_status: 'Single',
                    // number_of_child: null,
                    // number_of_abnormal_child: null,

                    // parents_review_of_appearance: 'Satisfied',
                    // parents_review_of_breathing: 'Satisfied',
                    // parents_review_of_dental: 'Satisfied',
                    // parents_review_of_eating: 'Satisfied',
                    // parents_review_of_speech: 'Satisfied',

                    standard_photographic_views: null,
                    video_speech_recordings: null,
                    vision_test: null,
                    nasal_airway_evaluation: null,
                    educational_occupational_attainments: null,
                    marital_status: null,
                    marital_status_child: null,
                    marital_status_abnormal_child: null,

                    parents_review_of_appearance: null,
                    parents_review_of_breathing: null,
                    parents_review_of_dental: null,
                    parents_review_of_eating: null,
                    parents_review_of_speech: null,
                }
            },
            stepperState: [],
        };
    },
    watch: {
        // step(step) {
        //     const target = document.querySelector(`[class*='v-stepper__content'][data-step='${step}']`);
        //     const inputs = target.querySelectorAll('.v-input')

        //     for (let index = 0; index < inputs.length; index++) {
        //         const element = inputs[index];
        //         if (!this.stepperState.includes(step))
        //             this.stepperState.push(step); break;
        //     }
        // },

        // 'form.co_morbidities'(value) {
        //     console.log(this.step)
        // },
    },
    mounted() {
        // console.log(this.hasState(15));
    },
    computed: {
        // console.log(this.hasState(15));
    },
    methods:{
        test() {
            console.log(event)
        },
        hasState(step) {
            const target = document.querySelector(`[class*='v-stepper__content'][data-step='${step}']`);
            let hasState = false
            if(target) {
                const inputs = target.querySelectorAll('.v-input')

                for (let index = 0; index < inputs.length; index++) {
                    const element = inputs[index];
                    if(this.stepperState.includes(step)) {
                        hasState = true;
                    } else {
                        if(element.classList.contains('v-input--has-state') || (element.querySelector('input').dataset.optional && this.step == step)) {
                            this.stepperState.push(step);
                            hasState = true;
                            break;
                        }
                    }
                }
            }
            return hasState;
        },
        setStateAll() {
            const steps = document.querySelectorAll(`[v-stepper__step']`);
            const stepperState = [];
            for (let index = 0; index < steps.length; index++) {
                const step = steps[index].dataset('step');
                stepperState.push(step);
            }
            this.stepperState = stepperState;
        },
        checkValidation(step) {
            let valid = true
            const target = document.querySelector(`[class*='v-stepper__content'][data-step='${step}']`);
            const fields = target.querySelectorAll('.v-input')

            for (let index = 0; index < fields.length; index++) {
                const element = fields[index];
                if(element.querySelector('input').dataset.optional) {
                    if (element.classList.contains('error--text')){
                        valid = false; break;
                    }
                    continue;
                } else {
                    if (!element.classList.contains('v-input--has-state') || !element.classList.contains('success--text')){
                        valid = false; break;
                    }
                }
            }
            
            return valid; 
        },
        saveAndProceed(formData) {
            const clause = event.target.name;
            this.form[clause] = {};
            // this.form[clause] = Object.assign(this.form[clause], formData);
            this.form[clause] = Object.assign(this.form[clause], formData);
            console.log(this.form)
            return this.step < 10 ? this.step++ : false;
        },
        reset() {
            const clause = event.target.name;
            this.form[clause] = {};
            // this.form = Object.assign(this.form, formData);
            // this.stepperState = [];
            console.log(this.form)
            return true;
        },
        submit() {
            axios.post('/research-data/collect', this.form)
                .then(({data}) => {
                    // this.$refs.contacDetails.form.reset();
                    this.$nextTick(function () {
                        this.$toastr.success(data.message, data.status);
                        // this.getMessage(client_id);
                    });
                })
                .catch(e=> function(){
                    console.log(e)
                    alert(e);
                });
        }
    },
});
</script>
@endpush