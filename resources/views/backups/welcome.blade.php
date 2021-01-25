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
        <v-col md="8" sm="12">
            {{-- <v-stepper v-model="curr" color="green">
                <v-stepper-header class="overflow-x-auto">
                    <v-stepper-step
                        v-for="(step,n) in steps"
                        :key="n"
                        :complete="stepComplete(n+1)"
                        :step="n+1"
                        :rules="[value => !!step.valid]" 
                        :color="stepStatus(n+1)">
                        {{ step.name }}
                    </v-stepper-step>
                </v-stepper-header>
                <v-stepper-content v-for="(step,n) in steps" :step="n+1" :key="n">
                    {{ step.name }}
                    <v-card color="grey lighten-1" class="mb-12" height="200px">
                        <v-card-text>
                            <v-form :ref="'stepForm'" v-model="step.valid" lazy-validation>
                                <v-text-field label="Enter something..." :rules="step.rules"></v-text-field>
                            </v-form>
                        </v-card-text>
                    </v-card>
                    <v-btn v-if="n+1 < lastStep" color="primary" @click="validate(n)" :disabled="!step.valid">Continue</v-btn>
                    <v-btn v-else color="success" @click="done()">Done</v-btn>
                    <v-btn text @click="curr = n">Back</v-btn>
                </v-stepper-content>
            </v-stepper> --}}
            <validation-observer ref="form" v-slot="{ handleSubmit, invalid, reset, valid }">
                <v-form @reset.prevent="reset" @submit.prevent="handleSubmit(submit)" lazy-validation>
                    <v-card>
                        <v-card-title class="px-10">
                            {{ __('Please, fill the registration form correctly.') }}
                        </v-card-title>
                        <v-card-text>
                            <v-stepper v-model="step" vertical non-linear class="elevation-0">
                                <v-stepper-step editable 
                                    :complete="hasState('1') ? checkValidation('1') : false"
                                    :rules="hasState('1') ? [() => checkValidation('1')] : [() => true]"
                                    edit-icon="$complete"
                                    step="1"
                                    class="py-1"
                                    data-step="1"
                                >
                                    Name of the Baby
                                </v-stepper-step>
                            
                                <v-stepper-content step="1" data-step="1" class="my-0 py-0">
                                    <v-stepper-items>
                                        <input-text
                                            v-model="form.baby_name"
                                            rules="required|min:2|max:50"
                                            label="Name"
                                            vid="baby_name"
                                            counter="50"
                                            autocomplete
                                            :autofocus="hasState(1)"
                                            @keydown.enter="checkValidation('1') ? step++ : null"
                                        />
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
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
                                    data-step="2"
                                    class="py-1"
                                >
                                    Age of the baby
                                </v-stepper-step>
                            
                                <v-stepper-content step="2" data-step="2" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row>
                                            <v-col cols="6" class="py-0">
                                                <input-text
                                                    v-model="form.baby_operation_age"
                                                    rules="required|max:50"
                                                    label="Age during Operation"
                                                    vid="baby_operation_age"
                                                    autocomplete
                                                    @keydown.enter="checkValidation('2') ? step++ : null"
                                                />
                                            </v-col>
                                            <v-col cols="6" class="py-0">
                                                <input-text
                                                    v-model="form.baby_current_age"
                                                    rules="required|max:50"
                                                    label="Current Age"
                                                    vid="baby_current_age"
                                                    autocomplete
                                                    @keydown.enter="checkValidation('2') ? step++ : null"
                                                />
                                            </v-col>
                                        </v-row>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
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
                                    class="py-1"
                                    data-step="3"
                                >
                                    Name of father
                                </v-stepper-step>
                            
                                <v-stepper-content step="3" data-step="3" class="my-0 py-0">
                                    <v-stepper-items>
                                        <input-text
                                            v-model="form.father_name"
                                            rules="required|min:2|max:50"
                                            label="Father's Name"
                                            vid="father_name"
                                            counter="50"
                                            autocomplete
                                            @keydown.enter="checkValidation('3') ? step++ : null"
                                        />
                                    </v-stepper-items>
                                    <v-btn
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('3') ? !checkValidation('3') : true"
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
                                    class="py-1"
                                    data-step="4"
                                >
                                    Name of mother
                                </v-stepper-step>
                            
                                <v-stepper-content step="4" data-step="4" class="my-0 py-0">
                                    <v-stepper-items>
                                        <input-text
                                            v-model="form.mother_name"
                                            rules="required|min:2|max:50"
                                            label="Mother's Name"
                                            vid="mother_name"
                                            counter="50"
                                            autocomplete
                                            @keydown.enter="checkValidation('4') ? step++ : null"
                                        />
                                    </v-stepper-items>
                                    <v-btn
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
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
                                    class="py-1"
                                    data-step="5"
                                >
                                    Name of guardian
                                </v-stepper-step>
                            
                                <v-stepper-content step="5" data-step="5" class="my-0 py-0">
                                    <v-stepper-items>
                                        <input-text
                                            v-model="form.guardian_name"
                                            rules="required|min:2|max:50"
                                            label="Guardian's Name"
                                            vid="guardian_name"
                                            counter="50"
                                            autocomplete
                                            @keydown.enter="checkValidation('5') ? step++ : null"
                                        />
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
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
                                    data-step="6"
                                    class="py-1"
                                >
                                    Address
                                </v-stepper-step>
                            
                                <v-stepper-content step="6" data-step="6" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="justify-content-center">
                                            <v-col cols="6" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Address Type"
                                                    vid="address_type"
                                                    @keydown.enter="checkValidation('6') ? step++ : null"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.address.type"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                    >
                                                        <v-radio value="urban" label="Urban"></v-radio>
                                                        <v-radio value="rural" label="Rural"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                            </v-col>
                                        </v-row>
                                        <v-row>
                                            <v-col cols="6" class="py-0">
                                                <input-text
                                                    v-model="form.address.village"
                                                    rules="required|min:2|max:50"
                                                    label="Village/Road"
                                                    vid="address_village"
                                                    autocomplete
                                                    @keydown.enter="checkValidation('6') ? step++ : null"

                                                />
                                            </v-col>
                                            <v-col cols="6" class="py-0">
                                                <input-text
                                                    v-model="form.address.upazilla"
                                                    rules="required|min:2|max:50"
                                                    label="Upazilla"
                                                    vid="address_upazilla"
                                                    autocomplete
                                                    @keydown.enter="checkValidation('6') ? step++ : null"
                                                />
                                            </v-col>
                                            <v-col cols="6" class="py-0">
                                                <input-text
                                                    v-model="form.address.district"
                                                    rules="required|min:2|max:50"
                                                    label="District"
                                                    vid="address_district"
                                                    autocomplete
                                                    @keydown.enter="checkValidation('6') ? step++ : null"
                                                />
                                            </v-col>
                                            <v-col cols="6" class="py-0">
                                                <input-text
                                                    v-model="form.address.division"
                                                    rules="required|min:2|max:50"
                                                    label="Division"
                                                    vid="address_division"
                                                    autocomplete
                                                    @keydown.enter="checkValidation('6') ? step++ : null"
                                                />
                                            </v-col>
                                        </v-row>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
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
                                    data-step="7"
                                    class="py-1"
                                >
                                    Contact no(s)
                                </v-stepper-step>
                            
                                <v-stepper-content step="7" data-step="7" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row>
                                            <v-col cols="6" class="py-0">
                                                <input-text
                                                    v-model="form.first_cotact"
                                                    :rules="{required: true, regex:/^(?:\+88|88)?(01[3-9]\d{8})$/}"
                                                    label="First Contact"
                                                    vid="first_cotact"
                                                    autocomplete
                                                    @keydown.enter="checkValidation('7') ? step++ : null"
                                                />
                                            </v-col>
                                            <v-col cols="6" class="py-0">
                                                <input-text
                                                    v-model="form.alternate_cotact"
                                                    :rules="{regex:/^(?:\+88|88)?(01[3-9]\d{8})$/}"
                                                    label="Alternate Contact"
                                                    vid="alternate_cotact"
                                                    :data-optional="true"
                                                    autocomplete
                                                    @keydown.enter="checkValidation('7') ? step++ : null"
                                                />
                                            </v-col>
                                        </v-row>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
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
                                    class="py-1"
                                    data-step="8"
                                >
                                    Email
                                </v-stepper-step>
                            
                                <v-stepper-content step="8" data-step="8" class="my-0 py-0">
                                    <v-stepper-items>
                                        <input-email
                                            v-model="form.email"
                                            rules="required|email|email_exists"
                                            label="Email"
                                            vid="email"
                                            autocomplete
                                            :autofocus="hasState(8)"
                                            @keydown.enter="checkValidation('8') ? step++ : null"
                                            />
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('8') ? !checkValidation('8') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>
                                
                                <v-stepper-step editable 
                                    :complete="hasState('9') ? checkValidation('9') : false"
                                    :rules="hasState('9') ? [() => checkValidation('9')] : [() => true]"
                                    edit-icon="$complete"
                                    step="9"
                                    data-step="9"
                                    class="py-1"
                                    @keydown.enter="checkValidation('9') ? step++ : null"
                                >
                                    Consanguinity of marriage
                                </v-stepper-step>
                            
                                <v-stepper-content step="9" data-step="9" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="justify-content-center">
                                            <v-col cols="6" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Address Type"
                                                    vid="address_type"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.consanguineous_marriage"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                    >
                                                        <v-radio :value="true" label="Yes"></v-radio>
                                                        <v-radio :value="false" label="No"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                            </v-col>
                                        </v-row>
                                        <v-row v-if="form.consanguineous_marriage">
                                            <v-col cols="3">
                                                If yes,
                                            </v-col>
                                            <v-col cols="9" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Address Type"
                                                    vid="address_type"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.consanguinity"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                    >
                                                        <v-radio value="maternal" label="Cousin (Maternal)"></v-radio>
                                                        <v-radio value="paternal" label="Cousin (Paternal)"></v-radio>
                                                        <v-radio value="others" label="Others"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                            </v-col>
                                        </v-row>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('9') ? !checkValidation('9') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>
                                
                                <v-stepper-step editable 
                                    :complete="hasState('9') ? checkValidation('9') : false"
                                    :rules="hasState('9') ? [() => checkValidation('9')] : [() => true]"
                                    edit-icon="$complete"
                                    step="9"
                                    data-step="9"
                                    class="py-1"
                                >
                                    Family H/O  Cleft Lip/Cleft Palate in first degree relatives:
                                </v-stepper-step>
                            
                                <v-stepper-content step="10" data-step="10" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="justify-content-center">
                                            <v-col cols="6" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Family Cleft"
                                                    vid="family_cleft"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.family_cleft"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                    >
                                                        <v-radio :value="true" label="Yes"></v-radio>
                                                        <v-radio :value="false" label="No"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                            </v-col>
                                        </v-row>
                                        <v-row v-if="form.family_cleft">
                                            <v-col cols="3">
                                                If yes,
                                            </v-col>
                                            <v-col cols="10" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Cleft relative"
                                                    vid="cleft_relative"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.family_cleft_relatives"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                    >
                                                        <v-radio value="parents" label="Parents"></v-radio>
                                                        <v-radio value="offsprings" label="Offsprings"></v-radio>
                                                        <v-radio value="siblings" label="Siblings"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                            </v-col>
                                        </v-row>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('10') ? !checkValidation('10') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('11') ? checkValidation('11') : false"
                                    :rules="hasState('11') ? [() => checkValidation('11')] : [() => true]"
                                    edit-icon="$complete"
                                    step="11"
                                    data-step="11"
                                    class="py-1"
                                >
                                    H/O preconceptional folic acid supplementation:
                                </v-stepper-step>
                            
                                <v-stepper-content step="11" data-step="11" class="my-0 py-0">
                                    <v-stepper-items>
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Folic acid supplementation"
                                            vid="folic_acid_supplementation"
                                        >
                                            <v-radio-group 
                                                v-model="form.folic_acid_supplementation"
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('11') ? !checkValidation('11') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>
                                <v-stepper-step editable 
                                    :complete="hasState('12') ? checkValidation('12') : false"
                                    :rules="hasState('12') ? [() => checkValidation('12')] : [() => true]"
                                    edit-icon="$complete"
                                    step="12"
                                    data-step="12"
                                    class="py-1"
                                >
                                    Maternity Diet:
                                </v-stepper-step>
                            
                                <v-stepper-content step="12" data-step="12" class="my-0 py-0">
                                    <v-stepper-items>
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Maternity Diet"
                                            vid="maternity_diet"
                                        >
                                            <v-radio-group 
                                                v-model="form.maternity_diet"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                            >
                                                <v-radio value="true" label="Yes"></v-radio>
                                                <v-radio value="false" label="No"></v-radio>
                                            </v-radio-group>
                                        </validation-provider>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('12') ? !checkValidation('12') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>
                                
                                <h6 class="ml-8">Particulars of mother:</h6>
                                <v-stepper-step editable 
                                    :complete="hasState('13') ? checkValidation('13') : false"
                                    :rules="hasState('13') ? [() => checkValidation('13')] : [() => true]"
                                    edit-icon="$complete"
                                    step="13"
                                    data-step="13"
                                    class="py-1"
                                >
                                    Occupation:
                                </v-stepper-step>
                            
                                <v-stepper-content step="13" data-step="13" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="justify-content-center">
                                            <v-col cols="6" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Mother Occupation"
                                                    vid="mother_occupation"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.mother_occupation"
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
                                            </v-col>
                                        </v-row>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('13') ? !checkValidation('13') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>
                                <v-stepper-step editable 
                                    :complete="hasState('14') ? motherHabbitValidation : false"
                                    :rules="hasState('14') ? [() => motherHabbitValidation] : [() => true]"
                                    edit-icon="$complete"
                                    step="14"
                                    data-step="14"
                                    class="py-1"
                                >
                                    Personal habbit:
                                    <span v-if="hasState('12') && !motherHabbitValidation" >Choose at least one.</span>
                                </v-stepper-step>
                            
                                <v-stepper-content step="14" data-step="14" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="flex-wrap">
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_habbit"
                                                    label="Smoking"
                                                    vid="mother_habbit"
                                                    :data-optional="true"
                                                    value="Smoking"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="9" class="py-0" v-if="form.mother_habbit.includes('Smoking')">
                                                <v-row>
                                                    <v-col cols="6">
                                                        If smoking, number of cigarettes smoked per day:
                                                    </v-col>
                                                    <v-col cols="6">
                                                        <input-text 
                                                            v-model="form.number_of_cigerettes"
                                                            rules="required|numeric"
                                                            type="number"
                                                            label="Number of cigerettes"
                                                            vid="number_of_cigerettes"
                                                            hide-details
                                                        >
                                                        </input-text>
                                                    </v-col>
                                                </v-row>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_habbit"
                                                    label="Alcohol"
                                                    vid="mother_habbit"
                                                    :data-optional="true"
                                                    value="Alcohol"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_habbit"
                                                    label="Non-smoking tobacco"
                                                    vid="mother_habbit"
                                                    :data-optional="true"
                                                    value="Non-smoking"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_habbit"
                                                    label="Maternal exposed to tobacco smoking"
                                                    vid="mother_habbit"
                                                    :data-optional="true"
                                                    value="Exposed to Tobacco"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                        </v-row>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('14') ? !motherHabbitValidation : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>
                                <v-stepper-step editable 
                                    :complete="hasState('35') ? checkValidation('14') : false"
                                    :rules="hasState('14') ? [() => checkValidation('14')] : [() => true]"
                                    edit-icon="$complete"
                                    step="14"
                                    data-step="14"
                                    class="py-1"
                                >
                                    Congenital Anomaly:
                                </v-stepper-step>
                            
                                <v-stepper-content step="15" data-step="15" class="my-0 py-0">
                                    <v-stepper-items>
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Congenital Anomaly"
                                            vid="mother_congenital_anomaly"
                                        >
                                            <v-radio-group 
                                                v-model="form.mother_congenital_anomaly"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                            >
                                                <v-radio value="true" label="Yes"></v-radio>
                                                <v-radio value="false" label="No"></v-radio>
                                            </v-radio-group>
                                        </validation-provider>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('15') ? !checkValidation('15') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('16') && motherCoMorbiditiesValidation"
                                    :rules="hasState('16') ? [() => motherCoMorbiditiesValidation] : [() => true]"
                                    edit-icon="$complete"
                                    step="16"
                                    data-step="16"
                                    class="py-1"
                                >
                                    Co-morbidities:
                                    <span v-if="hasState('16') && !motherCoMorbiditiesValidation" >Field is required!</span>
                                </v-stepper-step>
                            
                                <v-stepper-content step="16" data-step="16" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="">
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_co_morbidities"
                                                    label="DM"
                                                    vid="mother_co_morbidities"
                                                    value="DM"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_co_morbidities"
                                                    label="HTN"
                                                    value="HTN"
                                                    vid="mother_co_morbidities"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_co_morbidities"
                                                    label="Asthma"
                                                    value="Asthma"
                                                    vid="mother_co_morbidities"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_co_morbidities"
                                                    label="TB"
                                                    value="TB"
                                                    vid="mother_co_morbidities"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_co_morbidities"
                                                    label="Maternity Warfarin (BMI during pregnancy > 29kg per Square)"
                                                    value="Obeisity"
                                                    vid="mother_co_morbidities"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_co_morbidities"
                                                    label="None"
                                                    value="None"
                                                    vid="mother_co_morbidities"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                        </v-row>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('16') && !motherCoMorbiditiesValidation"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('17') && motherMedicationsValidation"
                                    :rules="hasState('17') ? [() => motherMedicationsValidation] : [() => true]"
                                    edit-icon="$complete"
                                    step="17"
                                    data-step="17"
                                    class="py-1"
                                >
                                    Medications:
                                    <span v-if="hasState('17') && !motherMedicationsValidation" >Field is required!</span>
                                </v-stepper-step>
                            
                                <v-stepper-content step="17" data-step="17" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="flex-wrap">
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_medications"
                                                    label="Diazepam"
                                                    vid="mother_medications"
                                                    value="Diazepam"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_medications"
                                                    label="Phenobarbitone"
                                                    value="Phenobarbitone"
                                                    vid="mother_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_medications"
                                                    label="Phenytoin"
                                                    value="Phenytoin"
                                                    vid="mother_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_medications"
                                                    label="Lithium"
                                                    value="Lithium"
                                                    vid="mother_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_medications"
                                                    label="OCP"
                                                    value="OCP"
                                                    vid="mother_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_medications"
                                                    label="ACEI/ABR"
                                                    value="ACEI/ABR"
                                                    vid="mother_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_medications"
                                                    label="Retineric Acid"
                                                    value="Retineric Acid"
                                                    vid="mother_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_medications"
                                                    label="Ayurvedic/Unani"
                                                    value="Ayurvedic/Unani"
                                                    vid="mother_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_medications"
                                                    label="Homeopathy"
                                                    value="Homeopathy"
                                                    vid="mother_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_medications"
                                                    label="Thalidomide"
                                                    value="Thalidomide"
                                                    vid="mother_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_medications"
                                                    label="Vitamin A"
                                                    value="Vitamin A"
                                                    vid="mother_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_medications"
                                                    label="Valproic acid"
                                                    value="Valproic acid"
                                                    vid="mother_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_medications"
                                                    label="B–blocker"
                                                    value="B–blocker"
                                                    vid="mother_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_medications"
                                                    label="Folate antagonist"
                                                    value="Folate antagonist"
                                                    vid="mother_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_medications"
                                                    label="Trimethoprim"
                                                    value="Trimethoprim"
                                                    vid="mother_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_medications"
                                                    label="Sulfasalazine"
                                                    value="Sulfasalazine"
                                                    vid="mother_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_medications"
                                                    label="Nitrofurantion"
                                                    value="Nitrofurantion"
                                                    vid="mother_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_medications"
                                                    label="Ondansetron"
                                                    value="Ondansetron"
                                                    vid="mother_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_medications"
                                                    label="Isotretinoin"
                                                    value="Isotretinoin"
                                                    vid="mother_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_medications"
                                                    label="Warfarin"
                                                    value="Warfarin"
                                                    vid="mother_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_medications"
                                                    label="DES  (Diethylstilbesterl)"
                                                    value="DES  (Diethylstilbesterl)"
                                                    vid="mother_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.mother_medications"
                                                    label="None"
                                                    value="None"
                                                    vid="mother_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                        </v-row>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('17') && !motherMedicationsValidation"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('18') && checkValidation('18')"
                                    :rules="hasState('18') ? [() => checkValidation('18')] : [() => true]"
                                    edit-icon="$complete"
                                    step="18"
                                    data-step="18"
                                    class="py-1"
                                >
                                    Exposure to insecticides and other toxic agents in antenatal period:
                                </v-stepper-step>
                                <v-stepper-content step="18" data-step="18" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="justify-content-center">
                                            <v-col cols="4" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Exposure to insecticides"
                                                    vid="mother_exposure_to_insecticides"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.mother_exposure_to_insecticides"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                    >
                                                        <v-radio :value="true" label="Yes"></v-radio>
                                                        <v-radio :value="false" label="No"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                            </v-col>
                                            <v-col cols="9" class="py-0" v-if="form.mother_exposure_to_insecticides">
                                                <v-row>
                                                    <v-col cols="6">
                                                        If Yes, Mention the name:
                                                    </v-col>
                                                    <v-col cols="6">
                                                        <input-text 
                                                            v-model="form.mother_exposure_to_insecticides_name"
                                                            rules="required|min:2|max:50"
                                                            label="Insecticide's Name"
                                                            vid="mother_exposure_to_insecticides_name"
                                                            :counter="50"
                                                        >
                                                        </input-text>
                                                    </v-col>
                                                </v-row>
                                            </v-col>
                                        </v-row>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('18') ? !checkValidation('18') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('19') && checkValidation('19')"
                                    :rules="[() => !hasState('19') || (hasState('19') && checkValidation('19'))]"
                                    edit-icon="$complete"
                                    step="19"
                                    data-step="19"
                                    class="py-1"
                                >
                                    Obstetric variables:
                                    <span v-if="hasState('19') && !checkValidation('19')" >Field is required!</span>
                                </v-stepper-step>
                            
                                <v-stepper-content step="19" data-step="19" class="my-0 py-0">
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
                                                        v-model="form.number_of_pregnancies"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                    >
                                                        <v-radio value="1" label="1"></v-radio>
                                                        <v-radio value="2" label="2"></v-radio>
                                                        <v-radio value="3+" label="&geq;3"></v-radio>
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
                                                        v-model="form.ho_pregnancy_loss"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                    >
                                                        <v-radio value="0" label="0"></v-radio>
                                                        <v-radio value="1" label="1"></v-radio>
                                                        <v-radio value="2+" label="&GreaterEqual;2"></v-radio>
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
                                                        v-model="form.ho_pregnancy_terimination"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                    >
                                                        <v-radio value="0" label="0"></v-radio>
                                                        <v-radio value="1" label="1"></v-radio>
                                                        <v-radio value="2+" label="&GreaterEqual;2"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                            </v-col>
                                        </v-row>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('19') && !checkValidation('19')"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('20') ? checkValidation('20') : false"
                                    :rules="hasState('20') ? [() => checkValidation('20')] : [() => true]"
                                    edit-icon="$complete"
                                    step="20"
                                    data-step="20"
                                    class="py-1"
                                >
                                    Condition of Alive babies:
                                </v-stepper-step>
                            
                                <v-stepper-content step="20" data-step="20" class="my-0 py-0">
                                    <v-stepper-items>
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Condition of Alive Babies"
                                            vid="condition_of_alive_babies"
                                        >
                                            <v-radio-group 
                                                v-model="form.condition_of_alive_babies"
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('20') ? !checkValidation('20') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <h6 class="ml-8">Details of pregnancy including:</h6>
                                <v-stepper-step editable 
                                    :complete="hasState('21') ? checkValidation('21') && waterContaminationTypeValidation : false"
                                    :rules="hasState('21') ? [() => checkValidation('21') && waterContaminationTypeValidation] : [() => true]"
                                    edit-icon="$complete"
                                    step="21"
                                    data-step="21"
                                    class="py-1"
                                >
                                    Contamination of drinking water:
                                    <span v-if="!waterContaminationTypeValidation">Please, select contamination type.</span>
                                </v-stepper-step>
                            
                                <v-stepper-content step="21" data-step="21" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="">
                                            <v-col cols="3" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Contamination of water"
                                                    vid="contamination_drinking_water"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.contamination_drinking_water"
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
                                            <v-col cols="9" class="py-0" v-if="form.contamination_drinking_water">
                                                <v-row>
                                                    If yes,
                                                </v-row>
                                                <v-row class="">
                                                    <v-col cols="4" class="py-0">
                                                        <v-checkbox
                                                            v-model="form.contamination_drinking_water_type"
                                                            label="Lead"
                                                            vid="contamination_drinking_water_type"
                                                            value="Lead"
                                                            :data-optional="true"
                                                            class="my-0"
                                                        >
                                                        </v-checkbox>
                                                    </v-col>
                                                    <v-col cols="4" class="py-0">
                                                        <v-checkbox
                                                            v-model="form.contamination_drinking_water_type"
                                                            label="Arsenic"
                                                            value="Arsenic"
                                                            vid="contamination_drinking_water_type"
                                                            :data-optional="true"
                                                            class="my-0"
                                                        >
                                                        </v-checkbox>
                                                    </v-col>
                                                    <v-col cols="4" class="py-0">
                                                        <v-checkbox
                                                            v-model="form.contamination_drinking_water_type"
                                                            label="Clorine"
                                                            value="Clorine"
                                                            vid="contamination_drinking_water_type"
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('21') ? !(checkValidation('21') && waterContaminationTypeValidation) : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('22') ? checkValidation('22') : false"
                                    :rules="hasState('22') ? [() => checkValidation('22')] : [() => true]"
                                    edit-icon="$complete"
                                    step="22"
                                    data-step="22"
                                    class="py-1"
                                >
                                    Hazardous waste site:
                                </v-stepper-step>
                            
                                <v-stepper-content step="22" data-step="22" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="justify-content-center">
                                            <v-col cols="4" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Hazardous waste site"
                                                    vid="hazardous_waste_site"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.hazardous_waste_site"
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('22') ? !checkValidation('22') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('23') ? checkValidation('23') && airPollutionTypeValidation : false"
                                    :rules="hasState('23') ? [() => checkValidation('23') && airPollutionTypeValidation] : [() => true]"
                                    edit-icon="$complete"
                                    step="23"
                                    data-step="23"
                                    class="py-1"
                                >
                                    Air Pollution:
                                    <span v-if="!airPollutionTypeValidation">Please, select contamination type.</span>
                                </v-stepper-step>
                            
                                <v-stepper-content step="23" data-step="23" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="">
                                            <v-col cols="3" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Air Pollution"
                                                    vid="air_pollution"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.air_pollution"
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
                                            <v-col cols="9" class="py-0" v-if="form.air_pollution">
                                                <v-row>
                                                    If yes,
                                                </v-row>
                                                <v-row class="">
                                                    <v-col cols="3" class="py-0">
                                                        <v-checkbox
                                                            v-model="form.air_pollution_type"
                                                            label="CO"
                                                            vid="air_pollution_type"
                                                            value="CO"
                                                            :data-optional="true"
                                                            class="my-0"
                                                        >
                                                        </v-checkbox>
                                                    </v-col>
                                                    <v-col cols="3" class="py-0">
                                                        <v-checkbox
                                                            v-model="form.air_pollution_type"
                                                            value="NO2"
                                                            vid="air_pollution_type"
                                                            :data-optional="true"
                                                            class="my-0"
                                                        >
                                                            <template v-slot:label>
                                                                <span>NO<sub>2</sub></span>
                                                            </template>
                                                        </v-checkbox>
                                                    </v-col>
                                                    <v-col cols="3" class="py-0">
                                                        <v-checkbox
                                                            v-model="form.air_pollution_type"
                                                            value="SO2"
                                                            vid="air_pollution_type"
                                                            :data-optional="true"
                                                            class="my-0"
                                                        >
                                                            <template v-slot:label>
                                                                <span>SO<sub>2</sub></span>
                                                            </template>
                                                        </v-checkbox>
                                                    </v-col>
                                                    <v-col cols="3" class="py-0">
                                                        <v-checkbox
                                                            v-model="form.air_pollution_type"
                                                            label="PB"
                                                            vid="air_pollution_type"
                                                            value="PB"
                                                            :data-optional="true"
                                                            class="my-0"
                                                        >
                                                        </v-checkbox>
                                                    </v-col>
                                                    <v-col cols="3" class="py-0">
                                                        <v-checkbox
                                                            v-model="form.air_pollution_type"
                                                            value="O3"
                                                            vid="air_pollution_type"
                                                            :data-optional="true"
                                                            class="my-0"
                                                        >
                                                            <template v-slot:label>
                                                                <span>O<sub>3</sub></span>
                                                            </template>
                                                        </v-checkbox>
                                                    </v-col>
                                                    <v-col cols="3" class="py-0">
                                                        <v-checkbox
                                                            v-model="form.air_pollution_type"
                                                            label="Benzene"
                                                            vid="air_pollution_type"
                                                            value="Benzene"
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('23') ? !(checkValidation('23') && airPollutionTypeValidation) : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('24') ? checkValidation('24') : false"
                                    :rules="hasState('24') ? [() => checkValidation('24')] : [() => true]"
                                    edit-icon="$complete"
                                    step="24"
                                    data-step="24"
                                    class="py-1"
                                >
                                    Pesiticides Expose:
                                </v-stepper-step>
                            
                                <v-stepper-content step="24" data-step="24" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="justify-content-center">
                                            <v-col cols="4" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Pesiticides Expose"
                                                    vid="pasticides_expose"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.pasticides_expose"
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('24') ? !checkValidation('24') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('25') ? checkValidation('25') : false"
                                    :rules="hasState('25') ? [() => checkValidation('25')] : [() => true]"
                                    edit-icon="$complete"
                                    step="25"
                                    data-step="25"
                                    class="py-1"
                                >
                                    Physical activities during pregnancy:
                                </v-stepper-step>
                            
                                <v-stepper-content step="25" data-step="25" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="justify-content-center">
                                            <v-col cols="12" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Physical activities during pregnancy"
                                                    vid="physical_activities_during_pregnancy"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.physical_activities_during_pregnancy"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                        class="my-0"
                                                    >
                                                        <v-radio value="Rest" label="At Rest"></v-radio>
                                                        <v-radio value="Moderate" label="Mild to moderate (no heavy weight lifting) "></v-radio>
                                                        <v-radio value="Severe" label="Moderate to Severe (usual daily activities including heavy weight lifting)"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                            </v-col>
                                        </v-row>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('25') ? !checkValidation('25') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('26') ? checkValidation('26') && intercourseTimeValidation : false"
                                    :rules="hasState('26') ? [() => checkValidation('26') && intercourseTimeValidation] : [() => true]"
                                    edit-icon="$complete"
                                    step="26"
                                    data-step="26"
                                    class="py-1"
                                >
                                    Sexual intercourse:
                                    <span v-if="!intercourseTimeValidation">Please, select a time phase.</span>
                                </v-stepper-step>
                            
                                <v-stepper-content step="26" data-step="26" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="justify-content-end">
                                            <v-col cols="3">(i) During Pregnancy</v-col>
                                            <v-col cols="9" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Sex during Pregnancy"
                                                    vid="intercourse_during_pregnancy"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.intercourse_during_pregnancy"
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
                                            <v-col cols="11" class="py-0">
                                                <v-row v-if="form.intercourse_during_pregnancy">
                                                    <v-col cols="3" class="py-0">
                                                        If yes, when
                                                    </v-col>
                                                    <v-col cols="9" class="py-0">
                                                        <v-row>
                                                            <v-col cols="3" class="py-0">
                                                                <v-checkbox
                                                                    v-model="form.intercourse_during_pregnancy_time_phase"
                                                                    value="first_trimester"
                                                                    :data-optional="true"
                                                                    class="my-0"
                                                                >
                                                                    <template v-slot:label>
                                                                        <span>1<sup>st</sup> trimester</span>
                                                                    </template>
                                                                </v-checkbox>
                                                            </v-col>
                                                            <v-col cols="3" class="py-0">
                                                                <v-checkbox
                                                                    v-model="form.intercourse_during_pregnancy_time_phase"
                                                                    value="second_trimester"
                                                                    :data-optional="true"
                                                                    class="my-0"
                                                                >
                                                                    <template v-slot:label>
                                                                        <span>2<sup>nd</sup> trimester</span>
                                                                    </template>
                                                                </v-checkbox>
                                                            </v-col>
                                                            <v-col cols="3" class="py-0">
                                                                <v-checkbox
                                                                    v-model="form.intercourse_during_pregnancy_time_phase"
                                                                    value="third_trimester"
                                                                    :data-optional="true"
                                                                    class="my-0"
                                                                >
                                                                    <template v-slot:label>
                                                                        <span>3<sup>rd</sup> trimester</span>
                                                                    </template>
                                                                </v-checkbox>
                                                            </v-col>
                                                        </v-row>
                                                    </v-col>
                                                    <v-col cols="3" class="py-0">
                                                        Was there anything like
                                                    </v-col>
                                                    <v-col cols="9" class="py-0">
                                                        <v-row>
                                                            <v-col cols="3" class="py-0">
                                                                <v-checkbox
                                                                    v-model="form.intercourse_during_pregnancy_unusual_symptom"
                                                                    value="unusual_bleeding"
                                                                    label="Unusual Bleeding"
                                                                    :data-optional="true"
                                                                    class="my-0"
                                                                >
                                                                </v-checkbox>
                                                            </v-col>
                                                            <v-col cols="3" class="py-0">
                                                                <v-checkbox
                                                                    v-model="form.intercourse_during_pregnancy_unusual_symptom"
                                                                    value="unusual_pain"
                                                                    label="Unusual Pain"
                                                                    :data-optional="true"
                                                                    class="my-0"
                                                                >
                                                                </v-checkbox>
                                                            </v-col>
                                                            <v-col cols="3" class="py-0">
                                                                <v-checkbox
                                                                    v-model="form.intercourse_during_pregnancy_unusual_symptom"
                                                                    value="unusual_discharge"
                                                                    label="Unusual Discharge"
                                                                    :data-optional="true"
                                                                    class="my-0"
                                                                >
                                                                </v-checkbox>
                                                            </v-col>
                                                            <v-col cols="3" class="py-0">
                                                                <v-checkbox
                                                                    v-model="form.intercourse_during_pregnancy_unusual_symptom"
                                                                    value="ohters"
                                                                    label="Others"
                                                                    :data-optional="true"
                                                                    class="my-0"
                                                                >
                                                                </v-checkbox>
                                                            </v-col>
                                                        </v-row>
                                                    </v-col>
                                                </v-row>  
                                            </v-col>                                                                                      
                                        </v-row>
                                        
                                        <v-row class="justify-content-end">
                                            <v-col cols="3" class="py-0">(ii) Post conception: resume of coitus:</v-col>
                                            <v-col cols="9" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Post concept intercourse"
                                                    vid="intercourse_during_post_conception"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.intercourse_during_post_conception"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                        class="my-0"
                                                    >
                                                        <v-radio value="less_than_one_month" label="< 1 months"></v-radio>
                                                        <v-radio value="one_to_three_month" label="1-3 months"></v-radio>
                                                        <v-radio value="more_than_three_month" label="> 3 months"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                                {{-- <v-row>
                                                    <v-col cols="4" class="py-0">
                                                        <v-checkbox
                                                            v-model="form.intercourse_during_post_conception"
                                                            value="less_than_one_month"
                                                            label="< 1 months"
                                                            :data-optional="true"
                                                            class="my-0"
                                                        >
                                                        </v-checkbox>
                                                    </v-col>
                                                    <v-col cols="4" class="py-0">
                                                        <v-checkbox
                                                            v-model="form.intercourse_during_post_conception"
                                                            value="one_to_three_month"
                                                            label="1-3 months"
                                                            :data-optional="true"
                                                            class="my-0"
                                                        >
                                                        </v-checkbox>
                                                    </v-col>
                                                    <v-col cols="4" class="py-0">
                                                        <v-checkbox
                                                            v-model="form.intercourse_during_post_conception"
                                                            value="more_than_three_month"
                                                            label="> 3 months"
                                                            :data-optional="true"
                                                            class="my-0"
                                                        >
                                                        </v-checkbox>
                                                    </v-col>
                                                </v-row> --}}
                                            </v-col>
                                        </v-row>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('26') ? !(checkValidation('26') && intercourseTimeValidation) : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('27') ? checkValidation('27') && stressTypeValidation : false"
                                    :rules="hasState('27') ? [() => checkValidation('27') && stressTypeValidation] : [() => true]"
                                    edit-icon="$complete"
                                    step="27"
                                    data-step="27"
                                    class="py-1"
                                >
                                    Stress:
                                    <span v-if="!stressTypeValidation">Please, select reason of stress.</span>
                                </v-stepper-step>
                            
                                <v-stepper-content step="27" data-step="27" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="">
                                            <v-col cols="3" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Stress"
                                                    vid="stress"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.stress"
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
                                            <v-col cols="9" class="py-0" v-if="form.stress">
                                                <v-row>
                                                    If yes,
                                                </v-row>
                                                
                                                <v-row class="">
                                                    <v-col cols="3" class="py-0">
                                                        <v-checkbox
                                                            v-model="form.stress_type"
                                                            label="Death of Close ONe"
                                                            vid="stress_type"
                                                            value="Death of Close ONe"
                                                            :data-optional="true"
                                                            class="my-0"
                                                        >
                                                        </v-checkbox>
                                                    </v-col>
                                                    <v-col cols="3" class="py-0">
                                                        <v-checkbox
                                                            v-model="form.stress_type"
                                                            value="Seperation or Divorce"
                                                            label="Seperation/ Divorce"
                                                            vid="stress_type"
                                                            :data-optional="true"
                                                            class="my-0"
                                                        >
                                                        </v-checkbox>
                                                    </v-col>
                                                    <v-col cols="3" class="py-0">
                                                        <v-checkbox
                                                            v-model="form.stress_type"
                                                            value="Loss of Job"
                                                            label="Loss of Job"
                                                            vid="stress_type"
                                                            :data-optional="true"
                                                            class="my-0"
                                                        >
                                                        </v-checkbox>
                                                    </v-col>
                                                    <v-col cols="3" class="py-0">
                                                        <v-checkbox
                                                            v-model="form.stress_type"
                                                            label="Familial difficulties"
                                                            vid="stress_type"
                                                            value="Familial difficulties"
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('27') ? !(checkValidation('27') && stressTypeValidation) : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('28') ? checkValidation('28') : false"
                                    :rules="hasState('28') ? [() => checkValidation('28')] : [() => true]"
                                    edit-icon="$complete"
                                    step="28"
                                    data-step="28"
                                    class="py-1"
                                >
                                    Gestetional Diabetes Mellitus:
                                </v-stepper-step>
                            
                                <v-stepper-content step="28" data-step="28" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="justify-content-center">
                                            <v-col cols="4" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Gestetional Diabetes Mellitus"
                                                    vid="gestetional_diabetes_mellitus"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.gestetional_diabetes_mellitus"
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('28') ? !checkValidation('28') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('29') ? checkValidation('29') && feverPeriodValidation : false"
                                    :rules="hasState('29') ? [() => checkValidation('29') && feverPeriodValidation] : [() => true]"
                                    edit-icon="$complete"
                                    step="29"
                                    data-step="29"
                                    class="py-1"
                                >
                                    Fever:
                                    <span v-if="!feverPeriodValidation">Please, select fever period.</span>
                                </v-stepper-step>
                            
                                <v-stepper-content step="29" data-step="29" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="">
                                            <v-col cols="3" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Fever"
                                                    vid="fever"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.fever"
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
                                            <v-col cols="9" class="py-0" v-if="form.fever">
                                                <v-row>
                                                    If yes when
                                                </v-row>
                                                <v-row>
                                                    <v-col md="4" class="py-0">
                                                        <v-checkbox
                                                            v-model="form.fever_period"
                                                            value="first_trimester"
                                                            :data-optional="true"
                                                            class="my-0"
                                                        >
                                                            <template v-slot:label>
                                                                <span>1<sup>st</sup> trimester</span>
                                                            </template>
                                                        </v-checkbox>
                                                    </v-col>
                                                    <v-col md="4" class="py-0">
                                                        <v-checkbox
                                                            v-model="form.fever_period"
                                                            value="second_trimester"
                                                            :data-optional="true"
                                                            class="my-0"
                                                        >
                                                            <template v-slot:label>
                                                                <span>2<sup>nd</sup> trimester</span>
                                                            </template>
                                                        </v-checkbox>
                                                    </v-col>
                                                    <v-col md="4" class="py-0">
                                                        <v-checkbox
                                                            v-model="form.fever_period"
                                                            value="third_trimester"
                                                            :data-optional="true"
                                                            class="my-0"
                                                        >
                                                            <template v-slot:label>
                                                                <span>3<sup>rd</sup> trimester</span>
                                                            </template>
                                                        </v-checkbox>
                                                    </v-col>
                                                </v-row>
                                            </v-col>
                                        </v-row>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('29') ? !(checkValidation('29') && feverPeriodValidation) : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('30') ? checkValidation('30') && traumaPeriodValidation : false"
                                    :rules="hasState('30') ? [() => checkValidation('30') && traumaPeriodValidation] : [() => true]"
                                    edit-icon="$complete"
                                    step="30"
                                    data-step="30"
                                    class="py-1"
                                >
                                    Accidents/trauma to abdomen during pregnancy:
                                    <span v-if="!traumaPeriodValidation">Please, select trauma period.</span>
                                </v-stepper-step>
                            
                                <v-stepper-content step="30" data-step="30" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="">
                                            <v-col cols="3" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Abdominal Trauma"
                                                    vid="abdominal_trauma"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.abdominal_trauma"
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
                                            <v-col cols="9" class="py-0" v-if="form.abdominal_trauma">
                                                <v-row>
                                                    If yes, at which time of pregnancy:
                                                </v-row>
                                                <v-row>
                                                    <v-col md="4" class="py-0">
                                                        <v-checkbox
                                                            v-model="form.abdominal_trauma_period"
                                                            value="first_trimester"
                                                            :data-optional="true"
                                                            class="my-0"
                                                        >
                                                            <template v-slot:label>
                                                                <span>1<sup>st</sup> trimester</span>
                                                            </template>
                                                        </v-checkbox>
                                                    </v-col>
                                                    <v-col md="4" class="py-0">
                                                        <v-checkbox
                                                            v-model="form.abdominal_trauma_period"
                                                            value="second_trimester"
                                                            :data-optional="true"
                                                            class="my-0"
                                                        >
                                                            <template v-slot:label>
                                                                <span>2<sup>nd</sup> trimester</span>
                                                            </template>
                                                        </v-checkbox>
                                                    </v-col>
                                                    <v-col md="4" class="py-0">
                                                        <v-checkbox
                                                            v-model="form.abdominal_trauma_period"
                                                            value="third_trimester"
                                                            :data-optional="true"
                                                            class="my-0"
                                                        >
                                                            <template v-slot:label>
                                                                <span>3<sup>rd</sup> trimester</span>
                                                            </template>
                                                        </v-checkbox>
                                                    </v-col>
                                                </v-row>
                                            </v-col>
                                        </v-row>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('30') ? !(checkValidation('30') && traumaPeriodValidation) : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('31') ? checkValidation('31') : false"
                                    :rules="hasState('31') ? [() => checkValidation('31')] : [() => true]"
                                    edit-icon="$complete"
                                    step="31"
                                    data-step="31"
                                    class="py-1"
                                >
                                    Time of rupture of amniotic membranes:
                                </v-stepper-step>
                            
                                <v-stepper-content step="31" data-step="31" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="justify-content-center">
                                            <v-col cols="12" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Amniotic membranes rupture"
                                                    vid="amniotic_membranes_rupture"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.amniotic_membranes_rupture"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                        class="my-0"
                                                    >
                                                        <v-radio value="Pre-term" label="Pre-term (> 3 – 10 weeks before EDD)"></v-radio>
                                                        <v-radio value="Term" label="Pre-term (EDD +- 2 weeks)"></v-radio>
                                                        <v-radio value="Post-term" label="Pre-term (> 2 weeks after EDD)"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                            </v-col>
                                        </v-row>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('31') ? !checkValidation('31') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('32') ? checkValidation('32') : false"
                                    :rules="hasState('32') ? [() => checkValidation('32')] : [() => true]"
                                    edit-icon="$complete"
                                    step="32"
                                    data-step="32"
                                    class="py-1"
                                >
                                    Amount of amniotic fluid:
                                </v-stepper-step>
                            
                                <v-stepper-content step="32" data-step="32" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="justify-content-center">
                                            <v-col cols="12" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Amniotic fluid amount"
                                                    vid="amniotic_fluid_amount"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.amniotic_fluid_amount"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                        class="my-0"
                                                    >
                                                        <v-radio value="Normal" label="Normal"></v-radio>
                                                        <v-radio value="Oligohydramnios" label="Oligohydramnios"></v-radio>
                                                        <v-radio value="Polyhydramnios" label="Polyhydramnios"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                            </v-col>
                                        </v-row>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('32') ? !checkValidation('32') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('33') ? checkValidation('33') : false"
                                    :rules="hasState('33') ? [() => checkValidation('33')] : [() => true]"
                                    edit-icon="$complete"
                                    step="33"
                                    data-step="33"
                                    class="py-1"
                                >
                                    Early amniotic fluid leak:
                                </v-stepper-step>
                            
                                <v-stepper-content step="33" data-step="33" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="justify-content-center">
                                            <v-col cols="12" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Early amniotic fluid leak"
                                                    vid="early_amniotic_fluid_leak"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.early_amniotic_fluid_leak"
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('33') ? !checkValidation('33') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <h6 class="ml-8">Particulars of Father:</h6>
                                <v-stepper-step editable 
                                    :complete="hasState('34') ? checkValidation('34') : false"
                                    :rules="hasState('34') ? [() => checkValidation('34')] : [() => true]"
                                    edit-icon="$complete"
                                    step="34"
                                    data-step="34"
                                    class="py-1"
                                >
                                    Occupation:
                                </v-stepper-step>
                            
                                <v-stepper-content step="34" data-step="34" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="justify-content-center">
                                            <v-col cols="6" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Father Occupation"
                                                    vid="father_occupation"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.father_occupation"
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('34') ? !checkValidation('34') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('35') ? fatherHabbitValidation : false"
                                    :rules="hasState('35') ? [() => fatherHabbitValidation] : [() => true]"
                                    edit-icon="$complete"
                                    step="35"
                                    data-step="35"
                                    class="py-1"
                                >
                                    Personal habbit:
                                    <span v-if="hasState('33') && !fatherHabbitValidation" >Choose at least one.</span>
                                </v-stepper-step>
                            
                                <v-stepper-content step="35" data-step="35" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="flex-wrap">
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.father_habbit"
                                                    label="Smoking"
                                                    vid="father_habbit"
                                                    :data-optional="true"
                                                    value="Smoking"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.father_habbit"
                                                    label="Alcohol"
                                                    vid="father_habbit"
                                                    :data-optional="true"
                                                    value="Alcohol"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.father_habbit"
                                                    label="Non-smoking tobacco"
                                                    vid="father_habbit"
                                                    :data-optional="true"
                                                    value="Non-smoking"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                        </v-row>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('35') ? !fatherHabbitValidation : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>
                                <v-stepper-step editable 
                                    :complete="hasState('36') ? checkValidation('36') : false"
                                    :rules="hasState('36') ? [() => checkValidation('36')] : [() => true]"
                                    edit-icon="$complete"
                                    step="36"
                                    data-step="36"
                                    class="py-1"
                                >
                                    Congenital Anomaly:
                                </v-stepper-step>
                            
                                <v-stepper-content step="36" data-step="36" class="my-0 py-0">
                                    <v-stepper-items>
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Congenital Anomaly"
                                            vid="father_congenital_anomaly"
                                        >
                                            <v-radio-group 
                                                v-model="form.father_congenital_anomaly"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                            >
                                                <v-radio value="true" label="Yes"></v-radio>
                                                <v-radio value="false" label="No"></v-radio>
                                            </v-radio-group>
                                        </validation-provider>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('36') ? !checkValidation('36') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('37') && fatherCoMorbiditiesValidation"
                                    :rules="hasState('37') ? [() => fatherCoMorbiditiesValidation] : [() => true]"
                                    edit-icon="$complete"
                                    step="37"
                                    data-step="37"
                                    class="py-1"
                                >
                                    Co-morbidities:
                                    <span v-if="hasState('37') && !fatherCoMorbiditiesValidation" >Field is required!</span>
                                </v-stepper-step>
                            
                                <v-stepper-content step="37" data-step="37" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="">
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.father_co_morbidities"
                                                    label="DM"
                                                    vid="father_co_morbidities"
                                                    value="DM"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.father_co_morbidities"
                                                    label="HTN"
                                                    value="HTN"
                                                    vid="father_co_morbidities"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.father_co_morbidities"
                                                    label="Asthma"
                                                    value="Asthma"
                                                    vid="father_co_morbidities"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.father_co_morbidities"
                                                    label="TB"
                                                    value="TB"
                                                    vid="father_co_morbidities"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.father_co_morbidities"
                                                    label="Epilepsy"
                                                    value="Epilepsy"
                                                    vid="father_co_morbidities"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.father_co_morbidities"
                                                    label="None"
                                                    value="None"
                                                    vid="father_co_morbidities"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                        </v-row>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('37') && !fatherCoMorbiditiesValidation"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('38') && fatherMedicationsValidation"
                                    :rules="hasState('38') ? [() => fatherMedicationsValidation] : [() => true]"
                                    edit-icon="$complete"
                                    step="38"
                                    data-step="38"
                                    class="py-1"
                                >
                                    Medications:
                                    <span v-if="hasState('38') && !fatherMedicationsValidation" >Field is required!</span>
                                </v-stepper-step>
                            
                                <v-stepper-content step="38" data-step="38" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row class="flex-wrap">
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.father_medications"
                                                    label="Diazepam"
                                                    vid="father_medications"
                                                    value="Diazepam"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.father_medications"
                                                    label="Phenobarbitone"
                                                    value="Phenobarbitone"
                                                    vid="father_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.father_medications"
                                                    label="Phenytoin"
                                                    value="Phenytoin"
                                                    vid="father_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.father_medications"
                                                    label="Lithium"
                                                    value="Lithium"
                                                    vid="father_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.father_medications"
                                                    label="OCP"
                                                    value="OCP"
                                                    vid="father_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.father_medications"
                                                    label="ACEI/ABR"
                                                    value="ACEI/ABR"
                                                    vid="father_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.father_medications"
                                                    label="Ayurvedic/Unani"
                                                    value="Ayurvedic/Unani"
                                                    vid="father_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.father_medications"
                                                    label="Homeopathy"
                                                    value="Homeopathy"
                                                    vid="father_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                            <v-col cols="4" class="py-0">
                                                <v-checkbox
                                                    v-model="form.father_medications"
                                                    label="None"
                                                    value="None"
                                                    vid="father_medications"
                                                    :data-optional="true"
                                                >
                                                </v-checkbox>
                                            </v-col>
                                        </v-row>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('38') && !fatherMedicationsValidation"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <h6 class="ml-8">Particulars of Delivery:</h6>
                                <v-stepper-step editable 
                                    :complete="hasState('39') ? checkValidation('39') : false"
                                    :rules="hasState('39') ? [() => checkValidation('39')] : [() => true]"
                                    edit-icon="$complete"
                                    step="39"
                                    data-step="39"
                                    class="py-1"
                                >
                                    Mode of delivering:
                                </v-stepper-step>
                            
                                <v-stepper-content step="39" data-step="39" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row>
                                            <v-col cols="4">(i) Delivery mode:</v-col>
                                            <v-col cols="8" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Delivery mode"
                                                    vid="delivery_mode"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.delivery_mode"
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
                                        
                                        <v-row>
                                            <v-col cols="4">(ii) Delivery type:</v-col>
                                            <v-col cols="8" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Delivery type"
                                                    vid="delivery_type"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.delivery_type"
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

                                        <v-row>
                                            <v-col cols="4">(iii) Membrane rupture:</v-col>
                                            <v-col cols="8" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Delivery membranes rupture type"
                                                    vid="delivery_membranes_rupture_type"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.delivery_membranes_rupture_type"
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

                                        <v-row>
                                            <v-col cols="4">(iv) Time between rupture of  membranes and delivery:</v-col>
                                            <v-col cols="8" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Delivery delay after membranes rupture"
                                                    vid="delivery_time_after_membranes_rupture"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.delivery_time_after_membranes_rupture"
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('39') ? !checkValidation('39') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <h6 class="ml-8">Particulars of newborn:(from pre-operative photos where available and added information from examination)</h6>
                                <v-stepper-step editable 
                                    :complete="hasState('40') ? checkValidation('40') : false"
                                    :rules="hasState('40') ? [() => checkValidation('40')] : [() => true]"
                                    edit-icon="$complete"
                                    step="40"
                                    data-step="40"
                                    class="py-1"
                                >
                                    Age of mother at this/affected pregnancy:
                                </v-stepper-step>
                            
                                <v-stepper-content step="40" data-step="40" class="my-0 py-0">
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
                                                <v-radio value="less_or_equal_20_years" label="&leq; 20 years"></v-radio>
                                                <v-radio value="21_to_25_years" label="21-25 years"></v-radio>
                                                <v-radio value="26_to_30_years" label="26-30 years"></v-radio>
                                                <v-radio value="greater_or_equal_31_years" label="&geq; 31 years"></v-radio>
                                            </v-radio-group>
                                        </validation-provider>                                                
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('40') ? !checkValidation('40') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('41') ? checkValidation('41') : false"
                                    :rules="hasState('41') ? [() => checkValidation('41')] : [() => true]"
                                    edit-icon="$complete"
                                    step="41"
                                    data-step="41"
                                    class="py-1"
                                >
                                    Age of mother at this/affected pregnancy:
                                </v-stepper-step>
                            
                                <v-stepper-content step="41" data-step="41" class="my-0 py-0">
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
                                                <v-radio value="less_or_equal_20_years" label="&leq; 20 years"></v-radio>
                                                <v-radio value="21_to_30_years" label="21-30 years"></v-radio>
                                                <v-radio value="31_to_40_years" label="31-40 years"></v-radio>
                                                <v-radio value="greater_or_equal_41_years" label="&geq; 41 years"></v-radio>
                                            </v-radio-group>
                                        </validation-provider>                                                
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('41') ? !checkValidation('41') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('42') ? checkValidation('42') : false"
                                    :rules="hasState('42') ? [() => checkValidation('42')] : [() => true]"
                                    edit-icon="$complete"
                                    step="42"
                                    data-step="42"
                                    class="py-1"
                                >
                                    Duration of pregnancy at delivery:
                                </v-stepper-step>
                            
                                <v-stepper-content step="42" data-step="42" class="my-0 py-0">
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('42') ? !checkValidation('42') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('43') && checkValidation('43')"
                                    :rules="hasState('43') ? [() => checkValidation('43')] : [() => true]"
                                    edit-icon="$complete"
                                    step="43"
                                    data-step="43"
                                    class="py-1"
                                >
                                    Condition of baby at birth:
                                </v-stepper-step>
                                <v-stepper-content step="43" data-step="43" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row>
                                            <validation-provider
                                                rules="required"
                                                v-slot="{ errors, valid, dirty }"
                                                name="Condition of baby at birth"
                                                vid="new_born_baby_condition_at_birth"
                                            >
                                                <v-radio-group 
                                                    v-model="form.new_born_baby_condition_at_birth"
                                                    row
                                                    :error-messages="errors"
                                                    :success="valid && dirty"
                                                    class="my-0"
                                                >
                                                    <v-radio value="Healthy" label="Healthy"></v-radio>
                                                    <v-radio value="Not Healthy" label="Not Healthy"></v-radio>
                                                </v-radio-group>
                                            </validation-provider>
                                        </v-row>
                                        <v-row v-if="form.new_born_baby_condition_at_birth === 'Not Healthy'">
                                            <v-col cols="6" class="py-0">
                                                If not healthy, Mention the Disease or abnormality:
                                            </v-col>
                                            <v-col cols="6" class="py-0">
                                                <input-text 
                                                    v-model="form.new_born_baby_condition_at_birth_disease"
                                                    rules="required|min:2|max:50"
                                                    label="Disease Name"
                                                    vid="new_born_baby_condition_at_birth_disease"
                                                    :counter="50"
                                                >
                                                </input-text>
                                            </v-col>
                                        </v-row>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('43') ? !checkValidation('43') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('44') ? checkValidation('44') : false"
                                    :rules="hasState('44') ? [() => checkValidation('44')] : [() => true]"
                                    edit-icon="$complete"
                                    step="44"
                                    data-step="44"
                                    class="py-1"
                                >
                                    Sex:
                                </v-stepper-step>
                            
                                <v-stepper-content step="44" data-step="44" class="my-0 py-0">
                                    <v-stepper-items>
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Sex"
                                            vid="new_born_baby_sex_orientation"
                                        >
                                            <v-radio-group 
                                                v-model="form.new_born_baby_sex_orientation"
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('44') ? !checkValidation('44') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('45') ? checkValidation('45') : false"
                                    :rules="hasState('45') ? [() => checkValidation('45')] : [() => true]"
                                    edit-icon="$complete"
                                    step="45"
                                    data-step="45"
                                    class="py-1"
                                >
                                    Weight:
                                </v-stepper-step>
                            
                                <v-stepper-content step="45" data-step="45" class="my-0 py-0">
                                    <v-stepper-items>
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Sex"
                                            vid="new_born_baby_weight"
                                        >
                                            <v-radio-group 
                                                v-model="form.new_born_baby_weight"
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('45') ? !checkValidation('45') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('46') ? checkValidation('46') : false"
                                    :rules="hasState('46') ? [() => checkValidation('46')] : [() => true]"
                                    edit-icon="$complete"
                                    step="46"
                                    data-step="46"
                                    class="py-1"
                                >
                                    APGAR score:
                                </v-stepper-step>
                            
                                <v-stepper-content step="46" data-step="46" class="my-0 py-0">
                                    <v-stepper-items>
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Sex"
                                            vid="new_born_baby_apgar_score"
                                        >
                                            <v-radio-group 
                                                v-model="form.new_born_baby_apgar_score"
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('46') ? !checkValidation('46') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('47') ? checkValidation('47') : false"
                                    :rules="hasState('47') ? [() => checkValidation('47')] : [() => true]"
                                    edit-icon="$complete"
                                    step="47"
                                    data-step="47"
                                    class="py-1"
                                >
                                    Congenital craniofacial cleft:
                                </v-stepper-step>
                            
                                <v-stepper-content step="47" data-step="47" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row>
                                            <v-col md="4" class="py-0">Diagnosis</v-col>
                                            <v-col md="8" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Sex"
                                                    vid="new_born_baby_congenital_craniofacial_cleft"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.new_born_baby_congenital_craniofacial_cleft"
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('47') ? !checkValidation('47') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('48') && checkValidation('48')"
                                    :rules="[() => !hasState('48') || (hasState('48') && checkValidation('48'))]"
                                    edit-icon="$complete"
                                    step="48"
                                    data-step="48"
                                    class="py-1"
                                >
                                    The clinical deformity to be defined using Tessier classification where relevant:
                                    <span v-if="hasState('48') && !checkValidation('48')" >Field is required!</span>
                                </v-stepper-step>
                            
                                <v-stepper-content step="48" data-step="48" class="my-0 py-0">
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('48') && !checkValidation('48')"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('49') ? checkValidation('49') && congenitalAnomaliesInvolvedSystemValidation : false"
                                    :rules="hasState('49') ? [() => checkValidation('49') && congenitalAnomaliesInvolvedSystemValidation] : [() => true]"
                                    edit-icon="$complete"
                                    step="49"
                                    data-step="49"
                                    class="py-1"
                                >
                                    Other congenital anomalies:
                                    <span v-if="!congenitalAnomaliesInvolvedSystemValidation">Please, select involved system</span>
                                </v-stepper-step>
                            
                                <v-stepper-content step="49" data-step="49" class="my-0 py-0">
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('49') ? !(checkValidation('49') && congenitalAnomaliesInvolvedSystemValidation) : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('50') ? checkValidation('50'): false"
                                    :rules="hasState('50') ? [() => checkValidation('50')] : [() => true]"
                                    edit-icon="$complete"
                                    step="50"
                                    data-step="50"
                                    class="py-1"
                                >
                                    Any syndrome suspected:
                                </v-stepper-step>
                            
                                <v-stepper-content step="50" data-step="50" class="my-0 py-0">
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('50') ? !checkValidation('50') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('51') ? checkValidation('51'): false"
                                    :rules="hasState('51') ? [() => checkValidation('51')] : [() => true]"
                                    edit-icon="$complete"
                                    step="51"
                                    data-step="51"
                                    class="py-1"
                                >
                                    Eyes:
                                </v-stepper-step>
                            
                                <v-stepper-content step="51" data-step="51" class="my-0 py-0">
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('51') ? !checkValidation('51') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('52') ? checkValidation('52') && ringConstrictionsInvolvingAreaValidation : false"
                                    :rules="hasState('52') ? [() => checkValidation('52') && ringConstrictionsInvolvingAreaValidation] : [() => true]"
                                    edit-icon="$complete"
                                    step="52"
                                    data-step="52"
                                    class="py-1"
                                >
                                    Ring constrictions, carefully looking at subtle constrictions (to be photographed with contralateral site as comparison):
                                    <span v-if="!ringConstrictionsInvolvingAreaValidation">Please, select involved system</span>
                                </v-stepper-step>
                            
                                <v-stepper-content step="52" data-step="52" class="my-0 py-0">
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('52') ? !(checkValidation('52') && ringConstrictionsInvolvingAreaValidation) : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('53') ? checkValidation('53') : false"
                                    :rules="hasState('53') ? [() => checkValidation('53')] : [() => true]"
                                    edit-icon="$complete"
                                    step="53"
                                    data-step="53"
                                    class="py-1"
                                >
                                    Nasal airway obstruction (tested by tissue paper test, occluding the nose if possible and nasal anemometry, if available):
                                </v-stepper-step>
                            
                                <v-stepper-content step="53" data-step="53" class="my-0 py-0">
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('53') ? !checkValidation('53') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('54') ? checkValidation('54') : false"
                                    :rules="hasState('54') ? [() => checkValidation('54')] : [() => true]"
                                    edit-icon="$complete"
                                    step="54"
                                    data-step="54"
                                    class="py-1"
                                >
                                    Palatal abnormality:
                                </v-stepper-step>
                            
                                <v-stepper-content step="54" data-step="54" class="my-0 py-0">
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('54') ? !checkValidation('54') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('55') ? checkValidation('55') : false"
                                    :rules="hasState('55') ? [() => checkValidation('55')] : [() => true]"
                                    edit-icon="$complete"
                                    step="55"
                                    data-step="55"
                                    class="py-1"
                                >
                                    Cleft lip:
                                </v-stepper-step>
                            
                                <v-stepper-content step="55" data-step="55" class="my-0 py-0">
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('55') ? !checkValidation('55') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('56') ? evaluationOfImagingValidation : false"
                                    :rules="hasState('56') ? [() => evaluationOfImagingValidation] : [() => true]"
                                    edit-icon="$complete"
                                    step="56"
                                    data-step="56"
                                    class="py-1"
                                >
                                    Evaludation of Imaging(Original):
                                    <span v-if="hasState('56') && !evaluationOfImagingValidation">Please, select involved system</span>
                                </v-stepper-step>
                            
                                <v-stepper-content step="56" data-step="56" class="my-0 py-0">
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('56') ? !evaluationOfImagingValidation : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>
                                
                                <v-stepper-step editable 
                                    :complete="hasState('57') ? checkValidation('57') : false"
                                    :rules="hasState('57') ? [() => checkValidation('57')] : [() => true]"
                                    edit-icon="$complete"
                                    step="57"
                                    data-step="57"
                                    class="py-1"
                                >
                                    Treatment Pathway:
                                </v-stepper-step>
                            
                                <v-stepper-content step="57" data-step="57" class="my-0 py-0">
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
                                                    vid="treatment_pathway_dissection_type"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.treatment_pathway_dissection_type"
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
                                                    vid="treatment_pathway_dissection_eyelid_surgery"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.treatment_pathway_dissection_eyelid_surgery"
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
                                                    vid="treatment_pathway_dissection_choanal_atresia_surgery"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.treatment_pathway_dissection_choanal_atresia_surgery"
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
                                                    vid="treatment_pathway_dissection_eyelid_surgery"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.treatment_pathway_dissection_palate_surgery"
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
                                                    vid="treatment_pathway_dissection_alveolar_cleft_surgery"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.treatment_pathway_dissection_alveolar_cleft_surgery"
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('57') ? !checkValidation('57') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('58') ? orthodonticCareValidation : false"
                                    :rules="hasState('58') ? [() => orthodonticCareValidation] : [() => true]"
                                    edit-icon="$complete"
                                    step="58"
                                    data-step="58"
                                    class="py-1"
                                >
                                    Orthodontic care:
                                    <span v-if="hasState('58') && !orthodonticCareValidation">Please, select an option.</span>
                                </v-stepper-step>
                            
                                <v-stepper-content step="58" data-step="58" class="my-0 py-0">
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('58') ? !orthodonticCareValidation : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('59') ? checkValidation('59') : false"
                                    :rules="hasState('59') ? [() => checkValidation('59')] : [() => true]"
                                    edit-icon="$complete"
                                    step="59"
                                    data-step="59"
                                    class="py-1"
                                >
                                    Speech-language Development:
                                </v-stepper-step>
                            
                                <v-stepper-content step="59" data-step="59" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row>
                                            <v-col md="3" class="py-0">
                                            </v-col>
                                            <v-col md="9" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Eyelid surgery"
                                                    vid="speech_language_development"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.speech_language_development"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                        class="my-0"
                                                    >
                                                        <v-radio value="Intact" label="Intact"></v-radio>
                                                        <v-radio value="Delayed" label="Delayed"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                            </v-col>
                                            <v-col md="3" class="py-0">
                                                Single Word: 
                                            </v-col>
                                            <v-col md="9" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Single Word"
                                                    vid="speech_language_development_single_word"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.speech_language_development_single_word"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                        class="my-0"
                                                    >
                                                        <v-radio value="9 months" label="9 months"></v-radio>
                                                        <v-radio value="12 months" label="12 months"></v-radio>
                                                        <v-radio value="18 months" label="18 months"></v-radio>
                                                        <v-radio value=">18 months" label=">18 months"></v-radio>
                                                        <v-radio value="Not yet" label="Not yet"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                            </v-col>
                                            <v-col md="3" class="py-0">
                                                Receiptive Skills: 
                                            </v-col>
                                            <v-col md="9" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Single Word"
                                                    vid="speech_language_development_receiptive_skills"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.speech_language_development_receiptive_skills"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                        class="my-0"
                                                    >
                                                        <v-radio value="1 keyword" label="1 keyword"></v-radio>
                                                        <v-radio value="2 keywords" label="2 keywords"></v-radio>
                                                        <v-radio value="3 keywords" label="3 keywords"></v-radio>
                                                        <v-radio value=">3 keywords" label=">3 keywords"></v-radio>
                                                        <v-radio value="Not yet" label="Not yet"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                            </v-col>
                                            <v-col md="3" class="py-0">Articulation:</v-col>
                                            <v-col md="9" class="py-0">
                                                <v-row>
                                                    <v-col md="4" class="py-0">Bilabial soubds:</v-col>
                                                    <v-col md="8" class="py-0">
                                                        <v-row>
                                                            <v-col cols="3" class="py-0">
                                                                (প) |p|: 
                                                            </v-col>
                                                            <v-col cols="9" class="py-0">
                                                                <validation-provider
                                                                    rules="required"
                                                                    v-slot="{ errors, valid, dirty }"
                                                                    name="Eyelid surgery"
                                                                    vid="speech_language_development_p"
                                                                >
                                                                    <v-radio-group 
                                                                        v-model="form.speech_language_development_p"
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
                                                                (ব) |b|: 
                                                            </v-col>
                                                            <v-col cols="9" class="py-0">
                                                                <validation-provider
                                                                    rules="required"
                                                                    v-slot="{ errors, valid, dirty }"
                                                                    name="Eyelid surgery"
                                                                    vid="speech_language_development_b"
                                                                >
                                                                    <v-radio-group 
                                                                        v-model="form.speech_language_development_b"
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
                                                                    vid="speech_language_development_m"
                                                                >
                                                                    <v-radio-group 
                                                                        v-model="form.speech_language_development_m"
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
                                                </v-row>
                                                <v-row>
                                                    <v-col md="4" class="py-0">Palatal soubds:</v-col>
                                                    <v-col md="8" class="py-0">
                                                        <v-row>
                                                            <v-col cols="3" class="py-0">
                                                                (চ) |c|: 
                                                            </v-col>
                                                            <v-col cols="9" class="py-0">
                                                                <validation-provider
                                                                    rules="required"
                                                                    v-slot="{ errors, valid, dirty }"
                                                                    name="Eyelid surgery"
                                                                    vid="speech_language_development_c"
                                                                >
                                                                    <v-radio-group 
                                                                        v-model="form.speech_language_development_c"
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
                                                                (জ) |j|: 
                                                            </v-col>
                                                            <v-col cols="9" class="py-0">
                                                                <validation-provider
                                                                    rules="required"
                                                                    v-slot="{ errors, valid, dirty }"
                                                                    name="Eyelid surgery"
                                                                    vid="speech_language_development_j"
                                                                >
                                                                    <v-radio-group 
                                                                        v-model="form.speech_language_development_j"
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
                                                </v-row>
                                                <v-row>
                                                    <v-col md="4" class="py-0">Velar soubds:</v-col>
                                                    <v-col md="8" class="py-0">
                                                        <v-row>
                                                            <v-col cols="3" class="py-0">
                                                                (ক) |k|: 
                                                            </v-col>
                                                            <v-col cols="9" class="py-0">
                                                                <validation-provider
                                                                    rules="required"
                                                                    v-slot="{ errors, valid, dirty }"
                                                                    name="Eyelid surgery"
                                                                    vid="speech_language_development_k"
                                                                >
                                                                    <v-radio-group 
                                                                        v-model="form.speech_language_development_k"
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
                                                                (গ) |g|: 
                                                            </v-col>
                                                            <v-col cols="9" class="py-0">
                                                                <validation-provider
                                                                    rules="required"
                                                                    v-slot="{ errors, valid, dirty }"
                                                                    name="Eyelid surgery"
                                                                    vid="speech_language_development_g"
                                                                >
                                                                    <v-radio-group 
                                                                        v-model="form.speech_language_development_g"
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
                                                </v-row>
                                                <v-row>
                                                    <v-col md="4" class="py-0">Fricative soubds:</v-col>
                                                    <v-col md="8" class="py-0">
                                                        <v-row>
                                                            <v-col cols="3" class="py-0">
                                                                (ফ) |f|: 
                                                            </v-col>
                                                            <v-col cols="9" class="py-0">
                                                                <validation-provider
                                                                    rules="required"
                                                                    v-slot="{ errors, valid, dirty }"
                                                                    name="Eyelid surgery"
                                                                    vid="speech_language_development_f"
                                                                >
                                                                    <v-radio-group 
                                                                        v-model="form.speech_language_development_f"
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
                                                                (ভ) |v|: 
                                                            </v-col>
                                                            <v-col cols="9" class="py-0">
                                                                <validation-provider
                                                                    rules="required"
                                                                    v-slot="{ errors, valid, dirty }"
                                                                    name="Eyelid surgery"
                                                                    vid="speech_language_development_v"
                                                                >
                                                                    <v-radio-group 
                                                                        v-model="form.speech_language_development_v"
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
                                                                    vid="speech_language_development_S"
                                                                >
                                                                    <v-radio-group 
                                                                        v-model="form.speech_language_development_S"
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
                                                                (স) |s|: 
                                                            </v-col>
                                                            <v-col cols="9" class="py-0">
                                                                <validation-provider
                                                                    rules="required"
                                                                    v-slot="{ errors, valid, dirty }"
                                                                    name="Eyelid surgery"
                                                                    vid="speech_language_development_s"
                                                                >
                                                                    <v-radio-group 
                                                                        v-model="form.speech_language_development_s"
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
                                                </v-row>
                                                <v-row>
                                                    <v-col md="4" class="py-0">Phonation:</v-col>
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
                                                                    vid="speech_language_development_a"
                                                                >
                                                                    <v-radio-group 
                                                                        v-model="form.speech_language_development_a"
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
                                                                    vid="speech_language_development_i"
                                                                >
                                                                    <v-radio-group 
                                                                        v-model="form.speech_language_development_i"
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
                                                                    vid="speech_language_development_u"
                                                                >
                                                                    <v-radio-group 
                                                                        v-model="form.speech_language_development_u"
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
                                                </v-row>
                                            </v-col>
                                            <v-col md="3" class="py-0">Nasality:</v-col>
                                            <v-col cols="9" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Nasality"
                                                    vid="speech_language_development_nasality"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.speech_language_development_nasality"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                        class="my-0"
                                                    >
                                                        <v-radio :value="true" label="Yes"></v-radio>
                                                        <v-radio :value="false" label="No"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                                <v-row v-if="form.speech_language_development_nasality">
                                                    <v-col md="3" class="py-0">
                                                        If yes,
                                                    </v-col>
                                                    <v-col md="9" class="py-0">
                                                        <validation-provider
                                                            rules="required"
                                                            v-slot="{ errors, valid, dirty }"
                                                            name="Nasality type"
                                                            vid="speech_language_development_nasality_type"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.cleft_lip_type"
                                                                row
                                                                :error-messages="errors"
                                                                :success="valid && dirty"
                                                                class="my-0"
                                                            >
                                                                <v-radio value="Hyper Nasal" label="Hyper Nasal"></v-radio>
                                                                <v-radio value="Hypo Nasal" label="Hypo Nasal"></v-radio>
                                                                <v-radio value="Mixed Nasal" label="Mixed Nasal"></v-radio>
                                                                <v-radio value="Cul-de-Sac" label="Cul-de-Sac"></v-radio>
                                                            </v-radio-group>
                                                        </validation-provider>
                                                    </v-col>
                                                </v-row>
                                            </v-col>
                                            <v-col md="3" class="py-0">Facial Grimace:</v-col>
                                            <v-col cols="9" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Facial Grimace"
                                                    vid="speech_language_development_facial_girmace"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.speech_language_development_facial_girmace"
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
                                            <v-col md="3" class="py-0">Articulation:</v-col>
                                            <v-col cols="9" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Facial Grimace"
                                                    vid="speech_language_development_articulation"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.speech_language_development_articulation"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                        class="my-0"
                                                    >
                                                        <v-radio value="Intelligible" label="Intelligible"></v-radio>
                                                        <v-radio value="Unintelligible" label="Unintelligible"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                            </v-col>
                                            <v-col md="3" class="py-0">VPI:</v-col>
                                            <v-col cols="9" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="VPI"
                                                    vid="speech_language_development_vpi"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.speech_language_development_vpi"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                        class="my-0"
                                                    >
                                                        <v-radio :value="true" label="Yes"></v-radio>
                                                        <v-radio :value="false" label="No"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                                <v-row v-if="form.speech_language_development_vpi">
                                                    <v-col md="3" class="py-0">
                                                        If yes,
                                                    </v-col>
                                                    <v-col md="9" class="py-0">
                                                        <v-row>
                                                            <v-col md="3" class="py-0">
                                                                Lateral videofluroscopy:
                                                            </v-col>
                                                            <v-col md="9" class="py-0">
                                                                <validation-provider
                                                                    rules="required"
                                                                    v-slot="{ errors, valid, dirty }"
                                                                    name="Nasality type"
                                                                    vid="speech_language_development_vpi_videofluroscopy"
                                                                >
                                                                    <v-radio-group 
                                                                        v-model="form.speech_language_development_vpi_videofluroscopy"
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
                                                            <v-col md="3" class="py-0">
                                                                Nasoendoscopy:
                                                            </v-col>
                                                            <v-col md="9" class="py-0">
                                                                <validation-provider
                                                                    rules="required"
                                                                    v-slot="{ errors, valid, dirty }"
                                                                    name="Nasality type"
                                                                    vid="speech_language_development_vpi_nasoendoscopy"
                                                                >
                                                                    <v-radio-group 
                                                                        v-model="form.speech_language_development_vpi_nasoendoscopy"
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
                                                </v-row>
                                            </v-col>
                                            <v-col md="3" class="py-0">Surgery for VPI:</v-col>
                                            <v-col cols="9" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Surgery for VPI"
                                                    vid="speech_language_development_vpi_surgery"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.speech_language_development_vpi_surgery"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                        class="my-0"
                                                    >
                                                        <v-radio :value="true" label="Yes"></v-radio>
                                                        <v-radio :value="false" label="No"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                                <v-row v-if="form.speech_language_development_vpi_surgery">
                                                    <v-col md="3" class="py-0">
                                                        If yes,
                                                    </v-col>
                                                    <v-col md="9" class="py-0">
                                                        <validation-provider
                                                            rules="required"
                                                            v-slot="{ errors, valid, dirty }"
                                                            name="Nasality type"
                                                            vid="speech_language_development_vpi_surgery_type"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.speech_language_development_vpi_surgery_type"
                                                                row
                                                                :error-messages="errors"
                                                                :success="valid && dirty"
                                                                class="my-0"
                                                            >
                                                                <v-radio value="Buccinator flap" label="Buccinator flap"></v-radio>
                                                                <v-radio value="FAM flap" label="FAM flap"></v-radio>
                                                                <v-radio value="Hynsepharyngoplasty" label="Hynsepharyngoplasty"></v-radio>
                                                                <v-radio value="PPAP" label="PPAP"></v-radio>
                                                                <v-radio value="Redo palatoplasty" label="Redo palatoplasty"></v-radio>
                                                            </v-radio-group>
                                                        </validation-provider>
                                                    </v-col>
                                                </v-row>
                                            </v-col>
                                        </v-row>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('59') ? !checkValidation('59') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('60') ? checkValidation('60') : false"
                                    :rules="hasState('60') ? [() => checkValidation('60')] : [() => true]"
                                    edit-icon="$complete"
                                    step="60"
                                    data-step="60"
                                    class="py-1"
                                >
                                    Hearing:
                                </v-stepper-step>
                            
                                <v-stepper-content step="60" data-step="60" class="my-0 py-0">
                                    <v-stepper-items>
                                        <v-row>
                                            <v-col md="4" class="py-0">
                                                Response By Calling Name
                                            </v-col>
                                            <v-col md="8" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Response By Calling Name"
                                                    vid="hearing_development_response_calling_by_name"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.hearing_development_response_calling_by_name"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                        class="my-0"
                                                    >
                                                        <v-radio value="Intact" label="Intact"></v-radio>
                                                        <v-radio value="Delayed" label="Delayed"></v-radio>
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
                                                            vid="hearing_development_response_by_a"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.hearing_development_response_by_a"
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
                                                            vid="hearing_development_response_by_i"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.hearing_development_response_by_i"
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
                                                            vid="hearing_development_response_by_u"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.hearing_development_response_by_u"
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
                                                            vid="hearing_development_response_by_m"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.hearing_development_response_by_m"
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
                                                        (স) |s|: 
                                                    </v-col>
                                                    <v-col cols="9" class="py-0">
                                                        <validation-provider
                                                            rules="required"
                                                            v-slot="{ errors, valid, dirty }"
                                                            name="Eyelid surgery"
                                                            vid="hearing_development_response_by_s"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.hearing_development_response_by_s"
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
                                                            vid="hearing_development_response_by_S"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.hearing_development_response_by_S"
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
                                                            vid="hearing_development_test_pta"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.hearing_development_test_pta"
                                                                row
                                                                :error-messages="errors"
                                                                :success="valid && dirty"
                                                                class="my-0"
                                                            >
                                                                <v-radio :value="true" label="Yes"></v-radio>
                                                                <v-radio :value="false" label="No"></v-radio>
                                                            </v-radio-group>
                                                        </validation-provider>
                                                        <v-row v-if="form.hearing_development_test_pta">
                                                            <v-col class="py-0">
                                                                <validation-provider
                                                                    rules="required"
                                                                    v-slot="{ errors, valid, dirty }"
                                                                    name="Response By Calling Name"
                                                                    vid="hearing_development_test_pta_report"
                                                                >
                                                                    <v-radio-group 
                                                                        v-model="form.hearing_development_test_pta_report"
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
                                                            <v-col class="py-0" v-if="form.hearing_development_test_pta_report === 'Abnormal'">
                                                                <input-text 
                                                                    v-model="form.hearing_development_test_pta_abnormality_type"
                                                                    rules="required|min:2|max:50"
                                                                    label="Abnormality type"
                                                                    vid="hearing_development_test_pta_abnormality_type"
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
                                                            vid="hearing_development_test_pta"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.hearing_development_test_abr"
                                                                row
                                                                :error-messages="errors"
                                                                :success="valid && dirty"
                                                                class="my-0"
                                                            >
                                                                <v-radio :value="true" label="Yes"></v-radio>
                                                                <v-radio :value="false" label="No"></v-radio>
                                                            </v-radio-group>
                                                        </validation-provider>
                                                        <v-row v-if="form.hearing_development_test_abr">
                                                            <v-col class="py-0">
                                                                <validation-provider
                                                                    rules="required"
                                                                    v-slot="{ errors, valid, dirty }"
                                                                    name="Response By Calling Name"
                                                                    vid="hearing_development_test_abr_report"
                                                                >
                                                                    <v-radio-group 
                                                                        v-model="form.hearing_development_test_abr_report"
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
                                                            <v-col class="py-0" v-if="form.hearing_development_test_abr_report === 'Abnormal'">
                                                                <input-text 
                                                                    v-model="form.hearing_development_test_abr_abnormality_type"
                                                                    rules="required|min:2|max:50"
                                                                    label="Abnormality type"
                                                                    vid="hearing_development_test_abr_abnormality_type"
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
                                                            vid="hearing_development_test_srt"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.hearing_development_test_srt"
                                                                row
                                                                :error-messages="errors"
                                                                :success="valid && dirty"
                                                                class="my-0"
                                                            >
                                                                <v-radio :value="true" label="Yes"></v-radio>
                                                                <v-radio :value="false" label="No"></v-radio>
                                                            </v-radio-group>
                                                        </validation-provider>
                                                        <v-row v-if="form.hearing_development_test_srt">
                                                            <v-col class="py-0">
                                                                <validation-provider
                                                                    rules="required"
                                                                    v-slot="{ errors, valid, dirty }"
                                                                    name="Response By Calling Name"
                                                                    vid="hearing_development_test_srt_report"
                                                                >
                                                                    <v-radio-group 
                                                                        v-model="form.hearing_development_test_srt_report"
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
                                                            <v-col class="py-0" v-if="form.hearing_development_test_srt_report === 'Abnormal'">
                                                                <input-text 
                                                                    v-model="form.hearing_development_test_srt_abnormality_type"
                                                                    rules="required|min:2|max:50"
                                                                    label="Abnormality type"
                                                                    vid="hearing_development_test_srt_abnormality_type"
                                                                    :counter="50"
                                                                >
                                                                </input-text>
                                                            </v-col>
                                                        </v-row>
                                                    </v-col>
                                                </v-row>
                                                <v-row>
                                                    <v-col md="4" class="py-0">
                                                       Tympanometry):
                                                    </v-col>
                                                    <v-col md="8" class="py-0">
                                                        <validation-provider
                                                            rules="required"
                                                            v-slot="{ errors, valid, dirty }"
                                                            name="Response By Calling Name"
                                                            vid="hearing_development_test_tympanometry"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.hearing_development_test_tympanometry"
                                                                row
                                                                :error-messages="errors"
                                                                :success="valid && dirty"
                                                                class="my-0"
                                                            >
                                                                <v-radio :value="true" label="Yes"></v-radio>
                                                                <v-radio :value="false" label="No"></v-radio>
                                                            </v-radio-group>
                                                        </validation-provider>
                                                        <v-row v-if="form.hearing_development_test_tympanometry">
                                                            <v-col class="py-0">
                                                                <validation-provider
                                                                    rules="required"
                                                                    v-slot="{ errors, valid, dirty }"
                                                                    name="Response By Calling Name"
                                                                    vid="hearing_development_test_tympanometry_report"
                                                                >
                                                                    <v-radio-group 
                                                                        v-model="form.hearing_development_test_tympanometry_report"
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
                                                            <v-col class="py-0" v-if="form.hearing_development_test_tympanometry_report === 'Abnormal'">
                                                                <input-text 
                                                                    v-model="form.hearing_development_test_tympanometry_abnormality_type"
                                                                    rules="required|min:2|max:50"
                                                                    label="Abnormality type"
                                                                    vid="hearing_development_test_tympanometry_abnormality_type"
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
                                                            vid="hearing_development_test_play_audiometry"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.hearing_development_test_play_audiometry"
                                                                row
                                                                :error-messages="errors"
                                                                :success="valid && dirty"
                                                                class="my-0"
                                                            >
                                                                <v-radio :value="true" label="Yes"></v-radio>
                                                                <v-radio :value="false" label="No"></v-radio>
                                                            </v-radio-group>
                                                        </validation-provider>
                                                        <v-row v-if="form.hearing_development_test_play_audiometry">
                                                            <v-col class="py-0">
                                                                <validation-provider
                                                                    rules="required"
                                                                    v-slot="{ errors, valid, dirty }"
                                                                    name="Response By Calling Name"
                                                                    vid="hearing_development_test_play_audiometry_report"
                                                                >
                                                                    <v-radio-group 
                                                                        v-model="form.hearing_development_test_play_audiometry_report"
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
                                                            <v-col class="py-0" v-if="form.hearing_development_test_play_audiometry_report === 'Abnormal'">
                                                                <input-text 
                                                                    v-model="form.hearing_development_test_play_audiometry_abnormality_type"
                                                                    rules="required|min:2|max:50"
                                                                    label="Abnormality type"
                                                                    vid="hearing_development_test_play_audiometry_abnormality_type"
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
                                                            vid="hearing_development_test_boa"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.hearing_development_test_boa"
                                                                row
                                                                :error-messages="errors"
                                                                :success="valid && dirty"
                                                                class="my-0"
                                                            >
                                                                <v-radio :value="true" label="Yes"></v-radio>
                                                                <v-radio :value="false" label="No"></v-radio>
                                                            </v-radio-group>
                                                        </validation-provider>
                                                        <v-row v-if="form.hearing_development_test_boa">
                                                            <v-col class="py-0">
                                                                <validation-provider
                                                                    rules="required"
                                                                    v-slot="{ errors, valid, dirty }"
                                                                    name="Response By Calling Name"
                                                                    vid="hearing_development_test_boa_report"
                                                                >
                                                                    <v-radio-group 
                                                                        v-model="form.hearing_development_test_boa_report"
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
                                                            <v-col class="py-0" v-if="form.hearing_development_test_boa_report === 'Abnormal'">
                                                                <input-text 
                                                                    v-model="form.hearing_development_test_boa_abnormality_type"
                                                                    rules="required|min:2|max:50"
                                                                    label="Abnormality type"
                                                                    vid="hearing_development_test_boa_abnormality_type"
                                                                    :counter="50"
                                                                >
                                                                </input-text>
                                                            </v-col>
                                                        </v-row>
                                                    </v-col>
                                                </v-row>
                                            </v-col>
                                        </v-row>
                                    </v-stepper-items>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('60') ? !checkValidation('60') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>      
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('61') ? checkValidation('61') : false"
                                    :rules="hasState('61') ? [() => checkValidation('61')] : [() => true]"
                                    edit-icon="$complete"
                                    step="61"
                                    data-step="61"
                                    class="py-1"
                                >
                                    Outcome:
                                </v-stepper-step>
                            
                                <v-stepper-content step="61" data-step="61" class="my-0 py-0">
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
                                                    vid="outcome_standard_photographic_views"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.outcome_standard_photographic_views"
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
                                                    vid="outcome_video_speech_recordings"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.outcome_video_speech_recordings"
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
                                                    vid="outcome_vision_test"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.outcome_vision_test"
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
                                                    vid="outcome_nasal_airway_evaluation"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.outcome_nasal_airway_evaluation"
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
                                                    v-model="form.outcome_educational_occupational_attainments"
                                                    rules="required|min:2|max:50"
                                                    label="Educational Occupational attainments"
                                                    vid="outcome_educational_occupational_attainments"
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
                                                    vid="outcome_marital_status"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.outcome_marital_status"
                                                        row
                                                        :error-messages="errors"
                                                        :success="valid && dirty"
                                                        class="my-0"
                                                    >
                                                        <v-radio value="Single" label="Single"></v-radio>
                                                        <v-radio value="Married" label="Married"></v-radio>
                                                    </v-radio-group>
                                                </validation-provider>
                                                <v-row v-if="form.outcome_marital_status === 'Married'">
                                                    <v-col md="4" class="py-0">
                                                        If married:
                                                    </v-col>
                                                    <v-col md="8" class="py-0">
                                                        <v-row>
                                                            <v-col cols="12" class="py-0">
                                                                <input-text 
                                                                    v-model="form.outcome_marital_status_child"
                                                                    rules="min:1|numeric"
                                                                    label="Number of child"
                                                                    vid="outcome_marital_status_child"
                                                                    :data-optional="true"
                                                                >
                                                                </input-text>
                                                            </v-col>
                                                            <v-col cols="12" class="py-0">
                                                                <input-text
                                                                    v-model="form.outcome_marital_status_abnormal_child"
                                                                    rules="min:1|numeric"
                                                                    label="Number of abnormal child"
                                                                    vid="outcome_marital_status_abnormal_child"
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
                                                            vid="outcome_parents_concern_and_review_appearance"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.outcome_parents_concern_and_review_appearance"
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
                                                            vid="outcome_parents_concern_and_review_speech"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.outcome_parents_concern_and_review_speech"
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
                                                            vid="outcome_parents_concern_and_review_eating"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.outcome_parents_concern_and_review_eating"
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
                                                            vid="outcome_parents_concern_and_review_breathing"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.outcome_parents_concern_and_review_breathing"
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
                                                            vid="outcome_parents_concern_and_review_dental"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.outcome_parents_concern_and_review_dental"
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
                                    <v-btn
                                        color="primary"
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('61') ? !checkValidation('61') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>
                                
                                <v-stepper-step editable 
                                    :complete="hasState('62') ? checkValidation('62') : false"
                                    :rules="hasState('62') ? [() => checkValidation('62')] : [() => true]"
                                    edit-icon="$complete"
                                    step="62"
                                    data-step="62"
                                    class="py-1"
                                >
                                    Any Cancer/ Malignancy developed in this Cleft child:
                                </v-stepper-step>
                                <v-stepper-content step="62" data-step="62" class="my-0 py-0">
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('62') ? !checkValidation('62') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>       
                                </v-stepper-content>

                                <v-stepper-step editable 
                                    :complete="hasState('63') ? checkValidation('63') : false"
                                    :rules="hasState('63') ? [() => checkValidation('63')] : [() => true]"
                                    edit-icon="$complete"
                                    step="63"
                                    data-step="63"
                                    class="py-1"
                                >
                                    Genetic Analysis:
                                </v-stepper-step>
                            
                                <v-stepper-content step="63" data-step="63" class="my-0 py-0">
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
                                        v-on:click="step--"
                                        small
                                        outlined
                                    >
                                        Back
                                    </v-btn>
                                    <v-btn
                                        color="primary"
                                        v-on:click="step++"
                                        :disabled="hasState('63') ? !checkValidation('63') : true"
                                        small
                                    >
                                        Continue
                                    </v-btn>                
                                </v-stepper-content>
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
                </v-form>
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
                        valid = false; 
                        console.log(valid)
                        console.log(element.classList.contains('v-input--has-state'))
                        break;
                    }
                }
            }
            
            return valid; 
        },

        reset() {
            return
        },
    },
});
</script>
@endpush