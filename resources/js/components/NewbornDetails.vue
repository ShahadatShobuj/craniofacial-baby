<template>
    <validation-observer
        tag="div"
        ref="observer"
        v-slot="{ invalid }"
    >
        <v-form
            ref="form"
            name="newborn"
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
                            Age of mother at this/affected pregnancy:
                        </v-stepper-step>

                        <v-stepper-content step="1" data-question="1" class="my-0 py-0">
                            <v-stepper-items>
                                <validation-provider
                                    rules="required"
                                    v-slot="{ errors, valid, dirty }"
                                    name="Age of mother during affected pregnancy"
                                    vid="mother_age_during_affected_pregnancy"
                                >
                                    <v-radio-group
                                        v-model="form.mother_age_during_affected_pregnancy"
                                        row
                                        :error-messages="errors"
                                        :success="valid && dirty"
                                        class="my-0"
                                    >
                                        <v-radio value="less_or_equal_20_years">
                                            <template slot="label">
                                                &leq; 20 years
                                            </template>
                                        </v-radio>
                                        <v-radio value="21_to_25_years" label="21-25 years"></v-radio>
                                        <v-radio value="26_to_30_years" label="26-30 years"></v-radio>
                                        <v-radio value="greater_or_equal_31_years">
                                            <template slot="label">
                                                &geq; 31 years
                                            </template>
                                        </v-radio>
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
                            Age of father at this/affected pregnancy:
                        </v-stepper-step>

                        <v-stepper-content step="2" data-question="2" class="my-0 py-0">
                            <v-stepper-items>
                                <validation-provider
                                    rules="required"
                                    v-slot="{ errors, valid, dirty }"
                                    name="Age of father during affected pregnancy"
                                    vid="father_age_during_affected_pregnancy"
                                >
                                    <v-radio-group
                                        v-model="form.father_age_during_affected_pregnancy"
                                        row
                                        :error-messages="errors"
                                        :success="valid && dirty"
                                        class="my-0"
                                    >
                                        <v-radio value="less_or_equal_20_years">
                                            <template slot="label">
                                                &leq; 20 years
                                            </template>
                                        </v-radio>
                                        <v-radio value="21_to_30_years" label="21-30 years"></v-radio>
                                        <v-radio value="31_to_40_years" label="31-40 years"></v-radio>
                                        <v-radio value="greater_or_equal_41_years">
                                            <template slot="label">
                                                &geq; 41 years
                                            </template>
                                        </v-radio>
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
                            Duration of pregnancy at delivery:
                        </v-stepper-step>

                        <v-stepper-content step="3" data-question="3" class="my-0 py-0">
                            <v-stepper-items>
                                <validation-provider
                                    rules="required"
                                    v-slot="{ errors, valid, dirty }"
                                    name="Duration of pregnancy at delivery"
                                    vid="duration_of_pregnancy_at_delivery"
                                >
                                    <v-radio-group
                                        v-model="form.duration_of_pregnancy_at_delivery"
                                        row
                                        :error-messages="errors"
                                        :success="valid && dirty"
                                        class="my-0"
                                    >
                                        <v-radio value="Preterm" label="Preterm"></v-radio>
                                        <v-radio value="Term" label="Term"></v-radio>
                                        <v-radio value="Post-Date" label="Post-Date"></v-radio>
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
                            :complete="hasState('4') && checkValidation('4')"
                            :rules="hasState('4') ? [() => checkValidation('4')] : [() => true]"
                            edit-icon="$complete"
                            step="4"
                            data-question="4"
                            class="py-1"
                        >
                            Condition of baby at birth:
                        </v-stepper-step>
                        <v-stepper-content step="4" data-question="4" class="my-0 py-0">
                            <v-stepper-items>
                                <validation-provider
                                    rules="required"
                                    v-slot="{ errors, valid, dirty }"
                                    name="Condition of baby at birth"
                                    vid="condition_at_birth"
                                >
                                    <v-radio-group
                                        v-model="form.condition_at_birth"
                                        row
                                        :error-messages="errors"
                                        :success="valid && dirty"
                                        class="my-0"
                                    >
                                        <v-radio value="Healthy" label="Healthy"></v-radio>
                                        <v-radio value="Not Healthy" label="Not Healthy"></v-radio>
                                    </v-radio-group>
                                </validation-provider>
                                <v-row v-if="form.condition_at_birth === 'Not Healthy'">
                                    <v-col cols="6" class="py-0">
                                        If not healthy, Mention the Disease or abnormality:
                                    </v-col>
                                    <v-col cols="6" class="py-0">
                                        <input-text
                                            v-model="form.condition_at_birth_disease"
                                            rules="required|min:2|max:50"
                                            label="Disease Name"
                                            vid="condition_at_birth_disease"
                                            :counter="50"
                                        >
                                        </input-text>
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
                            Sex:
                        </v-stepper-step>

                        <v-stepper-content step="5" data-question="5" class="my-0 py-0">
                            <v-stepper-items>
                                <validation-provider
                                    rules="required"
                                    v-slot="{ errors, valid, dirty }"
                                    name="Sex"
                                    vid="sex_orientation"
                                >
                                    <v-radio-group
                                        v-model="form.sex_orientation"
                                        row
                                        :error-messages="errors"
                                        :success="valid && dirty"
                                        class="my-0"
                                    >
                                        <v-radio value="Male" label="Male"></v-radio>
                                        <v-radio value="Female" label="Female"></v-radio>
                                        <v-radio value="Others" label="Others"></v-radio>
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
                                :disabled="hasState('5') ? !checkValidation('5') : true"
                                small
                            >
                                Continue
                            </v-btn>
                        </v-stepper-content>

                        <v-stepper-step editable
                            :complete="hasState('6') ? checkValidation('6') : false"
                            :rules="hasState('6') ? [() => checkValidation('6')] : [() => true]"
                            edit-icon="$complete"
                            step="6"
                            data-question="6"
                            class="py-1"
                        >
                            Weight:
                        </v-stepper-step>

                        <v-stepper-content step="6" data-question="6" class="my-0 py-0">
                            <v-stepper-items>
                                <validation-provider
                                    rules="required"
                                    v-slot="{ errors, valid, dirty }"
                                    name="Sex"
                                    vid="weight"
                                >
                                    <v-radio-group
                                        v-model="form.weight"
                                        row
                                        :error-messages="errors"
                                        :success="valid && dirty"
                                        class="my-0"
                                    >
                                        <v-radio value="less_than_one_and_half_kg" label="<1.5 kg"></v-radio>
                                        <v-radio value="bteween_one_half_and_two_kg" label="1.5-2 kg"></v-radio>
                                        <v-radio value="bteween_two_and_three_kg" label="2-3 kg"></v-radio>
                                        <v-radio value="more_than_3_kg" label=">3.0 kg"></v-radio>
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
                                :disabled="hasState('6') ? !checkValidation('6') : true"
                                small
                            >
                                Continue
                            </v-btn>
                        </v-stepper-content>

                        <v-stepper-step editable
                            :complete="hasState('7') ? checkValidation('7') : false"
                            :rules="hasState('7') ? [() => checkValidation('7')] : [() => true]"
                            edit-icon="$complete"
                            step="7"
                            data-question="7"
                            class="py-1"
                        >
                            APGAR score:
                        </v-stepper-step>

                        <v-stepper-content step="7" data-question="7" class="my-0 py-0">
                            <v-stepper-items>
                                <validation-provider
                                    rules="required"
                                    v-slot="{ errors, valid, dirty }"
                                    name="Sex"
                                    vid="apgar_score"
                                >
                                    <v-radio-group
                                        v-model="form.apgar_score"
                                        row
                                        :error-messages="errors"
                                        :success="valid && dirty"
                                        class="my-0"
                                    >
                                        <v-radio value="seven_to_ten" label="7-10"></v-radio>
                                        <v-radio value="four_to_six" label="4-6"></v-radio>
                                        <v-radio value="zero_to_three" label="0-3"></v-radio>
                                        <v-radio value="unknown" label="Not known"></v-radio>
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
                                :disabled="hasState('7') ? !checkValidation('7') : true"
                                small
                            >
                                Continue
                            </v-btn>
                        </v-stepper-content>

                        <v-stepper-step editable
                            :complete="hasState('8') ? checkValidation('8') : false"
                            :rules="hasState('8') ? [() => checkValidation('8')] : [() => true]"
                            edit-icon="$complete"
                            step="8"
                            data-question="8"
                            class="py-1"
                        >
                            Congenital craniofacial cleft:
                        </v-stepper-step>

                        <v-stepper-content step="8" data-question="8" class="my-0 py-0">
                            <v-stepper-items>
                                <v-row>
                                    <v-col md="4" class="py-0">Diagnosis:</v-col>
                                    <v-col md="8" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Sex"
                                            vid="congenital_craniofacial_cleft"
                                        >
                                            <v-radio-group
                                                v-model="form.congenital_craniofacial_cleft"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                                <v-radio value="Antenatal" label="Antenatal"></v-radio>
                                                <v-radio value="Postnatal" label="Postnatal"></v-radio>
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
                                :disabled="hasState('8') ? !checkValidation('8') : true"
                                small
                            >
                                Continue
                            </v-btn>
                        </v-stepper-content>

                        <v-stepper-step editable
                            :complete="hasState('9') && checkValidation('9')"
                            :rules="[() => !hasState('9') || (hasState('9') && checkValidation('9'))]"
                            edit-icon="$complete"
                            step="9"
                            data-question="9"
                            class="py-1"
                        >
                            The clinical deformity to be defined using Tessier classification where relevant:
                            <span v-if="hasState('9') && !checkValidation('9')" >Field is required!</span>
                        </v-stepper-step>

                        <v-stepper-content step="9" data-question="9" class="my-0 py-0">
                            <v-stepper-items>
                                <v-row>
                                    <v-col md="3" class="py-0">
                                        Site:
                                    </v-col>
                                    <v-col md="9" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Tessier classification"
                                            vid="tessier_classification_site"
                                        >
                                            <v-radio-group
                                                v-model="form.tessier_classification_site"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                                <v-radio value="Left" label="Left"></v-radio>
                                                <v-radio value="Right" label="Right"></v-radio>
                                                <v-radio value="Bilateral" label="Bilateral"></v-radio>
                                            </v-radio-group>
                                        </validation-provider>
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col md="3" class="py-0">
                                        Tessier type (if possible): Right
                                    </v-col>
                                    <v-col md="9" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Tessier classification"
                                            vid="tessier_classification_site_type_right"
                                        >
                                            <v-radio-group
                                                v-model="form.tessier_classification_site_type_right"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                                <v-radio value="0" label="0"></v-radio>
                                                <v-radio value="1" label="1"></v-radio>
                                                <v-radio value="2" label="2"></v-radio>
                                                <v-radio value="3" label="3"></v-radio>
                                                <v-radio value="4" label="4"></v-radio>
                                                <v-radio value="5" label="5"></v-radio>
                                                <v-radio value="6" label="6"></v-radio>
                                                <v-radio value="7" label="7"></v-radio>
                                                <v-radio value="8" label="8"></v-radio>
                                                <v-radio value="9" label="9"></v-radio>
                                                <v-radio value="10" label="10"></v-radio>
                                                <v-radio value="11" label="11"></v-radio>
                                                <v-radio value="12" label="12"></v-radio>
                                                <v-radio value="13" label="13"></v-radio>
                                                <v-radio value="14" label="14"></v-radio>
                                                <v-radio value="31" label="31"></v-radio>
                                                <v-radio value="-1" label="Difficult to know"></v-radio>
                                            </v-radio-group>
                                        </validation-provider>
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col md="3" class="py-0">
                                        Tessier type (if possible): Left
                                    </v-col>
                                    <v-col md="9" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Tessier classification"
                                            vid="tessier_classification_site_type_left"
                                        >
                                            <v-radio-group
                                                v-model="form.tessier_classification_site_type_left"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                                <v-radio value="0" label="0"></v-radio>
                                                <v-radio value="1" label="1"></v-radio>
                                                <v-radio value="2" label="2"></v-radio>
                                                <v-radio value="3" label="3"></v-radio>
                                                <v-radio value="4" label="4"></v-radio>
                                                <v-radio value="5" label="5"></v-radio>
                                                <v-radio value="6" label="6"></v-radio>
                                                <v-radio value="7" label="7"></v-radio>
                                                <v-radio value="8" label="8"></v-radio>
                                                <v-radio value="9" label="9"></v-radio>
                                                <v-radio value="10" label="10"></v-radio>
                                                <v-radio value="11" label="11"></v-radio>
                                                <v-radio value="12" label="12"></v-radio>
                                                <v-radio value="13" label="13"></v-radio>
                                                <v-radio value="14" label="14"></v-radio>
                                                <v-radio value="31" label="31"></v-radio>
                                                <v-radio value="-1" label="Difficult to know"></v-radio>
                                            </v-radio-group>
                                        </validation-provider>
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col cols="3" class="py-0">
                                        Anatomical type:
                                    </v-col>
                                    <v-col cols="9" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Tessier classification"
                                            vid="tessier_classification_anatomical_type"
                                        >
                                            <v-radio-group
                                                v-model="form.tessier_classification_anatomical_type"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                                <v-radio value="Bony Cleft" label="Bony Cleft"></v-radio>
                                                <v-radio value="Soft tissue cleft" label="Soft tissue cleft"></v-radio>
                                                <v-radio value="Absent" label="Absent"></v-radio>
                                                <v-radio value="Both" label="Both"></v-radio>
                                            </v-radio-group>
                                        </validation-provider>
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col md="3" class="py-0">
                                        Microtia:
                                    </v-col>
                                    <v-col md="9" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Tessier classification"
                                            vid="tessier_classification_microtia"
                                        >
                                            <v-radio-group
                                                v-model="form.tessier_classification_microtia"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                                <v-radio :value="true" label="Yes"></v-radio>
                                                <v-radio :value="false" label="NO"></v-radio>
                                            </v-radio-group>
                                        </validation-provider>
                                        <v-row v-if="form.tessier_classification_microtia">
                                            <v-col md="3" class="pa-0">if yes,</v-col>
                                            <v-col md="9" class="pa-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    vid="tessier_classification_microtia_type"
                                                >
                                                    <v-radio-group
                                                        v-model="form.tessier_classification_microtia_type"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                        class="my-0"
                                                    >
                                                        <v-radio value="Bilateral" label="Bilateral"></v-radio>
                                                        <v-radio value="Unilateral" label="Unilateral"></v-radio>
                                                        <v-radio value="Right" label="Right"></v-radio>
                                                        <v-radio value="Left" label="Left"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                            </v-col>
                                        </v-row>
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col md="3" class="py-0">
                                        Choanal Attresia:
                                    </v-col>
                                    <v-col md="9" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Tessier classification"
                                            vid="tessier_classification_choanal_attresia"
                                        >
                                            <v-radio-group
                                                v-model="form.tessier_classification_choanal_attresia"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                                <v-radio value="Present" label="Present"></v-radio>
                                                <v-radio value="Absent" label="Absent"></v-radio>
                                            </v-radio-group>
                                        </validation-provider>
                                        <v-row v-if="form.tessier_classification_choanal_attresia === 'Present'">
                                            <v-col md="3" class="pa-0">if present,</v-col>
                                            <v-col md="9" class="pa-0">
                                                <v-row>
                                                    <v-col md="3" class="pa-0">Site:</v-col>
                                                    <v-col md="9" class="pa-0">
                                                        <validation-provider
                                                            rules="required"
                                                            v-slot="{ errors, valid, dirty }"
                                                            vid="tessier_classification_choanal_attresia_site"
                                                        >
                                                            <v-radio-group
                                                                v-model="form.tessier_classification_choanal_attresia_site"
                                                                row
                                                                :error-messages="errors"
                                                                :success="valid && dirty"
                                                                class="my-0"
                                                            >
                                                                <v-radio value="Right" label="Right"></v-radio>
                                                                <v-radio value="Left" label="Left"></v-radio>
                                                                <v-radio value="Bilateral" label="Bilateral"></v-radio>
                                                            </v-radio-group>
                                                        </validation-provider>
                                                    </v-col>
                                                </v-row>
                                                <v-row>
                                                    <v-col md="3" class="pa-0">Anatomical type:</v-col>
                                                    <v-col md="9" class="pa-0">
                                                        <validation-provider
                                                            rules="required"
                                                            v-slot="{ errors, valid, dirty }"
                                                            vid="tessier_classification_choanal_attresia_anatomical_type"
                                                        >
                                                            <v-radio-group
                                                                v-model="form.tessier_classification_choanal_attresia_anatomical_type"
                                                                row
                                                                :error-messages="errors"
                                                                :success="valid && dirty"
                                                                class="my-0"
                                                            >
                                                                <v-radio value="Soft" label="Soft"></v-radio>
                                                                <v-radio value="Bony" label="Bony"></v-radio>
                                                            </v-radio-group>
                                                        </validation-provider>
                                                    </v-col>
                                                </v-row>
                                            </v-col>
                                        </v-row>
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
                                :disabled="hasState('9') && !checkValidation('9')"
                                small
                            >
                                Continue
                            </v-btn>
                        </v-stepper-content>

                        <v-stepper-step editable
                            :complete="hasState('10') ? checkValidation('10') && congenitalAnomaliesInvolvedSystemValidation : false"
                            :rules="hasState('10') ? [() => checkValidation('10') && congenitalAnomaliesInvolvedSystemValidation] : [() => true]"
                            edit-icon="$complete"
                            step="10"
                            data-question="10"
                            class="py-1"
                        >
                            Other congenital anomalies:
                            <span v-if="!congenitalAnomaliesInvolvedSystemValidation">Please, select involved system</span>
                        </v-stepper-step>

                        <v-stepper-content step="10" data-question="10" class="my-0 py-0">
                            <v-stepper-items>
                                <v-row class="">
                                    <v-col cols="3" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Other congenital anomalies"
                                            vid="other_congenital_anomalies"
                                        >
                                            <v-radio-group
                                                v-model="form.other_congenital_anomalies"
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
                                    <v-col cols="9" class="py-0" v-if="form.other_congenital_anomalies">
                                        <v-row>
                                            If yes,
                                        </v-row>
                                        <v-row class="">
                                            <v-col cols="3" class="py-0">
                                                <v-checkbox
                                                    v-model="form.other_congenital_anomalies_involved_system"
                                                    label="Ear"
                                                    vid="other_congenital_anomalies_involved_system"
                                                    value="Ear"
                                                    :data-optional="true"
                                                    class="my-0"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="3" class="py-0">
                                                <v-checkbox
                                                    v-model="form.other_congenital_anomalies_involved_system"
                                                    value="Cardiac"
                                                    label="Cardiac"
                                                    vid="other_congenital_anomalies_involved_system"
                                                    :data-optional="true"
                                                    class="my-0"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="3" class="py-0">
                                                <v-checkbox
                                                    v-model="form.other_congenital_anomalies_involved_system"
                                                    value="Head-neck"
                                                    label="Head-neck"
                                                    vid="other_congenital_anomalies_involved_system"
                                                    :data-optional="true"
                                                    class="my-0"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="3" class="py-0">
                                                <v-checkbox
                                                    v-model="form.other_congenital_anomalies_involved_system"
                                                    label="Abdominal"
                                                    vid="other_congenital_anomalies_involved_system"
                                                    value="Abdominal"
                                                    :data-optional="true"
                                                    class="my-0"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="3" class="py-0">
                                                <v-checkbox
                                                    v-model="form.other_congenital_anomalies_involved_system"
                                                    label="Genitourinary"
                                                    vid="other_congenital_anomalies_involved_system"
                                                    value="Genitourinary"
                                                    :data-optional="true"
                                                    class="my-0"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="3" class="py-0">
                                                <v-checkbox
                                                    v-model="form.other_congenital_anomalies_involved_system"
                                                    value="Upper limb"
                                                    label="Upper limb"
                                                    vid="other_congenital_anomalies_involved_system"
                                                    :data-optional="true"
                                                    class="my-0"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="3" class="py-0">
                                                <v-checkbox
                                                    v-model="form.other_congenital_anomalies_involved_system"
                                                    value="Lower limb"
                                                    label="Lower limb"
                                                    vid="other_congenital_anomalies_involved_system"
                                                    :data-optional="true"
                                                    class="my-0"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="3" class="py-0">
                                                <v-checkbox
                                                    v-model="form.other_congenital_anomalies_involved_system"
                                                    label="Dental"
                                                    vid="other_congenital_anomalies_involved_system"
                                                    value="Dental"
                                                    :data-optional="true"
                                                    class="my-0"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                        </v-row>
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
                                :disabled="hasState('10') ? !(checkValidation('10') && congenitalAnomaliesInvolvedSystemValidation) : true"
                                small
                            >
                                Continue
                            </v-btn>
                        </v-stepper-content>

                        <v-stepper-step editable
                            :complete="hasState('11') ? checkValidation('11'): false"
                            :rules="hasState('11') ? [() => checkValidation('11')] : [() => true]"
                            edit-icon="$complete"
                            step="11"
                            data-question="11"
                            class="py-1"
                        >
                            Any syndrome suspected:
                        </v-stepper-step>

                        <v-stepper-content step="11" data-question="11" class="my-0 py-0">
                            <v-stepper-items>
                                <v-row class="">
                                    <v-col cols="12" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Any syndrome suspected"
                                            vid="any_syndrome_suspected"
                                        >
                                            <v-radio-group
                                                v-model="form.any_syndrome_suspected"
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
                                :disabled="hasState('11') ? !checkValidation('11') : true"
                                small
                            >
                                Continue
                            </v-btn>
                        </v-stepper-content>

                        <v-stepper-step editable
                            :complete="hasState('12') ? checkValidation('12'): false"
                            :rules="hasState('12') ? [() => checkValidation('12')] : [() => true]"
                            edit-icon="$complete"
                            step="12"
                            data-question="12"
                            class="py-1"
                        >
                            Eyes:
                        </v-stepper-step>

                        <v-stepper-content step="12" data-question="12" class="my-0 py-0">
                            <v-stepper-items>
                                <v-row class="">
                                    <v-col cols="3" class="py-0">
                                        Corneal opacities and other deformities:
                                    </v-col>
                                    <v-col cols="9" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Corneal opacities and other deformities:"
                                            vid="corneal_opacities_and_other_deformities"
                                        >
                                            <v-radio-group
                                                v-model="form.corneal_opacities_and_other_deformities"
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
                                :disabled="hasState('12') ? !checkValidation('12') : true"
                                small
                            >
                                Continue
                            </v-btn>
                        </v-stepper-content>

                        <v-stepper-step editable
                            :complete="hasState('13') ? checkValidation('13') && ringConstrictionsInvolvingAreaValidation : false"
                            :rules="hasState('13') ? [() => checkValidation('13') && ringConstrictionsInvolvingAreaValidation] : [() => true]"
                            edit-icon="$complete"
                            step="13"
                            data-question="13"
                            class="py-1"
                        >
                            Ring constrictions, carefully looking at subtle constrictions (to be photographed with contralateral site as comparison):
                            <span v-if="!ringConstrictionsInvolvingAreaValidation">Please, select involved system</span>
                        </v-stepper-step>

                        <v-stepper-content step="13" data-question="13" class="my-0 py-0">
                            <v-stepper-items>
                                <v-row class="">
                                    <v-col cols="3" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Ring Constrictions"
                                            vid="ring_constrictions"
                                        >
                                            <v-radio-group
                                                v-model="form.ring_constrictions"
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
                                    <v-col cols="9" class="py-0" v-if="form.ring_constrictions">
                                        <v-row>
                                            If yes,
                                        </v-row>
                                        <v-row class="">
                                            <v-col cols="3" class="py-0">
                                                <v-checkbox
                                                    v-model="form.ring_constrictions_involving_area"
                                                    label="Head"
                                                    vid="ring_constrictions_involving_area"
                                                    value="Head"
                                                    :data-optional="true"
                                                    class="my-0"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="3" class="py-0">
                                                <v-checkbox
                                                    v-model="form.ring_constrictions_involving_area"
                                                    value="Lower limb"
                                                    label="Lower limb"
                                                    vid="ring_constrictions_involving_area"
                                                    :data-optional="true"
                                                    class="my-0"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="3" class="py-0">
                                                <v-checkbox
                                                    v-model="form.ring_constrictions_involving_area"
                                                    value="Upper limb"
                                                    label="Upper limb"
                                                    vid="ring_constrictions_involving_area"
                                                    :data-optional="true"
                                                    class="my-0"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                        </v-row>
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
                                :disabled="hasState('13') ? !(checkValidation('13') && ringConstrictionsInvolvingAreaValidation) : true"
                                small
                            >
                                Continue
                            </v-btn>
                        </v-stepper-content>

                        <v-stepper-step editable
                            :complete="hasState('14') ? checkValidation('14') : false"
                            :rules="hasState('14') ? [() => checkValidation('14')] : [() => true]"
                            edit-icon="$complete"
                            step="14"
                            data-question="14"
                            class="py-1"
                        >
                            Nasal airway obstruction (tested by tissue paper test, occluding the nose if possible and nasal anemometry, if available):
                        </v-stepper-step>

                        <v-stepper-content step="14" data-question="14" class="my-0 py-0">
                            <v-stepper-items>
                                <v-row class="">
                                    <v-col cols="3" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Nasal Obstruction"
                                            vid="nasal_obstruction"
                                        >
                                            <v-radio-group
                                                v-model="form.nasal_obstruction"
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
                                    <v-col cols="9" class="py-0" v-if="form.nasal_obstruction">
                                        <v-row>
                                            <v-col md="3" class="py-0">
                                                If yes,
                                            </v-col>
                                            <v-col md="9" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Nasal Obstruction Treated"
                                                    vid="nasal_obstruction_treated"
                                                >
                                                    <v-radio-group
                                                        v-model="form.nasal_obstruction_treated"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                        class="my-0"
                                                    >
                                                        <v-radio :value="true" label="Treated"></v-radio>
                                                        <v-radio :value="false" label="Not Treated"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                            </v-col>
                                        </v-row>
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
                                :disabled="hasState('14') ? !checkValidation('14') : true"
                                small
                            >
                                Continue
                            </v-btn>
                        </v-stepper-content>

                        <v-stepper-step editable
                            :complete="hasState('15') ? checkValidation('15') : false"
                            :rules="hasState('15') ? [() => checkValidation('15')] : [() => true]"
                            edit-icon="$complete"
                            step="15"
                            data-question="15"
                            class="py-1"
                        >
                            Palatal abnormality:
                        </v-stepper-step>

                        <v-stepper-content step="15" data-question="15" class="my-0 py-0">
                            <v-stepper-items>
                                <v-row class="">
                                    <v-col cols="3" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Palatal abnormality"
                                            vid="palatal_abnormality"
                                        >
                                            <v-radio-group
                                                v-model="form.palatal_abnormality"
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
                                    <v-col cols="9" class="py-0" v-if="form.palatal_abnormality">
                                        <v-row>
                                            <v-col md="3" class="py-0">
                                                If yes,
                                            </v-col>
                                            <v-col md="9" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Nasal Obstruction Treated"
                                                    vid="palatal_abnormality_type"
                                                >
                                                    <v-radio-group
                                                        v-model="form.palatal_abnormality_type"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                        class="my-0"
                                                    >
                                                        <v-radio value="Complete" label="Complete"></v-radio>
                                                        <v-radio value="Incomplete" label="Incomplete"></v-radio>
                                                        <v-radio value="Bilateral" label="Bilateral"></v-radio>
                                                        <v-radio value="Unilateral" label="Unilateral"></v-radio>
                                                        <v-radio value="Right" label="Right"></v-radio>
                                                        <v-radio value="Left" label="Left"></v-radio>
                                                        <v-radio value="Submucous" label="Submucous"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                            </v-col>
                                        </v-row>
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
                                :disabled="hasState('15') ? !checkValidation('15') : true"
                                small
                            >
                                Continue
                            </v-btn>
                        </v-stepper-content>

                        <v-stepper-step editable
                            :complete="hasState('16') ? checkValidation('16') : false"
                            :rules="hasState('16') ? [() => checkValidation('16')] : [() => true]"
                            edit-icon="$complete"
                            step="16"
                            data-question="16"
                            class="py-1"
                        >
                            Cleft lip:
                        </v-stepper-step>

                        <v-stepper-content step="16" data-question="16" class="my-0 py-0">
                            <v-stepper-items>
                                <v-row class="">
                                    <v-col cols="3" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Cleft lip"
                                            vid="cleft_lip"
                                        >
                                            <v-radio-group
                                                v-model="form.cleft_lip"
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
                                    <v-col cols="9" class="py-0" v-if="form.cleft_lip">
                                        <v-row>
                                            <v-col md="3" class="py-0">
                                                If yes,
                                            </v-col>
                                            <v-col md="9" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Nasal Obstruction Treated"
                                                    vid="cleft_lip_type"
                                                >
                                                    <v-radio-group
                                                        v-model="form.cleft_lip_type"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                        class="my-0"
                                                    >
                                                        <v-radio value="Complete" label="Complete"></v-radio>
                                                        <v-radio value="Incomplete" label="Incomplete"></v-radio>
                                                        <v-radio value="Bilateral" label="Bilateral"></v-radio>
                                                        <v-radio value="Unilateral" label="Unilateral"></v-radio>
                                                        <v-radio value="Right" label="Right"></v-radio>
                                                        <v-radio value="Left" label="Left"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                            </v-col>
                                        </v-row>
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
                                :disabled="hasState('16') ? !checkValidation('16') : true"
                                small
                            >
                                Continue
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
                // Particulars of newborn
                // mother_age_during_affected_pregnancy: 'less_or_equal_20_years',
                // father_age_during_affected_pregnancy: 'less_or_equal_20_years',
                // duration_of_pregnancy_at_delivery: 'Preterm',
                // condition_at_birth: 'Healthy',
                // condition_at_birth_disease: null,
                // sex_orientation: 'male',
                // weight: 'less_than_one_and_half_kg',
                // apgar_score: 'seven_to_ten',
                // congenital_craniofacial_cleft: 'Antenatal',
                // tessier_classification_site: 'Right',
                // tessier_classification_site_type_right: '0',
                // tessier_classification_site_type_left: '1',
                // tessier_classification_anatomical_type: 'Bony Cleft',
                // tessier_classification_microtia: true,
                // tessier_classification_microtia_type: 'Bilateral',
                // tessier_classification_choanal_attresia: 'Present',
                // tessier_classification_choanal_attresia_site: 'left',
                // tessier_classification_choanal_attresia_anatomical_type: 'bony',
                // other_congenital_anomalies: true,
                // other_congenital_anomalies_involved_system: ['Ear'],

                // any_syndrome_suspected: true,
                // corneal_opacities_and_other_deformities: false,

                // ring_constrictions: true,
                // ring_constrictions_involving_area: ['Head'],
                // nasal_obstruction: false,
                // nasal_obstruction_treated: null,
                // palatal_abnormality: true,
                // palatal_abnormality_type: 'Complete',
                // cleft_lip: true,
                // cleft_lip_type: 'Complete',

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
        congenitalAnomaliesInvolvedSystemValidation() {
            return !this.form.other_congenital_anomalies || this.form['other_congenital_anomalies_involved_system'].length > 0;
        },
        ringConstrictionsInvolvingAreaValidation() {
            return !this.form.ring_constrictions || this.form['ring_constrictions_involving_area'].length > 0;
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
