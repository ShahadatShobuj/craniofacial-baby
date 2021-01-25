@extends('layouts.frontend')


@section('content')
<v-container>
    <v-row class="justify-content-center">
        <v-col cols="12">
            <h1 class="text-center">{{ __('Epidemiological and Clinical Study of Craniofacial Clefts in Bangladesh') }}</h1>
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
    <v-row class="justify-content-center">
        <v-col md="10" sm="12">
            <validation-observer tag="div" ref="observer" v-slot="{ handleSubmit, invalid, reset }" >
                <v-card>
                    <v-card-title class="px-10">
                        {{ __('Please, fill the registration form correctly.') }}
                    </v-card-title>
                    <v-card-text>
                        <v-stepper v-model="step" linear class="elevation-0">
                            <v-stepper-header>
                                <v-stepper-step
                                    :complete="step > 1"
                                    {{-- :rules="[() => step > 1]" --}}
                                    step="1"
                                    class="py-1"
                                    data-step="1"
                                >
                                    Name of the Baby
                                </v-stepper-step>
                                <v-divider></v-divider>

                                <v-stepper-step step="2">
                                    Ad sizes
                                </v-stepper-step>
                            </v-stepper-header>
                        
                            <v-stepper-items>
                                <v-stepper-content step="1" data-step="1" class="pa-1">
                                    <contact-form
                                        ref="contactForm"
                                        v-on:previous="step--"
                                        v-on:save="saveAndProceed('contactForm')"
                                    >
                                    </contact-form>
                                </v-stepper-content>

                                <v-stepper-content step="2" data-step="2" class="pa-1">
                                    something
                                    {{-- <contact-form
                                        ref="contactForm"
                                        v-on:previous="step--"
                                        v-on:save="saveAndProceed('contactForm')"
                                    >
                                    </contact-form> --}}
                                </v-stepper-content>

                            </v-stepper-items>
                        </v-stepper>
                    </v-card-text>
                    <v-card-actions class="text-right px-10">
                        <v-spacer />
                        <v-btn outlined @click="reset">Reset</v-btn>
                        <v-btn
                            type="submit"
                            :loading="proecssing"
                            class="primary"
                            :disabled="invalid"
                        >
                            Submit
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </validation-observer>
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
            proecssing: false,
            booted: false,
            step: '1',
            form: {
                baby_name: null,
                father_name: null,
                father_name: null,
                baby_operation_age: null,
                baby_current_age: null,
                address: {
                    type: null,
                    village: null,
                    upazilla: null,
                    district: null,
                    division: null,
                },
                first_cotact: null,
                alternate_cotact: null,
                email: null,
                consanguineous_marriage: null,
                consanguinity: null,
                family_cleft: null,
                family_cleft_relatives: null,
                folic_acid_supplementation: null,
                maternity_diet: null,

                // Particulars of Mother
                mother_occupation: null,
                // mother_habbit: {smoking: null, non_smoking: null, alcohol: null, tobacco: null, number_of_cigerettes: null, no},
                mother_habbit: [],
                mother_congenital_anomaly: null,
                mother_co_morbidities: [],
                mother_medications: [],
                mother_exposure_to_insecticides: null,
                mother_exposure_to_insecticides_name: null,
                number_of_pregnancies: null,
                ho_pregnancy_loss: null,
                ho_pregnancy_termination: null,
                condition_of_alive_babies: null,

                // Details of pregnancy including
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
                stress_type: [],
                gestetional_diabetes_mellitus: null,
                fever: null,
                fever_period: [],
                abdominal_trauma: null,
                abdominal_trauma_period: [],
                amniotic_membranes_rupture: null,
                amniotic_fluid_amount: null,
                early_amniotic_fluid_leak: null,

                // Particulars of Father
                father_occupation: null,
                // father_habbit: {smoking: null, non_smoking: null, alcohol: null, tobacco: null, number_of_cigerettes: null, no},
                father_habbit: [],
                father_congenital_anomaly: null,
                father_co_morbidities: [],
                father_medications: [],

                // Particulars of Delivery
                delivery_mode: null,
                delivery_type: null,
                delivery_membranes_rupture_type: null,
                delivery_time_after_membranes_rupture: null,

                // Particulars of newborn
                mother_age_during_affected_pregnancy: null,
                father_age_during_affected_pregnancy: null,
                duration_of_pregnancy_at_delivery: null,
                new_born_baby_condition_at_birth: null,
                new_born_baby_condition_at_birth_disease: null,
                new_born_baby_sex_orientation: null,
                new_born_baby_weight: null,
                new_born_baby_apgar_score: null,
                new_born_baby_congenital_craniofacial_cleft: null,
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

                any_sndrome_suspected: null,
                corneal_opacities_and_other_deformities: null,

                ring_constrictions: null,
                ring_constrictions_involving_area: [],
                nasal_obstruction: null,
                nasal_obstruction_treated: null,
                palatal_abnormality: null,
                palatal_abnormality_type: null,
                cleft_lip: null,
                cleft_lip_type: null,

                evaluation_of_imaging: [],

                treatment_pathway_dissection_type: null,
                treatment_pathway_eyelid_surgery: null,
                treatment_pathway_choanal_atresia_surgery: null,
                treatment_pathway_palate_surgery: null,
                treatment_pathway_alveolar_cleft_surgery: null,

                orthodontic_care: [],

                speech_language_development: null,
                speech_language_development_single_word: null,
                speech_language_development_receiptive_skills: null,
                speech_language_development_p: null,
                speech_language_development_b: null,
                speech_language_development_m: null,
                speech_language_development_c: null,
                speech_language_development_j: null,
                speech_language_development_k: null,
                speech_language_development_g: null,
                speech_language_development_f: null,
                speech_language_development_v: null,
                speech_language_development_S: null,
                speech_language_development_s: null,
                speech_language_development_a: null,
                speech_language_development_i: null,
                speech_language_development_u: null,

                speech_language_development_nasality: null,
                speech_language_development_nasality_type: null,
                speech_language_development_facial_girmace: null,
                speech_language_development_articulation: null,

                speech_language_development_vpi: null,
                speech_language_development_vpi_nasoendoscopy: null,
                speech_language_development_vpi_videofluroscopy: null,

                speech_language_development_vpi_surgery: null,
                speech_language_development_vpi_surgery_type: null,

                hearing_development_response_calling_by_name: null,
                hearing_development_response_ling_sound_s: null,
                hearing_development_response_ling_sound_S: null,
                hearing_development_response_ling_sound_a: null,
                hearing_development_response_ling_sound_i: null,
                hearing_development_response_ling_sound_u: null,
                hearing_development_response_ling_sound_m: null,

                hearing_development_test_pta: null,
                hearing_development_test_pta_report: null,
                hearing_development_test_pta_abnormality_type: null,
                hearing_development_test_abr: null,
                hearing_development_test_abr_report: null,
                hearing_development_test_abr_abnormality_type: null,
                hearing_development_test_srt: null,
                hearing_development_test_srt_report: null,
                hearing_development_test_srt_abnormality_type: null,
                hearing_development_test_tympanometry: null,
                hearing_development_test_tympanometry_report: null,
                hearing_development_test_tympanometry_abnormality_type: null,
                hearing_development_test_play_audiometry: null,
                hearing_development_test_play_audiometry_report: null,
                hearing_development_test_play_audiometry_abnormality_type: null,
                hearing_development_test_boa: null,
                hearing_development_test_boa_report: null,
                hearing_development_test_boa_abnormality_type: null,

                outcome_standard_photographic_views: null,
                outcome_video_speech_recordings: null,
                outcome_vision_test: null,
                outcome_nasal_airway_evaluation: null,
                outcome_educational_occupational_attainments: null,
                outcome_marital_status: null,
                outcome_marital_status_child: null,
                outcome_marital_status_abnormal_child: null,

                outcome_parents_concern_and_review_appearance: null,
                outcome_parents_concern_and_review_breathing: null,
                outcome_parents_concern_and_review_dental: null,
                outcome_parents_concern_and_review_eating: null,
                outcome_parents_concern_and_review_speech: null,

                any_cancer_malignancy_developed_cleft_child: null,

                genetic_analysis_blood_sample_taken: null,
                genetic_analysis_buccal_mucosal_sample_taken: null,

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
        motherHabbitValidation() {
            return this.form['mother_habbit'].length > 0;
        },
        motherCoMorbiditiesValidation() {
            return this.form['mother_co_morbidities'].length > 0;
        },
        motherMedicationsValidation() {
            return this.form['mother_medications'].length > 0;
        },
        waterContaminationTypeValidation() {
            return !this.form.contamination_drinking_water || this.form['contamination_drinking_water_type'].length > 0;
        },
        airPollutionTypeValidation() {
            return !this.form.air_pollution || this.form['air_pollution_type'].length > 0;
        },
        intercourseTimeValidation() {
            return !this.form.intercourse_during_pregnancy || this.form['intercourse_during_pregnancy_time_phase'].length > 0;
        },
        intercourseTimeValidation() {
            return !this.form.intercourse_during_pregnancy || this.form['intercourse_during_pregnancy_unusual_symptom'].length > 0;
        },
        stressTypeValidation() {
            return !this.form.stress || this.form['stress_type'].length > 0;
        },
        
        feverPeriodValidation() {
            return !this.form.fever || this.form['fever_period'].length > 0;
        },
        traumaPeriodValidation() {
            return !this.form.abdominal_trauma || this.form['abdominal_trauma_period'].length > 0;
        },

        fatherHabbitValidation() {
            return this.form['father_habbit'].length > 0;
        },
        fatherCoMorbiditiesValidation() {
            return this.form['father_co_morbidities'].length > 0;
        },
        fatherMedicationsValidation() {
            return this.form['father_medications'].length > 0;
        },

        congenitalAnomaliesInvolvedSystemValidation() {
            return !this.form.other_congenital_anomalies || this.form['other_congenital_anomalies_involved_system'].length > 0;
        },
        ringConstrictionsInvolvingAreaValidation() {
            return !this.form.ring_constrictions || this.form['ring_constrictions_involving_area'].length > 0;
        },

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
        // hasState(step) {
        //     const target = document.querySelector(`[class*='v-stepper__content'][data-step='${step}']`);
        //     let hasState = false
        //     if(target) {
        //         const inputs = target.querySelectorAll('.v-input')

        //         for (let index = 0; index < inputs.length; index++) {
        //             const element = inputs[index];
        //             if(this.stepperState.includes(step)) {
        //                 hasState = true;
        //             } else {
        //                 if(element.classList.contains('v-input--has-state') || (element.querySelector('input').dataset.optional && this.step == step)) {
        //                     this.stepperState.push(step);
        //                     hasState = true;
        //                     break;
        //                 }
        //             }
        //         }
        //     }
        //     return hasState;
        // },
        setStateAll() {
            const steps = document.querySelectorAll(`[v-stepper__step']`);
            const stepperState = [];
            for (let index = 0; index < steps.length; index++) {
                const step = steps[index].dataset('step');
                stepperState.push(step);
            }
            this.stepperState = stepperState;
        },
        // checkValidation(step) {
        //     let valid = true
        //     const target = document.querySelector(`[class*='v-stepper__content'][data-step='${step}']`);
        //     const fields = target.querySelectorAll('.v-input')

        //     for (let index = 0; index < fields.length; index++) {
        //         const element = fields[index];
        //         if(element.querySelector('input').dataset.optional) {
        //             if (element.classList.contains('error--text')){
        //                 valid = false; break;
        //             }
        //             continue;
        //         } else {
        //             if (!element.classList.contains('v-input--has-state') || !element.classList.contains('success--text')){
        //                 valid = false; break;
        //             }
        //         }
        //     }
            
        //     return valid; 
        // },

        reset() {
            return
        },
    },
});
</script>
@endpush