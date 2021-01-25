<template>
    <validation-observer 
        tag="div"
        ref="observer"
        v-slot="{ invalid }"
    >
        <v-form
            ref="form"
            name="mother"
            @reset.prevent="resetFormData"
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
                            Occupation:
                        </v-stepper-step>
                        <v-stepper-content step="1" data-question="1" class="my-0 py-0">
                            <v-stepper-items>
                                <validation-provider
                                    rules="required"
                                    v-slot="{ errors, valid, dirty }"
                                    name="Mother Occupation"
                                    vid="occupation"
                                >
                                    <v-radio-group 
                                        v-model="mother.occupation"
                                        row
                                        :error-messages="errors"
                                        :success="valid && dirty"
                                    >
                                        <v-radio value="Housewife" label="Housewife"></v-radio>
                                        <v-radio value="Business" label="Business"></v-radio>
                                        <v-radio value="Service" label="Service"></v-radio>
                                        <v-radio value="Manual Worker" label="Manual Worker"></v-radio>
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
                                :disabled="!checkValidation('1')"
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
                            Personal:
                        </v-stepper-step>
                    
                        <v-stepper-content step="2" data-question="2" class="my-0 py-0">
                            <v-stepper-items>
                                <validation-provider
                                    rules="required"
                                    v-slot="{ errors, valid, dirty }"
                                    name="Mother Habbit"
                                    vid="habbit"
                                >
                                    <v-radio-group 
                                        v-model="mother.habbit"
                                        row
                                        :error-messages="errors"
                                        :success="valid && dirty"
                                    >
                                        <v-radio value="Smoking" label="Smoking"></v-radio>
                                        <v-radio value="Alcohol" label="Alcohol"></v-radio>
                                        <v-radio value="Non-smoking" label="Non-smoking tobacco"></v-radio>
                                        <v-radio value="Exposed-tobacco" label="Exposed to tobacco"></v-radio>
                                    </v-radio-group>
                                </validation-provider>
                                
                                <v-row v-if="mother.habbit == 'Smoking'">
                                    <v-col md="6">
                                        If smoking, number of cigarettes smoked per day:
                                    </v-col>
                                    <v-col md="6" class="pt-0">
                                        <input-text 
                                            v-model="mother.number_of_cigerettes"
                                            rules="required|numeric"
                                            label="Number of cigerettes"
                                            vid="number_of_cigerettes"
                                            hide-details
                                            @keydown.enter="checkValidation('2') ? question++ : null"
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
                                        v-model="mother.congenital_anomaly"
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
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.co_morbidities"
                                            label="DM"
                                            vid="co_morbidities"
                                            value="DM"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.co_morbidities"
                                            label="HTN"
                                            value="HTN"
                                            vid="co_morbidities"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.co_morbidities"
                                            label="Asthma"
                                            value="Asthma"
                                            vid="co_morbidities"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.co_morbidities"
                                            label="TB"
                                            value="TB"
                                            vid="co_morbidities"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.co_morbidities"
                                            label="Maternity Warfarin (BMI during pregnancy > 29kg per Square)"
                                            value="Obeisity"
                                            vid="co_morbidities"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.co_morbidities"
                                            label="None"
                                            value="None"
                                            vid="co_morbidities"
                                            :data-optional="true"
                                            class="mt-0"
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
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.medications"
                                            label="Diazepam"
                                            vid="medications"
                                            value="Diazepam"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.medications"
                                            label="Phenobarbitone"
                                            value="Phenobarbitone"
                                            vid="medications"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.medications"
                                            label="Phenytoin"
                                            value="Phenytoin"
                                            vid="medications"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.medications"
                                            label="Lithium"
                                            value="Lithium"
                                            vid="medications"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.medications"
                                            label="OCP"
                                            value="OCP"
                                            vid="medications"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.medications"
                                            label="ACEI/ABR"
                                            value="ACEI/ABR"
                                            vid="medications"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.medications"
                                            label="Retineric Acid"
                                            value="Retineric Acid"
                                            vid="medications"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.medications"
                                            label="Ayurvedic/Unani"
                                            value="Ayurvedic/Unani"
                                            vid="medications"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.medications"
                                            label="Homeopathy"
                                            value="Homeopathy"
                                            vid="medications"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.medications"
                                            label="Thalidomide"
                                            value="Thalidomide"
                                            vid="medications"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.medications"
                                            label="Vitamin A"
                                            value="Vitamin A"
                                            vid="medications"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.medications"
                                            label="Valproic acid"
                                            value="Valproic acid"
                                            vid="medications"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.medications"
                                            label="B–blocker"
                                            value="B–blocker"
                                            vid="medications"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.medications"
                                            label="Folate antagonist"
                                            value="Folate antagonist"
                                            vid="medications"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.medications"
                                            label="Trimethoprim"
                                            value="Trimethoprim"
                                            vid="medications"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.medications"
                                            label="Sulfasalazine"
                                            value="Sulfasalazine"
                                            vid="medications"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.medications"
                                            label="Nitrofurantion"
                                            value="Nitrofurantion"
                                            vid="medications"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.medications"
                                            label="Ondansetron"
                                            value="Ondansetron"
                                            vid="medications"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.medications"
                                            label="Isotretinoin"
                                            value="Isotretinoin"
                                            vid="medications"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.medications"
                                            label="Warfarin"
                                            value="Warfarin"
                                            vid="medications"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.medications"
                                            label="DES  (Diethylstilbesterl)"
                                            value="DES  (Diethylstilbesterl)"
                                            vid="medications"
                                            :data-optional="true"
                                            class="mt-0"
                                        >
                                        </v-checkbox>
                                    </v-col>
                                    <v-col md="3" class="py-0">
                                        <v-checkbox
                                            v-model="mother.medications"
                                            label="None"
                                            value="None"
                                            vid="medications"
                                            :data-optional="true"
                                            class="mt-0"
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
                                :disabled="hasState('5') && !medicationsValidation"
                                small
                            >
                                Continue
                            </v-btn>                
                        </v-stepper-content>

                        <v-stepper-step editable 
                            :complete="hasState('6') && checkValidation('6')"
                            :rules="hasState('6') ? [() => checkValidation('6')] : [() => true]"
                            edit-icon="$complete"
                            step="6"
                            data-question="6"
                            class="py-1"
                        >
                            Exposure to insecticides and other toxic agents in antenatal period:
                        </v-stepper-step>
                        <v-stepper-content step="6" data-question="6" class="my-0 py-0">
                            <v-stepper-items>
                                <validation-provider
                                    rules="required"
                                    v-slot="{ errors, valid, dirty }"
                                    name="Exposure to insecticides"
                                    vid="exposure_to_insecticides"
                                >
                                    <v-radio-group 
                                        v-model="mother.exposure_to_insecticides"
                                        row
                                        :error-messages="errors"
                                        :success="valid && dirty"
                                    >
                                        <v-radio :value="true" label="Yes"></v-radio>
                                        <v-radio :value="false" label="No"></v-radio>
                                    </v-radio-group>
                                </validation-provider>
                                <v-row v-if="mother.exposure_to_insecticides">
                                    <v-col cols="6">
                                        If Yes, Mention the name:
                                    </v-col>
                                    <v-col cols="6">
                                        <input-text 
                                            v-model="mother.exposure_to_insecticides_name"
                                            rules="required|min:2|max:50"
                                            label="Insecticide's Name"
                                            vid="exposure_to_insecticides_name"
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
                                :disabled="hasState('6') ? !checkValidation('6') : true"
                                small
                            >
                                Continue
                            </v-btn>                
                        </v-stepper-content>

                        <v-stepper-step editable 
                            :complete="hasState('7') && checkValidation('7')"
                            :rules="[() => !hasState('7') || (hasState('7') && checkValidation('7'))]"
                            edit-icon="$complete"
                            step="7"
                            data-question="7"
                            class="py-1"
                        >
                            Obstetric variables:
                            <span v-if="hasState('7') && !checkValidation('7')" >Field is required!</span>
                        </v-stepper-step>
                    
                        <v-stepper-content step="7" data-question="7" class="my-0 py-0">
                            <v-stepper-items>
                                <v-row>
                                    <v-col cols="4" class="py-0">
                                        Number of pregnancies: 
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Number of pregnancies"
                                            vid="number_of_pregnancies"
                                        >
                                            <v-radio-group 
                                                v-model="mother.number_of_pregnancies"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                            >
                                                <v-radio value="1" label="1"></v-radio>
                                                <v-radio value="2" label="2"></v-radio>
                                                <v-radio value=">=3">
                                                    <template slot="label">
                                                        &geq; 3
                                                    </template>
                                                </v-radio>
                                            </v-radio-group>
                                        </validation-provider>
                                    </v-col>
                                    <v-col cols="4" class="py-0">
                                        H/O Pregnancy Loss:
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="H/O pregnancy loss"
                                            vid="ho_pregnancy_loss"
                                        >
                                            <v-radio-group 
                                                v-model="mother.ho_pregnancy_loss"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                            >
                                                <v-radio value="0" label="0"></v-radio>
                                                <v-radio value="1" label="1"></v-radio>
                                                <v-radio value=">=2">
                                                    <template slot="label">
                                                        &geq; 2
                                                    </template>
                                                </v-radio>
                                            </v-radio-group>
                                        </validation-provider>
                                    </v-col>
                                    <v-col cols="4" class="py-0">
                                        H/O Pregnancy Termination:
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="H/O pregnancy termination"
                                            vid="ho_pregnancy_terimination"
                                        >
                                            <v-radio-group 
                                                v-model="mother.ho_pregnancy_termination"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                            >
                                                <v-radio value="0" label="0"></v-radio>
                                                <v-radio value="1" label="1"></v-radio>
                                                <v-radio value=">=2">
                                                    <template slot="label">
                                                        &geq; 2
                                                    </template>
                                                </v-radio>
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
                                :disabled="hasState('7') && !checkValidation('7')"
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
                            Condition of Alive babies:
                        </v-stepper-step>
                    
                        <v-stepper-content step="8" data-question="8" class="my-0 py-0">
                            <v-stepper-items>
                                <validation-provider
                                    rules="required"
                                    v-slot="{ errors, valid, dirty }"
                                    name="Condition of Alive Babies"
                                    vid="condition_of_alive_babies"
                                >
                                    <v-radio-group 
                                        v-model="mother.condition_of_alive_babies"
                                        row
                                        :error-messages="errors"
                                        :success="valid && dirty"
                                    >
                                        <v-radio value="Healthy" label="Healthy"></v-radio>
                                        <v-radio value="congenital_anomalies" label="Congenital Anomalies"></v-radio>
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
            mother: {
                // occupation: 'Housewife',
                // habbit: 'Non-smoking',
                // number_of_cigerettes: null,
                // congenital_anomaly: true,
                // co_morbidities: ['DM'],
                // medications: ['OCP'],
                // exposure_to_insecticides: false,
                // exposure_to_insecticides_name: null,
                // number_of_pregnancies: '2',
                // ho_pregnancy_loss: '0',
                // ho_pregnancy_termination: '0',
                // condition_of_alive_babies: 'Healthy',

                occupation: null,
                habbit: null,
                number_of_cigerettes: null,
                congenital_anomaly: true,
                co_morbidities: [],
                medications: [],
                exposure_to_insecticides: false,
                exposure_to_insecticides_name: null,
                number_of_pregnancies: null,
                ho_pregnancy_loss: null,
                ho_pregnancy_termination: null,
                condition_of_alive_babies: null,
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
            return this.mother['co_morbidities'].length > 0;
        },
        medicationsValidation() {
            return this.mother['medications'].length > 0;
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
            this.$refs.observer.validate() ? this.$emit('save', this.mother) : false;
            this.processing = false
        },
        resetFormData() {
            this.processing = true
            this.$refs.form.reset();
            this.$emit('reset', this.mother);
            this.$nextTick(() => {
                this.stepperState = [];
                this.processing = false
            })
        },
    },
}
</script>
