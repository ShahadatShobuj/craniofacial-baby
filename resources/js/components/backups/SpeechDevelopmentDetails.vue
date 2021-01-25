<template>
    <validation-observer 
        tag="div"
        ref="observer"
        v-slot="{ invalid }"
    >
        <v-form
            ref="form"
            name="speech_development"
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
                            Speech-language Development:
                        </v-stepper-step>
                    
                        <v-stepper-items>
                            <v-stepper-content step="1" data-question="1" class="my-0 py-0">
                                <v-row>
                                    <v-col md="3" class="py-0">
                                    </v-col>
                                    <v-col md="9" class="py-0">
                                        <validation-provider
                                            rules="required"
                                            v-slot="{ errors, valid, dirty }"
                                            name="Eyelid surgery"
                                            vid="development"
                                        >
                                            <v-radio-group 
                                                v-model="form.development"
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
                                            vid="development_of_single_word"
                                        >
                                            <v-radio-group 
                                                v-model="form.development_of_single_word"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                                <v-radio value="nine_months" label="9 months"></v-radio>
                                                <v-radio value="twelve_months" label="12 months"></v-radio>
                                                <v-radio value="eighteen_months" label="18 months"></v-radio>
                                                <v-radio value="more_than_eighteen_months" label=">18 months"></v-radio>
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
                                            vid="development_of_receptive_skills"
                                        >
                                            <v-radio-group 
                                                v-model="form.development_of_receptive_skills"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                                <v-radio value="one_keyword" label="1 keyword"></v-radio>
                                                <v-radio value="two_keywords" label="2 keywords"></v-radio>
                                                <v-radio value="three_keywords" label="3 keywords"></v-radio>
                                                <v-radio value="more_than_three_keywords" label=">3 keywords"></v-radio>
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
                                                            vid="development_of_p"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.development_of_p"
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
                                                            vid="development_of_b"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.development_of_b"
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
                                                            vid="development_of_m"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.development_of_m"
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
                                                            vid="development_of_c"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.development_of_c"
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
                                                            vid="development_of_j"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.development_of_j"
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
                                                            vid="development_of_k"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.development_of_k"
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
                                                            vid="development_of_g"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.development_of_g"
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
                                                            vid="development_of_f"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.development_of_f"
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
                                                            vid="development_of_v"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.development_of_v"
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
                                                            vid="development_of_Sh"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.development_of_Sh"
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
                                                            vid="development_of_s"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.development_of_s"
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
                                                            vid="development_of_a"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.development_of_a"
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
                                                            vid="development_of_i"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.development_of_i"
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
                                                            vid="development_of_u"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.development_of_u"
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
                                            vid="nasality"
                                        >
                                            <v-radio-group 
                                                v-model="form.nasality"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                                <v-radio :value="true" label="Yes"></v-radio>
                                                <v-radio :value="false" label="No"></v-radio>
                                            </v-radio-group>
                                        </validation-provider>
                                        <v-row v-if="form.nasality">
                                            <v-col md="3" class="py-0">
                                                If yes,
                                            </v-col>
                                            <v-col md="9" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Nasality type"
                                                    vid="nasality_type"
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
                                            vid="facial_grimace"
                                        >
                                            <v-radio-group 
                                                v-model="form.facial_grimace"
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
                                            vid="articulation"
                                        >
                                            <v-radio-group 
                                                v-model="form.articulation"
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
                                            vid="vpi"
                                        >
                                            <v-radio-group 
                                                v-model="form.vpi"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                                <v-radio value="yes" label="Yes"></v-radio>
                                                <v-radio value="no" label="No"></v-radio>
                                                <v-radio value="Not Applicable" label="No"></v-radio>
                                            </v-radio-group>
                                        </validation-provider>
                                        <v-row v-if="form.vpi === 'yes'">
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
                                                            vid="vpi_videofluroscopy"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.vpi_videofluroscopy"
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
                                                            vid="vpi_nasoendoscopy"
                                                        >
                                                            <v-radio-group 
                                                                v-model="form.vpi_nasoendoscopy"
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
                                            vid="vpi_surgery"
                                        >
                                            <v-radio-group 
                                                v-model="form.vpi_surgery"
                                                row
                                                :error-messages="errors"
                                                :success="valid && dirty"
                                                class="my-0"
                                            >
                                                <v-radio :value="true" label="Yes"></v-radio>
                                                <v-radio :value="false" label="No"></v-radio>
                                            </v-radio-group>
                                        </validation-provider>
                                        <v-row v-if="form.vpi_surgery">
                                            <v-col md="3" class="py-0">
                                                If yes,
                                            </v-col>
                                            <v-col md="9" class="py-0">
                                                <validation-provider
                                                    rules="required"
                                                    v-slot="{ errors, valid, dirty }"
                                                    name="Nasality type"
                                                    vid="vpi_surgery_type"
                                                >
                                                    <v-radio-group 
                                                        v-model="form.vpi_surgery_type"
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
                // development: 'Intact',
                // development_of_single_word: 'nine_months',
                // development_of_receptive_skills: 'one_keyword',
                // development_of_p: true,
                // development_of_b: true,
                // development_of_m: true,
                // development_of_c: true,
                // development_of_j: true,
                // development_of_k: true,
                // development_of_g: true,
                // development_of_f: true,
                // development_of_v: true,
                // development_of_Sh: true,
                // development_of_s: true,
                // development_of_a: true,
                // development_of_i: true,
                // development_of_u: true,

                // nasality: false,
                // nasality_type: null,
                // facial_grimace: true,
                // articulation: 'Intelligible',

                // vpi: 'yes',
                // vpi_nasoendoscopy: true,
                // vpi_videofluroscopy: true,

                // vpi_surgery: true,
                // vpi_surgery_type: 'Buccinator flap',


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
