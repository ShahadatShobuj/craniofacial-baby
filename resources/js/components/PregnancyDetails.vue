<template>
  <validation-observer tag="div" ref="observer" v-slot="{ invalid }">
    <v-form
      ref="form"
      name="pregnancy"
      @reset.native="resetFormData"
      @submit.prevent="validateAndProceed"
    >
      <v-card class="py-0">
        <v-card-text>
          <v-stepper
            v-model="question"
            vertical
            non-linear
            class="elevation-0 py-0"
          >
            <v-stepper-step
              editable
              :complete="
                hasState('1')
                  ? checkValidation('1') && waterContaminationTypeValidation
                  : false
              "
              :rules="
                hasState('1')
                  ? [
                      () =>
                        checkValidation('1') &&
                        waterContaminationTypeValidation,
                    ]
                  : [() => true]
              "
              edit-icon="$complete"
              step="1"
              data-question="1"
              class="py-1"
            >
              Contamination of drinking water:
              <span v-if="!waterContaminationTypeValidation"
                >Please, select contamination type.</span
              >
            </v-stepper-step>

            <v-stepper-content step="1" data-question="1" class="my-0 py-0">
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
                  <v-col
                    cols="9"
                    class="py-0"
                    v-if="form.contamination_drinking_water"
                  >
                    <v-row> If yes, </v-row>
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
              <v-btn color="primary" v-on:click="question--" small outlined>
                Back
              </v-btn>
              <v-btn
                color="primary"
                v-on:click="question++"
                :disabled="
                  hasState('1')
                    ? !(
                        checkValidation('1') && waterContaminationTypeValidation
                      )
                    : true
                "
                small
              >
                Continue
              </v-btn>
            </v-stepper-content>

            <v-stepper-step
              editable
              :complete="hasState('2') ? checkValidation('2') : false"
              :rules="
                hasState('2') ? [() => checkValidation('2')] : [() => true]
              "
              edit-icon="$complete"
              step="2"
              data-question="2"
              class="py-1"
            >
              Hazardous waste site:
            </v-stepper-step>

            <v-stepper-content step="2" data-question="2" class="my-0 py-0">
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
              <v-btn color="primary" v-on:click="question--" small outlined>
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

            <v-stepper-step
              editable
              :complete="
                hasState('3')
                  ? checkValidation('3') && airPollutionTypeValidation
                  : false
              "
              :rules="
                hasState('3')
                  ? [() => checkValidation('3') && airPollutionTypeValidation]
                  : [() => true]
              "
              edit-icon="$complete"
              step="3"
              data-question="3"
              class="py-1"
            >
              Air Pollution:
              <span v-if="!airPollutionTypeValidation"
                >Please, select contamination type.</span
              >
            </v-stepper-step>

            <v-stepper-content step="3" data-question="3" class="my-0 py-0">
              <v-stepper-items>
                <v-row>
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
                    <v-row> If yes, </v-row>
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
              <v-btn color="primary" v-on:click="question--" small outlined>
                Back
              </v-btn>
              <v-btn
                color="primary"
                v-on:click="question++"
                :disabled="
                  hasState('3')
                    ? !(checkValidation('3') && airPollutionTypeValidation)
                    : true
                "
                small
              >
                Continue
              </v-btn>
            </v-stepper-content>

            <v-stepper-step
              editable
              :complete="hasState('4') ? checkValidation('4') : false"
              :rules="
                hasState('4') ? [() => checkValidation('4')] : [() => true]
              "
              edit-icon="$complete"
              step="4"
              data-question="4"
              class="py-1"
            >
              Pesiticides Expose:
            </v-stepper-step>

            <v-stepper-content step="4" data-question="4" class="my-0 py-0">
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
              <v-btn color="primary" v-on:click="question--" small outlined>
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

            <v-stepper-step
              editable
              :complete="hasState('5') ? checkValidation('5') : false"
              :rules="
                hasState('5') ? [() => checkValidation('5')] : [() => true]
              "
              edit-icon="$complete"
              step="5"
              data-question="5"
              class="py-1"
            >
              Physical activities during pregnancy:
            </v-stepper-step>

            <v-stepper-content step="5" data-question="5" class="my-0 py-0">
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
                        <v-radio
                          value="Moderate"
                          label="Mild to moderate (no heavy weight lifting) "
                        ></v-radio>
                        <v-radio
                          value="Severe"
                          label="Moderate to Severe (usual daily activities including heavy weight lifting)"
                        ></v-radio>
                      </v-radio-group>
                    </validation-provider>
                  </v-col>
                </v-row>
              </v-stepper-items>
              <v-btn color="primary" v-on:click="question--" small outlined>
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

            <v-stepper-step
              editable
              :complete="
                hasState('6')
                  ? checkValidation('6') && intercourseTimeValidation
                  : false
              "
              :rules="
                hasState('6')
                  ? [() => checkValidation('6') && intercourseTimeValidation]
                  : [() => true]
              "
              edit-icon="$complete"
              step="6"
              data-question="6"
              class="py-1"
            >
              Sexual intercourse:
              <span v-if="!intercourseTimeValidation"
                >Please, select a time phase.</span
              >
            </v-stepper-step>

            <v-stepper-content step="6" data-question="6" class="my-0 py-0">
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
                      <v-col cols="3" class="py-0"> If yes, when </v-col>
                      <v-col cols="9" class="py-0">
                        <v-row>
                          <v-col cols="3" class="py-0">
                            <v-checkbox
                              v-model="
                                form.intercourse_during_pregnancy_time_phase
                              "
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
                              v-model="
                                form.intercourse_during_pregnancy_time_phase
                              "
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
                              v-model="
                                form.intercourse_during_pregnancy_time_phase
                              "
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
                              v-model="
                                form.intercourse_during_pregnancy_unusual_symptom
                              "
                              value="unusual_bleeding"
                              label="Unusual Bleeding"
                              :data-optional="true"
                              class="my-0"
                            >
                            </v-checkbox>
                          </v-col>
                          <v-col cols="3" class="py-0">
                            <v-checkbox
                              v-model="
                                form.intercourse_during_pregnancy_unusual_symptom
                              "
                              value="unusual_pain"
                              label="Unusual Pain"
                              :data-optional="true"
                              class="my-0"
                            >
                            </v-checkbox>
                          </v-col>
                          <v-col cols="3" class="py-0">
                            <v-checkbox
                              v-model="
                                form.intercourse_during_pregnancy_unusual_symptom
                              "
                              value="unusual_discharge"
                              label="Unusual Discharge"
                              :data-optional="true"
                              class="my-0"
                            >
                            </v-checkbox>
                          </v-col>
                          <v-col cols="3" class="py-0">
                            <v-checkbox
                              v-model="
                                form.intercourse_during_pregnancy_unusual_symptom
                              "
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
                  <v-col cols="3" class="py-0"
                    >(ii) Post conception: resume of coitus:</v-col
                  >
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
                        <v-radio
                          value="less_than_one_month"
                          label="< 1 months"
                        ></v-radio>
                        <v-radio
                          value="one_to_three_month"
                          label="1-3 months"
                        ></v-radio>
                        <v-radio
                          value="more_than_three_month"
                          label="> 3 months"
                        ></v-radio>
                      </v-radio-group>
                    </validation-provider>
                  </v-col>
                </v-row>
              </v-stepper-items>
              <v-btn color="primary" v-on:click="question--" small outlined>
                Back
              </v-btn>
              <v-btn
                color="primary"
                v-on:click="question++"
                :disabled="
                  hasState('6')
                    ? !(checkValidation('6') && intercourseTimeValidation)
                    : true
                "
                small
              >
                Continue
              </v-btn>
            </v-stepper-content>

            <v-stepper-step
              editable
              :complete="hasState('7') ? checkValidation('7') : false"
              :rules="
                hasState('7') ? [() => checkValidation('7')] : [() => true]
              "
              edit-icon="$complete"
              step="7"
              data-question="7"
              class="py-1"
            >
              Stress:
              <span v-if="!checkValidation('7')"
                >Please, select reason of stress.</span
              >
            </v-stepper-step>

            <v-stepper-content step="7" data-question="7" class="my-0 py-0">
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
                    <v-col cols="3" class="py-0"> If yes, </v-col>
                    <v-col cols="8" class="py-0">
                      <validation-provider
                        rules="required"
                        v-slot="{ errors, valid, dirty }"
                        name="Address Type"
                        vid="address_type"
                      >
                        <v-radio-group
                          v-model="form.stress_type"
                          row
                          :error-messages="errors"
                          :success="valid && dirty"
                        >
                          <v-radio
                            value="death_of_close_one"
                            label="Death of Close One"
                          ></v-radio>
                          <v-radio
                            value="seperation_or_divorce"
                            label="Seperation/ Divorce"
                          ></v-radio>
                          <v-radio
                            value="loss_of_job"
                            label="Loss of Job"
                          ></v-radio>
                          <v-radio
                            value="familial_difficulties"
                            label="Familial Difficulties"
                          ></v-radio>
                        </v-radio-group>
                      </validation-provider>
                    </v-col>
                  </v-col>
                </v-row>
              </v-stepper-items>
              <v-btn color="primary" v-on:click="question--" small outlined>
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

            <v-stepper-step
              editable
              :complete="hasState('8') ? checkValidation('8') : false"
              :rules="
                hasState('8') ? [() => checkValidation('8')] : [() => true]
              "
              edit-icon="$complete"
              step="8"
              data-question="8"
              class="py-1"
            >
              Gestetional Diabetes Mellitus:
            </v-stepper-step>

            <v-stepper-content step="8" data-question="8" class="my-0 py-0">
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
              <v-btn color="primary" v-on:click="question--" small outlined>
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

            <v-stepper-step
              editable
              :complete="hasState('9') ? checkValidation('9') : false"
              :rules="
                hasState('9') ? [() => checkValidation('9')] : [() => true]
              "
              edit-icon="$complete"
              step="9"
              data-question="9"
              class="py-1"
            >
              Fever:
              <span v-if="checkValidation('9')"
                >Please, select fever period.</span
              >
            </v-stepper-step>

            <v-stepper-content step="9" data-question="9" class="my-0 py-0">
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
                    <v-row> If yes when </v-row>
                    <validation-provider
                      rules="required"
                      v-slot="{ errors, valid, dirty }"
                      name="Fever"
                      vid="fever"
                    >
                      <v-radio-group
                        v-model="form.fever_period"
                        row
                        :error-messages="errors"
                        :success="valid && dirty"
                        class="my-0"
                      >
                        <v-radio value="first_trimester" label="Yes">
                          <template v-slot:label>
                            <span>1<sup>st</sup> trimester</span>
                          </template>
                        </v-radio>
                        <v-radio value="second_trimester" label="No">
                          <template v-slot:label>
                            <span>2<sup>nd</sup> trimester</span>
                          </template>
                        </v-radio>
                        <v-radio value="third_trimester" label="No">
                          <template v-slot:label>
                            <span>3<sup>rd</sup> trimester</span>
                          </template>
                        </v-radio>
                      </v-radio-group>
                    </validation-provider>
                  </v-col>
                </v-row>
              </v-stepper-items>
              <v-btn color="primary" v-on:click="question--" small outlined>
                Back
              </v-btn>
              <v-btn
                color="primary"
                v-on:click="question++"
                :disabled="hasState('9') ? !checkValidation('9') : true"
                small
              >
                Continue
              </v-btn>
            </v-stepper-content>

            <v-stepper-step
              editable
              :complete="hasState('10') ? checkValidation('10') : false"
              :rules="
                hasState('10') ? [() => checkValidation('10')] : [() => true]
              "
              edit-icon="$complete"
              step="10"
              data-question="10"
              class="py-1"
            >
              Accidents/trauma to abdomen during pregnancy:
              <span v-if="!checkValidation('10')"
                >Please, select trauma period.</span
              >
            </v-stepper-step>

            <v-stepper-content step="10" data-question="10" class="my-0 py-0">
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
                    <v-row> If yes, at which time of pregnancy: </v-row>
                    <validation-provider
                      rules="required"
                      v-slot="{ errors, valid, dirty }"
                      name="Abdominal Trauma"
                      vid="abdominal_trauma"
                    >
                      <v-radio-group
                        v-model="form.abdominal_trauma_period"
                        row
                        :error-messages="errors"
                        :success="valid && dirty"
                        class="my-0"
                      >
                        <v-radio value="first_trimester" label="Yes">
                          <template v-slot:label>
                            <span>1<sup>st</sup> trimester</span>
                          </template>
                        </v-radio>
                        <v-radio value="second_trimester" label="No">
                          <template v-slot:label>
                            <span>2<sup>nd</sup> trimester</span>
                          </template>
                        </v-radio>
                        <v-radio value="third_trimester" label="No">
                          <template v-slot:label>
                            <span>3<sup>rd</sup> trimester</span>
                          </template>
                        </v-radio>
                      </v-radio-group>
                    </validation-provider>
                  </v-col>
                </v-row>
              </v-stepper-items>
              <v-btn color="primary" v-on:click="question--" small outlined>
                Back
              </v-btn>
              <v-btn
                color="primary"
                v-on:click="question++"
                :disabled="hasState('10') ? !checkValidation('10') : true"
                small
              >
                Continue
              </v-btn>
            </v-stepper-content>

            <v-stepper-step
              editable
              :complete="hasState('11') ? checkValidation('11') : false"
              :rules="
                hasState('11') ? [() => checkValidation('11')] : [() => true]
              "
              edit-icon="$complete"
              step="11"
              data-question="11"
              class="py-1"
            >
              Time of rupture of amniotic membranes:
            </v-stepper-step>

            <v-stepper-content step="11" data-question="11" class="my-0 py-0">
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
                        <v-radio
                          value="Pre-term"
                          label="Pre-term (> 3 – 10 weeks before EDD)"
                        ></v-radio>

                        <v-radio
                          value="Term"
                          label="Term (EDD +- 2 weeks)"
                        ></v-radio>
                        <v-radio
                          value="Post-term"
                          label="Post-term (> 2 weeks after EDD)"
                        ></v-radio>
                      </v-radio-group>
                    </validation-provider>
                  </v-col>
                </v-row>
              </v-stepper-items>
              <v-btn color="primary" v-on:click="question--" small outlined>
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

            <v-stepper-step
              editable
              :complete="hasState('12') ? checkValidation('12') : false"
              :rules="
                hasState('12') ? [() => checkValidation('12')] : [() => true]
              "
              edit-icon="$complete"
              step="12"
              data-question="12"
              class="py-1"
            >
              Amount of amniotic fluid:
            </v-stepper-step>

            <v-stepper-content step="12" data-question="12" class="my-0 py-0">
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
                        <v-radio
                          value="Oligohydramnios"
                          label="Oligohydramnios"
                        ></v-radio>
                        <v-radio
                          value="Polyhydramnios"
                          label="Polyhydramnios"
                        ></v-radio>
                      </v-radio-group>
                    </validation-provider>
                  </v-col>
                </v-row>
              </v-stepper-items>
              <v-btn color="primary" v-on:click="question--" small outlined>
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

            <v-stepper-step
              editable
              :complete="hasState('13') ? checkValidation('13') : false"
              :rules="
                hasState('13') ? [() => checkValidation('13')] : [() => true]
              "
              edit-icon="$complete"
              step="13"
              data-question="13"
              class="py-1"
            >
              Early amniotic fluid leak:
            </v-stepper-step>

            <v-stepper-content step="13" data-question="13" class="my-0 py-0">
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
              <v-btn color="primary" v-on:click="question--" small outlined>
                Back
              </v-btn>
            </v-stepper-content>
          </v-stepper>
        </v-card-text>
        <v-card-actions class="pl-15">
          <v-btn color="primary" v-on:click="$emit('previous')" small outlined>
            Back
          </v-btn>
          <v-btn small type="reset" color="secondary" :loading="processing">
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
      question: "1",
      form: {
        // contamination_drinking_water: false,
        // contamination_drinking_water_type: [],
        // hazardous_waste_site: true,
        // air_pollution: true,
        // air_pollution_type: ['CO'],
        // pasticides_expose: true,
        // physical_activities_during_pregnancy: 'At rest',
        // intercourse_during_pregnancy: false,
        // intercourse_during_pregnancy_time_phase: [],
        // intercourse_during_pregnancy_unusual_symptom: [],
        // intercourse_during_post_conception: 'less_than_one_month',
        // stress: false,
        // stress_type: null,
        // gestetional_diabetes_mellitus: true,
        // fever: true,
        // fever_period: 'first_trimester',
        // abdominal_trauma: true,
        // abdominal_trauma_period: 'first_trimester',
        // amniotic_membranes_rupture: 'Preterm',
        // amniotic_fluid_amount: 'normal',
        // early_amniotic_fluid_leak: true,

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
    waterContaminationTypeValidation() {
      return (
        !this.form.contamination_drinking_water ||
        this.form["contamination_drinking_water_type"].length > 0
      );
    },
    airPollutionTypeValidation() {
      return (
        !this.form.air_pollution || this.form["air_pollution_type"].length > 0
      );
    },
    intercourseTimeValidation() {
      return (
        !this.form.intercourse_during_pregnancy ||
        this.form["intercourse_during_pregnancy_time_phase"].length > 0
      );
    },
    intercourseTimeValidation() {
      return (
        !this.form.intercourse_during_pregnancy ||
        this.form["intercourse_during_pregnancy_unusual_symptom"].length > 0
      );
    },
  },
  methods: {
    test() {
      console.log(event);
    },
    hasState(question) {
      let hasState = false;

      if (this.$el) {
        const target = this.$el.querySelector(
          `[class*='v-stepper__content'][data-question='${question}']`
        );
        const inputs = target.querySelectorAll(".v-input");

        for (let index = 0; index < inputs.length; index++) {
          const element = inputs[index];
          if (this.stepperState.includes(question)) {
            hasState = true;
          } else {
            if (
              element.classList.contains("v-input--has-state") ||
              (element.querySelector("input").dataset.optional &&
                this.question == question)
            ) {
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

      if (this.$el) {
        const target = this.$el.querySelector(
          `[class*='v-stepper__content'][data-question='${question}']`
        );

        const inputs = target.querySelectorAll(".v-input");
        for (let index = 0; index < inputs.length; index++) {
          const element = inputs[index];
          if (element.querySelector("input").dataset.optional) {
            if (element.classList.contains("error--text")) {
              valid = false;
              break;
            }
            continue;
          } else {
            if (
              !element.classList.contains("v-input--has-state") ||
              !element.classList.contains("success--text")
            ) {
              valid = false;
              break;
            }
          }
        }
      }

      return valid;
    },
    validateAndProceed() {
      this.processing = true;
      this.$refs.observer.validate() ? this.$emit("save", this.form) : false;
      this.processing = false;
    },
    resetFormData() {
      this.processing = true;
      this.$refs.form.reset();
      this.$emit("reset", this.form);
      this.$nextTick(() => {
        this.stepperState = [];
        this.processing = false;
      });
    },
  },
};
</script>
