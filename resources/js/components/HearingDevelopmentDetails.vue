<template>
    <validation-observer 
        tag="div"
        ref="observer"
        v-slot="{ invalid }"
    >
        <v-form
            ref="form"
            name="hearing_development"
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
                            Hearing Development:
                        </v-stepper-step>

                        <v-stepper-items>
                            <v-stepper-content step="1" data-question="1" class="my-0 py-0">
                                <v-row>
                                    <v-col md="4" class="py-0">
                                        Response By Calling Name
                                    </v-col>
                                    <v-col md="8" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Response By Calling Name"
                                            vid="response_calling_by_name"
                                        >
                                            <v-radio-group 
                                                v-model="form.response_calling_by_name"
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
                                    <v-col md="4" class="py-0">Screening of ling sound (Response):</v-col>
                                    <v-col md="8" class="py-0">
                                        <v-row>
                                            <v-col cols="3" class="py-0">
                                                (আ) |a|: 
                                            </v-col>
                                            <v-col cols="9" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Eyelid surgery"
                                                    vid="screening_by_ling_sound_a"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.screening_by_ling_sound_a"
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
                                            <v-col cols="3" class="py-0">
                                                (ই) |i|: 
                                            </v-col>
                                            <v-col cols="9" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Eyelid surgery"
                                                    vid="screening_by_ling_sound_i"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.screening_by_ling_sound_i"
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
                                            <v-col cols="3" class="py-0">
                                                (উ) |u|: 
                                            </v-col>
                                            <v-col cols="9" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Eyelid surgery"
                                                    vid="screening_by_ling_sound_u"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.screening_by_ling_sound_u"
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
                                            <v-col cols="3" class="py-0">
                                                (ম) |m|: 
                                            </v-col>
                                            <v-col cols="9" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Eyelid surgery"
                                                    vid="screening_by_ling_sound_m"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.screening_by_ling_sound_m"
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
                                            <v-col cols="3" class="py-0">
                                                (স) |v|: 
                                            </v-col>
                                            <v-col cols="9" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Eyelid surgery"
                                                    vid="screening_by_ling_sound_s"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.screening_by_ling_sound_s"
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
                                            <v-col cols="3" class="py-0">
                                                (শ) |S|: 
                                            </v-col>
                                            <v-col cols="9" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Eyelid surgery"
                                                    vid="screening_by_ling_sound_Sh"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.screening_by_ling_sound_Sh"
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
                                    </v-col>
                                    <v-col md="2" class="py-0">
                                        Test:
                                    </v-col>
                                    <v-col md="10" class="py-0">
                                        <v-row>
                                            <v-col md="4" class="py-0">
                                                PTA (Pure Tone Audiometry):
                                            </v-col>
                                            <v-col md="8" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Response By Calling Name"
                                                    vid="test_pta"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.test_pta"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                        class="my-0"
                                                    >
                                                        <v-radio :value="true" label="Yes"></v-radio>
                                                        <v-radio :value="false" label="No"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                                <v-row v-if="form.test_pta">
                                                    <v-col class="py-0">
                                                        <validation-provider
                                                            rules="required"
                                                            v-slot="{ errors, valid, dirty }"
                                                            name="Response By Calling Name"
                                                            vid="test_pta_report"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.test_pta_report"
                                                                row
                                                                :error-messages="errors"
                                                                :success="valid && dirty"
                                                                class="my-0"
                                                            >
                                                                <v-radio value="Normal" label="Normal"></v-radio>
                                                                <v-radio value="Abnormal" label="Abnormal"></v-radio>
                                                            </v-radio-group>
                                                        </validation-provider>
                                                    </v-col>
                                                    <v-col class="py-0" v-if="form.test_pta_report === 'Abnormal'">
                                                        <input-text 
                                                            v-model="form.test_pta_abnormality_type"
                                                            rules="required|min:2|max:50"
                                                            label="Abnormality type"
                                                            vid="test_pta_abnormality_type"
                                                            :counter="50"
                                                        >
                                                        </input-text>
                                                    </v-col>
                                                </v-row>
                                            </v-col>
                                        </v-row>
                                        <v-row>
                                            <v-col md="4" class="py-0">
                                                ABR (Audiotory Brainstem Response):
                                            </v-col>
                                            <v-col md="8" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Response By Calling Name"
                                                    vid="test_pta"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.test_abr"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                        class="my-0"
                                                    >
                                                        <v-radio :value="true" label="Yes"></v-radio>
                                                        <v-radio :value="false" label="No"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                                <v-row v-if="form.test_abr">
                                                    <v-col class="py-0">
                                                        <validation-provider
                                                            rules="required"
                                                            v-slot="{ errors, valid, dirty }"
                                                            name="Response By Calling Name"
                                                            vid="test_abr_report"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.test_abr_report"
                                                                row
                                                                :error-messages="errors"
                                                                :success="valid && dirty"
                                                                class="my-0"
                                                            >
                                                                <v-radio value="Normal" label="Normal"></v-radio>
                                                                <v-radio value="Abnormal" label="Abnormal"></v-radio>
                                                            </v-radio-group>
                                                        </validation-provider>
                                                    </v-col>
                                                    <v-col class="py-0" v-if="form.test_abr_report === 'Abnormal'">
                                                        <input-text 
                                                            v-model="form.test_abr_abnormality_type"
                                                            rules="required|min:2|max:50"
                                                            label="Abnormality type"
                                                            vid="test_abr_abnormality_type"
                                                            :counter="50"
                                                        >
                                                        </input-text>
                                                    </v-col>
                                                </v-row>
                                            </v-col>
                                        </v-row>
                                        <v-row>
                                            <v-col md="4" class="py-0">
                                                SRT ( Stapedial Reflexes Threshold):
                                            </v-col>
                                            <v-col md="8" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Response By Calling Name"
                                                    vid="test_srt"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.test_srt"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                        class="my-0"
                                                    >
                                                        <v-radio :value="true" label="Yes"></v-radio>
                                                        <v-radio :value="false" label="No"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                                <v-row v-if="form.test_srt">
                                                    <v-col class="py-0">
                                                        <validation-provider
                                                            rules="required"
                                                            v-slot="{ errors, valid, dirty }"
                                                            name="Response By Calling Name"
                                                            vid="test_srt_report"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.test_srt_report"
                                                                row
                                                                :error-messages="errors"
                                                                :success="valid && dirty"
                                                                class="my-0"
                                                            >
                                                                <v-radio value="Normal" label="Normal"></v-radio>
                                                                <v-radio value="Abnormal" label="Abnormal"></v-radio>
                                                            </v-radio-group>
                                                        </validation-provider>
                                                    </v-col>
                                                    <v-col class="py-0" v-if="form.test_srt_report === 'Abnormal'">
                                                        <input-text 
                                                            v-model="form.test_srt_abnormality_type"
                                                            rules="required|min:2|max:50"
                                                            label="Abnormality type"
                                                            vid="test_srt_abnormality_type"
                                                            :counter="50"
                                                        >
                                                        </input-text>
                                                    </v-col>
                                                </v-row>
                                            </v-col>
                                        </v-row>
                                        <v-row>
                                            <v-col md="4" class="py-0">
                                                Tympanometry:
                                            </v-col>
                                            <v-col md="8" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Response By Calling Name"
                                                    vid="test_tympanometry"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.test_tympanometry"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                        class="my-0"
                                                    >
                                                        <v-radio :value="true" label="Yes"></v-radio>
                                                        <v-radio :value="false" label="No"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                                <v-row v-if="form.test_tympanometry">
                                                    <v-col class="py-0">
                                                        <validation-provider
                                                            rules="required"
                                                            v-slot="{ errors, valid, dirty }"
                                                            name="Response By Calling Name"
                                                            vid="test_tympanometry_report"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.test_tympanometry_report"
                                                                row
                                                                :error-messages="errors"
                                                                :success="valid && dirty"
                                                                class="my-0"
                                                            >
                                                                <v-radio value="Normal" label="Normal"></v-radio>
                                                                <v-radio value="Abnormal" label="Abnormal"></v-radio>
                                                            </v-radio-group>
                                                        </validation-provider>
                                                    </v-col>
                                                    <v-col class="py-0" v-if="form.test_tympanometry_report === 'Abnormal'">
                                                        <input-text 
                                                            v-model="form.test_tympanometry_abnormality_type"
                                                            rules="required|min:2|max:50"
                                                            label="Abnormality type"
                                                            vid="test_tympanometry_abnormality_type"
                                                            :counter="50"
                                                        >
                                                        </input-text>
                                                    </v-col>
                                                </v-row>
                                            </v-col>
                                        </v-row>
                                        <v-row>
                                            <v-col md="4" class="py-0">
                                                Play Audiometry:
                                            </v-col>
                                            <v-col md="8" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Response By Calling Name"
                                                    vid="test_play_audiometry"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.test_play_audiometry"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                        class="my-0"
                                                    >
                                                        <v-radio :value="true" label="Yes"></v-radio>
                                                        <v-radio :value="false" label="No"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                                <v-row v-if="form.test_play_audiometry">
                                                    <v-col class="py-0">
                                                        <validation-provider
                                                            rules="required"
                                                            v-slot="{ errors, valid, dirty }"
                                                            name="Response By Calling Name"
                                                            vid="test_play_audiometry_report"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.test_play_audiometry_report"
                                                                row
                                                                :error-messages="errors"
                                                                :success="valid && dirty"
                                                                class="my-0"
                                                            >
                                                                <v-radio value="Normal" label="Normal"></v-radio>
                                                                <v-radio value="Abnormal" label="Abnormal"></v-radio>
                                                            </v-radio-group>
                                                        </validation-provider>
                                                    </v-col>
                                                    <v-col class="py-0" v-if="form.test_play_audiometry_report === 'Abnormal'">
                                                        <input-text 
                                                            v-model="form.test_play_audiometry_abnormality_type"
                                                            rules="required|min:2|max:50"
                                                            label="Abnormality type"
                                                            vid="test_play_audiometry_abnormality_type"
                                                            :counter="50"
                                                        >
                                                        </input-text>
                                                    </v-col>
                                                </v-row>
                                            </v-col>
                                        </v-row>
                                        <v-row>
                                            <v-col md="4" class="py-0">
                                                BOA ( Behaviour Observation Audiometry):
                                            </v-col>
                                            <v-col md="8" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Response By Calling Name"
                                                    vid="test_boa"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.test_boa"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                        class="my-0"
                                                    >
                                                        <v-radio :value="true" label="Yes"></v-radio>
                                                        <v-radio :value="false" label="No"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                                <v-row v-if="form.test_boa">
                                                    <v-col class="py-0">
                                                        <validation-provider
                                                            rules="required"
                                                            v-slot="{ errors, valid, dirty }"
                                                            name="Response By Calling Name"
                                                            vid="test_boa_report"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.test_boa_report"
                                                                row
                                                                :error-messages="errors"
                                                                :success="valid && dirty"
                                                                class="my-0"
                                                            >
                                                                <v-radio value="Normal" label="Normal"></v-radio>
                                                                <v-radio value="Abnormal" label="Abnormal"></v-radio>
                                                            </v-radio-group>
                                                        </validation-provider>
                                                    </v-col>
                                                    <v-col class="py-0" v-if="form.test_boa_report === 'Abnormal'">
                                                        <input-text 
                                                            v-model="form.test_boa_abnormality_type"
                                                            rules="required|min:2|max:50"
                                                            label="Abnormality type"
                                                            vid="test_boa_abnormality_type"
                                                            :counter="50"
                                                        >
                                                        </input-text>
                                                    </v-col>
                                                </v-row>
                                            </v-col>
                                        </v-row>
                                    </v-col>
                                </v-row>
                            </v-stepper-content>
                        </v-stepper-items>
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
                // response_calling_by_name: true,
                // screening_by_ling_sound_s: true,
                // screening_by_ling_sound_Sh: true,
                // screening_by_ling_sound_a: true,
                // screening_by_ling_sound_i: true,
                // screening_by_ling_sound_u: true,
                // screening_by_ling_sound_m: true,

                // test_pta: false,
                // test_pta_report: null,
                // test_pta_abnormality_type: null,
                // test_abr: false,
                // test_abr_report: null,
                // test_abr_abnormality_type: null,
                // test_srt: false,
                // test_srt_report: null,
                // test_srt_abnormality_type: null,
                // test_tympanometry: false,
                // test_tympanometry_report: null,
                // test_tympanometry_abnormality_type: null,
                // test_play_audiometry: false,
                // test_play_audiometry_report: null,
                // test_play_audiometry_abnormality_type: null,
                // test_boa: false,
                // test_boa_report: null,
                // test_boa_abnormality_type: null,

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
            this.$refs.observer.validate() ? this.$emit('save', this.form) : false;
            this.processing = false
        },
        resetFormData() {
            this.processing = true
            this.$refs.form.reset();
            this.$emit('reset', this.form);
            this.processing = false
        },
    },
}
</script>
