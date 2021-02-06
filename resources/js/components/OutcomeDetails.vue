<template>
    <validation-observer
        tag="div"
        ref="observer"
        v-slot="{ invalid }"
    >
        <v-form
            ref="form"
            name="outcome"
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
                                                v-model="form.standard_photographic_views"
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
                                                v-model="form.video_speech_recordings"
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
                                                v-model="form.vision_test"
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
                                                v-model="form.nasal_airway_evaluation"
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
                                            v-model="form.educational_occupational_attainments"
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
                                        f) Marital Status:
                                    </v-col>
                                    <v-col md="8" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Eyelid surgery"
                                            vid="marital_status"
                                        >
                                            <v-radio-group
                                                v-model="form.marital_status"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                                <v-radio value="Single" label="Single"></v-radio>
                                                <v-radio value="Married" label="Married"></v-radio>
                                            </v-radio-group>
                                        </validation-provider>
                                        <v-row v-if="form.marital_status === 'Married'">
                                            <v-col md="4" class="py-0">
                                                If married:
                                            </v-col>
                                            <v-col md="8" class="py-0">
                                                <v-row>
                                                    <v-col cols="12" class="py-0">
                                                        <input-text
                                                            v-model="form.number_of_child"
                                                            rules="min:1|numeric"
                                                            label="Number of child"
                                                            vid="number_of_child"
                                                            :data-optional="true"
                                                        >
                                                        </input-text>
                                                    </v-col>
                                                    <v-col cols="12" class="py-0">
                                                        <input-text
                                                            v-model="form.number_of_abnormal_child"
                                                            rules="min:1|numeric"
                                                            label="Number of abnormal child"
                                                            vid="number_of_abnormal_child"
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
                                                        v-model="form.parents_review_of_appearance"
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
                                                        v-model="form.parents_review_of_speech"
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
                                                        v-model="form.parents_review_of_eating"
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
                                                        v-model="form.parents_review_of_breathing"
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
                                                        v-model="form.parents_review_of_dental"
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
                                <v-row>
                                    <v-col md="3" class="py-0">
                                        h) Report:
                                    </v-col>
                                    <v-col md="9" class="py-0">
                                        <input-text-area
                                            v-model="form.report"
                                            rules="required|min:2"
                                            label="Report"
                                            vid="report"
                                            :counter="50"
                                            :data-optional="true"
                                        >
                                        </input-text-area>
                                    </v-col>
                                </v-row>
                            </v-stepper-items>
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
                // standard_photographic_views: 'Available',
                // video_speech_recordings: 'Available',
                // vision_test: 'Available',
                // nasal_airway_evaluation: 'Done',
                // educational_occupational_attainments: 'Done',
                // marital_status: 'Single',
                // number_of_child: null,
                // number_of_abnormal_child: null,

                // parents_review_of_appearance: 'satisfied',
                // parents_review_of_breathing: 'satisfied',
                // parents_review_of_dental: 'satisfied',
                // parents_review_of_eating: 'satisfied',
                // parents_review_of_speech: 'satisfied',

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
            this.$nextTick(() => {
                this.stepperState = [];
                this.processing = false
            })
        },
    },
}
</script>
