@extends('layouts.frontend', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])


@section('content')
    <v-container>
        <v-row class="justify-content-center">
            <v-col md="10" sm="12">
                {{-- <validation-observer tag="div" v-slot="{ handleSubmit, invalid, reset }"> --}}
                <v-card>
                    <v-card-title>
                        <h3 class="w-100 text-center">
                            {{ __('Epidemiological and Clinical Study of Craniofacial Clefts in Bangladesh') }}</h3>
                    </v-card-title>
                    <v-card-text>
                        <v-stepper v-model="step" class="elevation-0">
                            <v-stepper-header style="height: auto !important">
                                <v-stepper-step :complete="form.cleftBaby.complete" step="1" class="py-1" editable
                                    edit-icon="$complete">
                                    Contact Information
                                </v-stepper-step>

                                <v-divider></v-divider>
                                <v-stepper-step :complete="form.mother.complete" step="2" class="py-1" editable
                                    edit-icon="$complete">
                                    Particulars of Mother
                                </v-stepper-step>

                                <v-divider></v-divider>
                                <v-stepper-step :complete="form.pregnancy.complete" step="3" class="py-1" editable
                                    edit-icon="$complete">
                                    Particulars of Pregnancy
                                </v-stepper-step>

                                <v-divider></v-divider>
                                <v-stepper-step :complete="form.father.complete" step="4" class="py-1" editable
                                    edit-icon="$complete">
                                    Particulars of Father
                                </v-stepper-step>

                                <v-divider></v-divider>
                                <v-stepper-step :complete="form.delivery.complete" step="5" class="py-1" editable
                                    edit-icon="$complete">
                                    Delivery Details
                                </v-stepper-step>

                                <v-divider></v-divider>
                                <v-stepper-step :complete="form.newborn.complete" step="6" class="py-1" editable
                                    edit-icon="$complete">
                                    Particulars of Newborn
                                </v-stepper-step>

                                <v-divider></v-divider>
                                <v-stepper-step :complete="form.speech_development.complete" step="7" class="py-1" editable
                                    edit-icon="$complete">
                                    Speech Development
                                </v-stepper-step>

                                <v-divider></v-divider>
                                <v-stepper-step :complete="form.hearing_development.complete" step="8" class="py-1" editable
                                    edit-icon="$complete">
                                    Hearing Development
                                </v-stepper-step>

                                <v-divider></v-divider>
                                <v-stepper-step :complete="form.treatment.complete" step="9" class="py-1" editable
                                    edit-icon="$complete">
                                    Treatment Details
                                </v-stepper-step>

                                <v-divider></v-divider>
                                <v-stepper-step :complete="form.outcome.complete" step="10" class="py-1" editable
                                    edit-icon="$complete">
                                    Outcome
                                </v-stepper-step>
                            </v-stepper-header>

                            <v-stepper-items>
                                <v-stepper-content step="1" class="pa-1">
                                    <contact-details ref="contacDetails" v-on:previous="step--" v-on:save="saveAndProceed"
                                        v-on:reset="reset">
                                    </contact-details>
                                </v-stepper-content>

                                <v-stepper-content step="2" class="pa-1">
                                    <mother-details ref="motherDetails" v-on:previous="step--" v-on:save="saveAndProceed"
                                        v-on:reset="reset">
                                    </mother-details>
                                </v-stepper-content>

                                <v-stepper-content step="3" class="pa-1">
                                    <pregnancy-details ref="pregnancyDetails" v-on:previous="step--"
                                        v-on:save="saveAndProceed" v-on:reset="reset">
                                    </pregnancy-details>
                                </v-stepper-content>

                                <v-stepper-content step="4" class="pa-1">
                                    <father-details ref="fatherDetails" v-on:previous="step--" v-on:save="saveAndProceed"
                                        v-on:reset="reset">
                                    </father-details>
                                </v-stepper-content>

                                <v-stepper-content step="5" class="pa-1">
                                    <delivery-details ref="deliveryDetails" v-on:previous="step--"
                                        v-on:save="saveAndProceed" v-on:reset="reset">
                                    </delivery-details>
                                </v-stepper-content>

                                <v-stepper-content step="6" class="pa-1">
                                    <newborn-details ref="newbornDetails" v-on:previous="step--" v-on:save="saveAndProceed"
                                        v-on:reset="reset">
                                    </newborn-details>
                                </v-stepper-content>

                                <v-stepper-content step="7" class="pa-1">
                                    <speech-development-details ref="speechDevelopmentDetails" v-on:previous="step--"
                                        v-on:save="saveAndProceed" v-on:reset="reset">
                                    </speech-development-details>
                                </v-stepper-content>

                                <v-stepper-content step="8" class="pa-1">
                                    <hearing-development-details ref="hearingDevelopmentDetails" v-on:previous="step--"
                                        v-on:save="saveAndProceed" v-on:reset="reset">
                                    </hearing-development-details>
                                </v-stepper-content>

                                <v-stepper-content step="9" class="pa-1">
                                    <treatment-details ref="treatmentDetails" v-on:previous="step--"
                                        v-on:save="saveAndProceed" v-on:reset="reset">
                                    </treatment-details>
                                </v-stepper-content>

                                <v-stepper-content step="10" class="pa-1">
                                    <outcome-details ref="outcomeDetails" v-on:previous="step--" v-on:save="saveAndProceed"
                                        v-on:reset="reset">
                                    </outcome-details>
                                    {{-- <v-form ref="form" name="outcome" @reset.native="reset"
                                        @submit.prevent="validateAndProceed">
                                        <v-card class="py-0">
                                            <v-card-text>
                                                <v-stepper v-model="question" vertical non-linear class="elevation-0 py-0">
                                                    <v-stepper-step editable
                                                        :complete="hasState('1') ? checkValidation('1') : false"
                                                        :rules="hasState('1') ? [() => checkValidation('1')] : [() => true]"
                                                        edit-icon="$complete" step="1" data-question="1" class="py-1">
                                                        Outcome:
                                                    </v-stepper-step>

                                                    <v-stepper-content step="1" data-question="1" class="my-0 py-0">
                                                        <v-stepper-items>
                                                            <v-row>
                                                                <v-col md="6" class="py-0">
                                                                    a) Standard photographic views(critically assessed
                                                                    by surgeons):
                                                                </v-col>
                                                                <v-col md="6" class="py-0">
                                                                    <validation-provider rules="required"
                                                                        v-slot="{ errors, valid, dirty }"
                                                                        name="Eyelid surgery"
                                                                        vid="standard_photographic_views">
                                                                        <v-radio-group
                                                                            v-model="form.outcome.standard_photographic_views"
                                                                            row :error-messages="errors"
                                                                            :success="valid && dirty" class="my-0">
                                                                            <v-radio value="Available" label="Available">
                                                                            </v-radio>
                                                                            <v-radio value="Not Available"
                                                                                label="Not Available"></v-radio>
                                                                        </v-radio-group>
                                                                    </validation-provider>
                                                                </v-col>
                                                            </v-row>
                                                            <v-row>
                                                                <v-col md="6" class="py-0">
                                                                    b) Video speech recordings (to be evaluated by
                                                                    speech and language therapist):
                                                                </v-col>
                                                                <v-col md="6" class="py-0">
                                                                    <validation-provider rules="required"
                                                                        v-slot="{ errors, valid, dirty }"
                                                                        name="Eyelid surgery" vid="video_speech_recordings">
                                                                        <v-radio-group
                                                                            v-model="form.outcome.video_speech_recordings"
                                                                            row :error-messages="errors"
                                                                            :success="valid && dirty" class="my-0">
                                                                            <v-radio value="Available" label="Available">
                                                                            </v-radio>
                                                                            <v-radio value="Not Available"
                                                                                label="Not Available"></v-radio>
                                                                        </v-radio-group>
                                                                    </validation-provider>
                                                                </v-col>
                                                            </v-row>
                                                            <v-row>
                                                                <v-col md="6" class="py-0">
                                                                    c) Vision Test:
                                                                </v-col>
                                                                <v-col md="6" class="py-0">
                                                                    <validation-provider rules="required"
                                                                        v-slot="{ errors, valid, dirty }"
                                                                        name="Eyelid surgery" vid="vision_test">
                                                                        <v-radio-group v-model="form.outcome.vision_test"
                                                                            row :error-messages="errors"
                                                                            :success="valid && dirty" class="my-0">
                                                                            <v-radio value="Available" label="Available">
                                                                            </v-radio>
                                                                            <v-radio value="Not Available"
                                                                                label="Not Available"></v-radio>
                                                                        </v-radio-group>
                                                                    </validation-provider>
                                                                </v-col>
                                                            </v-row>
                                                            <v-row>
                                                                <v-col md="6" class="py-0">
                                                                    d) Nasal airway evaluation:
                                                                </v-col>
                                                                <v-col md="6" class="py-0">
                                                                    <validation-provider rules="required"
                                                                        v-slot="{ errors, valid, dirty }"
                                                                        name="Eyelid surgery" vid="nasal_airway_evaluation">
                                                                        <v-radio-group
                                                                            v-model="form.outcome.nasal_airway_evaluation"
                                                                            row :error-messages="errors"
                                                                            :success="valid && dirty" class="my-0">
                                                                            <v-radio value="Done" label="Done">
                                                                            </v-radio>
                                                                            <v-radio value="Not Done" label="Not Done">
                                                                            </v-radio>
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
                                                                        :counter="50" :data-optional="true">
                                                                    </input-text>
                                                                </v-col>
                                                            </v-row>
                                                            <v-row>
                                                                <v-col md="4" class="py-0">
                                                                    e) Marital Status:
                                                                </v-col>
                                                                <v-col md="8" class="py-0">
                                                                    <validation-provider rules="required"
                                                                        v-slot="{ errors, valid, dirty }"
                                                                        name="Eyelid surgery" vid="marital_status">
                                                                        <v-radio-group v-model="form.outcome.marital_status"
                                                                            row :error-messages="errors"
                                                                            :success="valid && dirty" class="my-0">
                                                                            <v-radio value="Single" label="Single">
                                                                            </v-radio>
                                                                            <v-radio value="Married" label="Married">
                                                                            </v-radio>
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
                                                                                        v-model="form.outcome.number_of_child"
                                                                                        rules="min:1|numeric"
                                                                                        label="Number of child"
                                                                                        vid="number_of_child"
                                                                                        :data-optional="true">
                                                                                    </input-text>
                                                                                </v-col>
                                                                                <v-col cols="12" class="py-0">
                                                                                    <input-text
                                                                                        v-model="form.outcome.number_of_abnormal_child"
                                                                                        rules="min:1|numeric"
                                                                                        label="Number of abnormal child"
                                                                                        vid="number_of_abnormal_child"
                                                                                        :data-optional="true">
                                                                                    </input-text>
                                                                                </v-col>
                                                                            </v-row>
                                                                        </v-col>
                                                                    </v-row>
                                                                </v-col>
                                                            </v-row>
                                                            <v-row>
                                                                <v-col md="4" class="py-0">
                                                                    g) The patient’s concerns, priorities and view of
                                                                    their outcome:
                                                                </v-col>
                                                                <v-col md="8" class="py-0">
                                                                    <v-row>
                                                                        <v-col cols="4" class="py-0">
                                                                            i)Appearance:
                                                                        </v-col>
                                                                        <v-col cols="8" class="py-0">
                                                                            <validation-provider rules="required"
                                                                                v-slot="{ errors, valid, dirty }"
                                                                                name="Eyelid surgery"
                                                                                vid="parents_review_of_appearance">
                                                                                <v-radio-group
                                                                                    v-model="form.outcome.parents_review_of_appearance"
                                                                                    row :error-messages="errors"
                                                                                    :success="valid && dirty" class="my-0">
                                                                                    <v-radio value="Satisfied"
                                                                                        label="Satisfied"></v-radio>
                                                                                    <v-radio value="Not Satisfied"
                                                                                        label="Not Satisfied"></v-radio>
                                                                                    <v-radio value="Indifferent"
                                                                                        label="Indifferent"></v-radio>
                                                                                </v-radio-group>
                                                                            </validation-provider>
                                                                        </v-col>
                                                                    </v-row>
                                                                    <v-row>
                                                                        <v-col cols="4" class="py-0">
                                                                            ii) Speech:
                                                                        </v-col>
                                                                        <v-col cols="8" class="py-0">
                                                                            <validation-provider rules="required"
                                                                                v-slot="{ errors, valid, dirty }"
                                                                                name="Eyelid surgery"
                                                                                vid="parents_review_of_speech">
                                                                                <v-radio-group
                                                                                    v-model="form.outcome.parents_review_of_speech"
                                                                                    row :error-messages="errors"
                                                                                    :success="valid && dirty" class="my-0">
                                                                                    <v-radio value="Satisfied"
                                                                                        label="Satisfied"></v-radio>
                                                                                    <v-radio value="Not Satisfied"
                                                                                        label="Not Satisfied"></v-radio>
                                                                                    <v-radio value="Indifferent"
                                                                                        label="Indifferent"></v-radio>
                                                                                </v-radio-group>
                                                                            </validation-provider>
                                                                        </v-col>
                                                                    </v-row>
                                                                    <v-row>
                                                                        <v-col cols="4" class="py-0">
                                                                            iii) Eating:
                                                                        </v-col>
                                                                        <v-col cols="8" class="py-0">
                                                                            <validation-provider rules="required"
                                                                                v-slot="{ errors, valid, dirty }"
                                                                                name="Eyelid surgery"
                                                                                vid="parents_review_of_eating">
                                                                                <v-radio-group
                                                                                    v-model="form.outcome.parents_review_of_eating"
                                                                                    row :error-messages="errors"
                                                                                    :success="valid && dirty" class="my-0">
                                                                                    <v-radio value="Satisfied"
                                                                                        label="Satisfied"></v-radio>
                                                                                    <v-radio value="Not Satisfied"
                                                                                        label="Not Satisfied"></v-radio>
                                                                                    <v-radio value="Indifferent"
                                                                                        label="Indifferent"></v-radio>
                                                                                </v-radio-group>
                                                                            </validation-provider>
                                                                        </v-col>
                                                                    </v-row>
                                                                    <v-row>
                                                                        <v-col cols="4" class="py-0">
                                                                            iv) Breathing:
                                                                        </v-col>
                                                                        <v-col cols="8" class="py-0">
                                                                            <validation-provider rules="required"
                                                                                v-slot="{ errors, valid, dirty }"
                                                                                name="Eyelid surgery"
                                                                                vid="parents_review_of_breathing">
                                                                                <v-radio-group
                                                                                    v-model="form.outcome.parents_review_of_breathing"
                                                                                    row :error-messages="errors"
                                                                                    :success="valid && dirty" class="my-0">
                                                                                    <v-radio value="Satisfied"
                                                                                        label="Satisfied"></v-radio>
                                                                                    <v-radio value="Not Satisfied"
                                                                                        label="Not Satisfied"></v-radio>
                                                                                    <v-radio value="Indifferent"
                                                                                        label="Indifferent"></v-radio>
                                                                                </v-radio-group>
                                                                            </validation-provider>
                                                                        </v-col>
                                                                    </v-row>
                                                                    <v-row>
                                                                        <v-col cols="4" class="py-0">
                                                                            v) Dental:
                                                                        </v-col>
                                                                        <v-col cols="8" class="py-0">
                                                                            <validation-provider rules="required"
                                                                                v-slot="{ errors, valid, dirty }"
                                                                                name="Eyelid surgery"
                                                                                vid="parents_review_of_dental">
                                                                                <v-radio-group
                                                                                    v-model="form.outcome.parents_review_of_dental"
                                                                                    row :error-messages="errors"
                                                                                    :success="valid && dirty" class="my-0">
                                                                                    <v-radio value="Satisfied"
                                                                                        label="Satisfied"></v-radio>
                                                                                    <v-radio value="Not Satisfied"
                                                                                        label="Not Satisfied"></v-radio>
                                                                                    <v-radio value="Indifferent"
                                                                                        label="Indifferent"></v-radio>
                                                                                </v-radio-group>
                                                                            </validation-provider>
                                                                        </v-col>
                                                                    </v-row>
                                                                </v-col>
                                                            </v-row>
                                                            <v-row>
                                                                <v-col md="3" class="py-0">
                                                                    h) Report:
                                                                </v-col>
                                                                <v-col md="9" class="py-0">
                                                                    <input-text-area v-model="form.outcome.report"
                                                                        rules="required|min:2" label="Report"
                                                                        vid="outcome.report" :counter="50"
                                                                        :data-optional="true">
                                                                    </input-text-area>
                                                                </v-col>
                                                            </v-row>
                                                            <v-row>
                                                                <v-col md="3" class="py-0">
                                                                    i) Interviewer:
                                                                </v-col>
                                                                <v-col md="9" class="py-0">
                                                                    <input-text v-model="form.outcome.interviewer"
                                                                        rules="required|min:2" label="Interviewer"
                                                                        vid="outcome.interviewer" :counter="50"
                                                                        :data-optional="true">
                                                                    </input-text>
                                                                </v-col>
                                                            </v-row>
                                                        </v-stepper-items>
                                                    </v-stepper-content>
                                                </v-stepper>
                                            </v-card-text>
                                            <v-card-actions class="pl-15">
                                                <v-btn color="primary" v-on:click="step--" small outlined>
                                                    Back
                                                </v-btn>
                                                <v-btn small type="reset" color="secondary" :loading="processing">
                                                    Reset
                                                </v-btn>
                                                <v-btn small type="submit" color="primary" :loading="processing"
                                                    :disabled="invalid">
                                                    Save and Proceed
                                                </v-btn>
                                            </v-card-actions>
                                        </v-card>
                                    </v-form> --}}
                                </v-stepper-content>
                            </v-stepper-items>
                        </v-stepper>
                    </v-card-text>
                    <v-card-actions class="text-right px-10">
                        <v-spacer />
                        {{-- <v-btn type="reset" :disabled="invalid" outlined>
                                Reset
                            </v-btn>
                            <v-btn type="submit" :loading="processing" class="primary" :disabled="invalid"
                                @click.prevent="handleSubmit(submit)">
                                Submit
                            </v-btn> --}}
                        <v-btn type="reset" outlined>
                            Reset
                        </v-btn>
                        <v-btn type="submit" :loading="processing" class="primary" @click.prevent="submit">
                            Submit
                        </v-btn>
                    </v-card-actions>
                </v-card>
                {{-- </validation-observer> --}}
            </v-col>
        </v-row>
        <v-row class="justify-content-center">
            <v-col cols="12">
                <p>
                    Dr. Mohammad Rabiul Karim Khan, Dr. Shahreen Kalam, Dr. Tanmoy Prakash Ghosh,Dr. Aminur Rashid, Dr.
                    Abida Sultana,Nargis Jahan, Dr. Md. Mahfuzul Gani, Prof. Dr. Rayhana Awwal, Prof. Dr. Md. Abul Kalam,Dr.
                    B.C. Sommerlad.
                </p>
                <h5>Introduction:</h5>
                <p>
                    Craniofacial clefts appear to be relatively common in Bangladesh. This project aims to review
                    approximately 60 patients seen over last 18 years at Sheikh HasinaNational Institute of Burn and Plastic
                    Surgery (SHNIBPS) and Dhaka Medical CollegeHospital (DMCH). These patient will be evaluated now at
                    SHNIBPS or DMCH or at their homes.
                </p>
                <p>
                    The aims are to attempt to elucidate possible causes, define the deformities (particulary looking for
                    choanal atresia), outline the treatment pathway and assess outcomes where possible.
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
                        cleftBaby: {
                            complete: false,
                            baby_name: null,
                            father_name: null,
                            mother_name: null,
                            guardian_name: null,
                            operation_age: null,
                            current_age: null,
                            address: {
                                address_type: null,
                                village: null,
                                upazilla: null,
                                district: null,
                                division: null,
                            },
                            first_contact: null,
                            alternate_contact: null,
                            // email: null,
                            consanguineous_marriage: null,
                            consanguinity: null,
                            family_cleft: null,
                            family_cleft_relatives: null,
                            folic_acid_supplementation: null,
                            maternity_diet: null,
                        },
                        delivery: {
                            complete: false,
                            mode: null,
                            type: null,
                            membranes_rupture_type: null,
                            time_after_membranes_rupture: null,
                        },
                        father: {
                            complete: false,
                            occupation: null,
                            habbit: null,
                            congenital_anomaly: null,
                            co_morbidities: [],
                            medications: [],
                        },
                        hearing_development: {
                            complete: false,
                            response_calling_by_name: null,
                            screening_by_ling_sound_s: null,
                            screening_by_ling_sound_Sh: null,
                            screening_by_ling_sound_a: null,
                            screening_by_ling_sound_i: null,
                            screening_by_ling_sound_u: null,
                            screening_by_ling_sound_m: null,

                            test_pta: null,
                            test_pta_report: null,
                            test_pta_abnormality_type: null,
                            test_abr: null,
                            test_abr_report: null,
                            test_abr_abnormality_type: null,
                            test_srt: null,
                            test_srt_report: null,
                            test_srt_abnormality_type: null,
                            test_tympanometry: null,
                            test_tympanometry_report: null,
                            test_tympanometry_abnormality_type: null,
                            test_play_audiometry: null,
                            test_play_audiometry_report: null,
                            test_play_audiometry_abnormality_type: null,
                            test_boa: null,
                            test_boa_report: null,
                            test_boa_abnormality_type: null,
                            test_oae: null,
                            test_oae_report: null,
                            test_oae_abnormality_type: null,
                        },
                        mother: {
                            complete: false,
                            occupation: null,
                            habbit: null,
                            number_of_cigerettes: null,
                            congenital_anomaly: null,
                            co_morbidities: [],
                            medications: [],
                            exposure_to_insecticides: null,
                            exposure_to_insecticides_name: null,
                            number_of_pregnancies: null,
                            ho_pregnancy_loss: null,
                            ho_pregnancy_termination: null,
                            condition_of_alive_babies: null,
                        },
                        newborn: {
                            complete: false,
                            mother_age_during_affected_pregnancy: null,
                            father_age_during_affected_pregnancy: null,
                            duration_of_pregnancy_at_delivery: null,
                            condition_at_birth: null,
                            condition_at_birth_disease: null,
                            sex_orientation: null,
                            weight: null,
                            apgar_score: null,
                            congenital_craniofacial_cleft: null,
                            tessier_classification_site: null,
                            tessier_classification_site_type_right: null,
                            tessier_classification_site_type_left: null,
                            tessier_classification_anatomical_type: null,
                            tessier_classification_microtia: null,
                            tessier_classification_microtia_type: null,
                            tessier_classification_choanal_attresia: null,
                            tessier_classification_choanal_attresia_site: null,
                            tessier_classification_choanal_attresia_anatomical_type: null,
                            other_congenital_anomalies: null,
                            other_congenital_anomalies_involved_system: [],

                            any_syndrome_suspected: null,
                            corneal_opacities_and_other_deformities: null,

                            ring_constrictions: null,
                            ring_constrictions_involving_area: [],
                            nasal_obstruction: null,
                            nasal_obstruction_treated: null,
                            palatal_abnormality: null,
                            palatal_abnormality_type: null,
                            cleft_lip: null,
                            cleft_lip_type: null,
                        },
                        pregnancy: {
                            complete: false,
                            contamination_drinking_water: null,
                            contamination_drinking_water_type: [],
                            hazardous_waste_site: null,
                            air_pollution: null,
                            air_pollution_type: [],
                            pasticides_expose: null,
                            physical_activities_during_pregnancy: null,
                            intercourse_during_pregnancy: null,
                            intercourse_during_pregnancy_time_phase: [],
                            intercourse_during_pregnancy_unusual_symptom: [],
                            intercourse_during_post_conception: null,
                            stress: null,
                            stress_type: null,
                            gestetional_diabetes_mellitus: null,
                            fever: null,
                            fever_period: null,
                            abdominal_trauma: null,
                            abdominal_trauma_period: null,
                            amniotic_membranes_rupture: null,
                            amniotic_fluid_amount: null,
                            early_amniotic_fluid_leak: null,
                        },
                        speech_development: {
                            complete: false,
                            development: null,
                            development_of_single_word: null,
                            development_of_receptive_skills: null,
                            development_of_p: null,
                            development_of_b: null,
                            development_of_m: null,
                            development_of_c: null,
                            development_of_j: null,
                            development_of_k: null,
                            development_of_g: null,
                            development_of_f: null,
                            development_of_v: null,
                            development_of_Sh: null,
                            development_of_s: null,
                            development_of_a: null,
                            development_of_i: null,
                            development_of_u: null,

                            nasality: null,
                            nasality_type: null,
                            facial_grimace: null,
                            articulation: null,

                            vpi: null,
                            vpi_nasoendoscopy: null,
                            vpi_videofluroscopy: null,

                            vpi_surgery: null,
                            vpi_surgery_type: null,
                        },
                        treatment: {
                            complete: false,
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
                        outcome: {
                            complete: false,
                            standard_photographic_views: null,
                            video_speech_recordings: null,
                            vision_test: null,
                            nasal_airway_evaluation: null,
                            educational_occupational_attainments: null,
                            marital_status: null,
                            number_of_child: null,
                            number_of_abnormal_child: null,

                            parents_review_of_appearance: null,
                            parents_review_of_breathing: null,
                            parents_review_of_dental: null,
                            parents_review_of_eating: null,
                            parents_review_of_speech: null,
                            report: null,
                            interviewer: null,
                        },
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
            methods: {
                test() {
                    console.log(event)
                },
                hasState(step) {
                    const target = document.querySelector(`[class*='v-stepper__content'][data-step='${step}']`);
                    let hasState = false
                    if (target) {
                        const inputs = target.querySelectorAll('.v-input')

                        for (let index = 0; index < inputs.length; index++) {
                            const element = inputs[index];
                            if (this.stepperState.includes(step)) {
                                hasState = true;
                            } else {
                                if (element.classList.contains('v-input--has-state') || (element.querySelector(
                                        'input').dataset.optional && this.step == step)) {
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
                        if (element.querySelector('input').dataset.optional) {
                            if (element.classList.contains('error--text')) {
                                valid = false;
                                break;
                            }
                            continue;
                        } else {
                            if (!element.classList.contains('v-input--has-state') || !element.classList.contains(
                                    'success--text')) {
                                valid = false;
                                break;
                            }
                        }
                    }

                    return valid;
                },
                saveAndProceed(formData) {
                    const clause = event.target.name;
                    this.form[clause].complete = true;
                    // this.form[clause] = Object.assign(this.form[clause], formData);
                    this.form[clause] = Object.assign(this.form[clause], formData);
                    return this.step < 10 ? this.step++ : false;
                },
                reset() {
                    const clause = event.target.name;
                    this.form[clause] = {};
                    // this.form = Object.assign(this.form, formData);
                    // this.stepperState = [];
                    return true;
                },
                submit() {
                    axios.post('/research-data/collect', this.form)
                        .then(({
                            data
                        }) => {
                            // this.$refs.contacDetails.form.reset();
                            this.$nextTick(function() {
                                this.$toastr.success(data.message, data.status);
                                // this.getMessage(client_id);
                            });
                        })
                        .catch(e => function() {
                            alert(e);
                        });
                }
            },
        });

    </script>
@endpush
