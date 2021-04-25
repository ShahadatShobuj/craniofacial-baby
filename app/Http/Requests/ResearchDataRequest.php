<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResearchDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // Contact Details
            'cleftBaby.baby_name' => ['required', 'string', 'min:2'],
            'cleftBaby.father_name' => ['required', 'string', 'min:2'],
            'cleftBaby.mother_name' => ['required', 'string', 'min:2'],
            'cleftBaby.guardian_name' => ['required', 'string', 'min:2'],
            'cleftBaby.operation_age' => ['required', 'string'],
            'cleftBaby.current_age' => ['required', 'string'],
            'cleftBaby.address.address_type' => ['required', 'string', 'min:2'],
            'cleftBaby.address.village' => ['required', 'string', 'min:2'],
            'cleftBaby.address.upazilla' => ['required', 'string', 'min:2'],
            'cleftBaby.address.district' => ['required', 'string', 'min:2'],
            'cleftBaby.address.division' => ['required', 'string', 'min:2'],
            'cleftBaby.first_contact' => ['required', 'string', 'min:2'],
            'cleftBaby.alternate_contact' => ['nullable', 'string', 'min:11'],

            // 'cleftBaby.email' => ['required', 'email', 'unique:craniofacial_cleft_babies,email'],
            'cleftBaby.consanguineous_marriage' => ['required', 'boolean'],
            'cleftBaby.consanguinity' => ['nullable', 'required_if:consanguineous_marriage,true', 'string', 'min:2'],
            'cleftBaby.family_cleft' => ['required', 'boolean'],
            'cleftBaby.family_cleft_relatives' => ['nullable', 'required_if:family_cleft,true', 'string', 'min:2'],
            'cleftBaby.folic_acid_supplementation' => ['required', 'boolean'],
            'cleftBaby.maternity_diet' => ['required', 'string'],

            // Particulars of Mother
            'mother.occupation' => ['nullable', 'string', 'min:2'],
            'mother.habbit' => ['nullable', 'string'],
            'mother.number_of_cigerettes' => ['nullable', 'required_if:mother.habbit,Smoking', 'numeric'],
            'mother.congenital_anomaly' => ['nullable', 'boolean'],
            'mother.co_morbidities' => ['nullable', 'array'],
            'mother.medications' => ['nullable', 'array'],
            'mother.exposure_to_insecticides' => ['nullable', 'boolean'],
            'mother.exposure_to_insecticides_name' => ['nullable', 'required_if:mother.exposure_to_insecticides,true', 'string', 'min:2'],
            'mother.number_of_pregnancies' => ['nullable', 'string'],
            'mother.ho_pregnancy_loss' => ['nullable', 'string'],
            'mother.ho_pregnancy_termination' => ['nullable', 'string'],
            'mother.condition_of_alive_babies' => ['nullable', 'string', 'min:2'],

            // Details of pregnancy including
            'pregnancy.contamination_drinking_water' => ['nullable', 'boolean'],
            'pregnancy.contamination_drinking_water_type' => ['nullable', 'required_if:contamination_drinking_water,true', 'array'],
            'pregnancy.hazardous_waste_site' => ['nullable', 'boolean'],
            'pregnancy.air_pollution' => ['nullable', 'boolean'],
            'pregnancy.air_pollution_type' => ['nullable', 'required_if:air_pollution,true', 'array'],
            'pregnancy.pasticides_expose' => ['nullable', 'boolean'],
            'pregnancy.physical_activities_during_pregnancy' => ['nullable', 'string', 'min:2'],
            'pregnancy.intercourse_during_pregnancy' => ['nullable', 'boolean'],
            'pregnancy.intercourse_during_pregnancy_time_phase' => ['nullable', 'required_if:intercourse_during_pregnancy,true', 'array'],
            'pregnancy.intercourse_during_pregnancy_unusual_symptom' => ['nullable', 'required_if:intercourse_during_pregnancy,true', 'array'],
            'pregnancy.intercourse_during_post_conception' => ['nullable', 'string', 'min:2'],
            'pregnancy.stress' => ['nullable', 'boolean'],
            'pregnancy.stress_type' => ['nullable', 'required_if:stress,true', 'string'],
            'pregnancy.gestetional_diabetes_mellitus' => ['nullable', 'boolean'],
            'pregnancy.fever' => ['nullable', 'boolean'],
            'pregnancy.fever_period' => ['nullable', 'required_if:fever,true', 'string'],
            'pregnancy.abdominal_trauma' => ['nullable', 'boolean'],
            'pregnancy.abdominal_trauma_period' => ['nullable', 'required_if:abdominal_trauma,true', 'string'],
            'pregnancy.amniotic_membranes_rupture' => ['nullable', 'string', 'min:2'],
            'pregnancy.amniotic_fluid_amount' => ['nullable', 'string', 'min:2'],
            'pregnancy.early_amniotic_fluid_leak' => ['nullable', 'boolean'],

            // Particulars of Father
            'father.occupation' => ['nullable', 'string', 'min:2'],
            'father.habbit' => ['nullable', 'string'],
            'father.congenital_anomaly' => ['nullable', 'boolean'],
            'father.co_morbidities' => ['nullable', 'array'],
            'father.medications' => ['nullable', 'array'],

            // Particulars of Delivery
            'delivery.mode' => ['nullable', 'string'],
            'delivery.type' => ['nullable', 'string'],
            'delivery.membranes_rupture_type' => ['nullable', 'string'],
            'delivery.time_after_membranes_rupture' => ['nullable', 'string'],

            // Particulars of newborn
            'newborn.mother_age_during_affected_pregnancy' => ['nullable', 'string'],
            'newborn.father_age_during_affected_pregnancy' => ['nullable', 'string'],
            'newborn.duration_of_pregnancy_at_delivery' => ['nullable', 'string'],
            'newborn.condition_at_birth' => ['nullable', 'string'],
            'newborn.condition_at_birth_disease' => ['nullable', 'required_if:condition_at_birth,Not Healthy', 'nullable', 'string'],
            'newborn.sex_orientation' => ['nullable', 'string'],
            'newborn.weight' => ['nullable', 'string'],
            'newborn.apgar_score' => ['nullable', 'string'],
            'newborn.congenital_craniofacial_cleft' => ['nullable', 'string'],
            'newborn.tessier_classification_site' => ['nullable', 'string'],
            'newborn.tessier_classification_site_type_right' => ['nullable', 'string'],
            'newborn.tessier_classification_site_type_left' => ['nullable', 'string'],
            'newborn.tessier_classification_anatomical_type' => ['nullable', 'string'],
            'newborn.tessier_classification_microtia' => ['nullable', 'boolean'],
            'newborn.tessier_classification_microtia_type' => ['nullable', 'required_if:tessier_classification_microtia,true', 'string'],
            'newborn.tessier_classification_choanal_attresia' => ['nullable', 'string'],
            'newborn.tessier_classification_choanal_attresia_site' => ['nullable', 'required_if:tessier_classification_choanal_attresia,Present', 'string'],
            'newborn.tessier_classification_choanal_attresia_anatomical_type' => ['nullable', 'required_if:tessier_classification_choanal_attresia,Present', 'string'],
            'newborn.other_congenital_anomalies' => ['nullable', 'boolean'],
            'newborn.other_congenital_anomalies_involved_system' => ['nullable', 'required_if:other_congenital_anomalies,true', 'array'],
            'newborn.any_syndrome_suspected' => ['nullable', 'boolean'],
            'newborn.corneal_opacities_and_other_deformities' => ['nullable', 'boolean'],
            'newborn.ring_constrictions' => ['nullable', 'boolean'],
            'newborn.ring_constrictions_involving_area' => ['nullable', 'required_if:ring_constrictions,true', 'array'],
            'newborn.nasal_obstruction' => ['nullable', 'boolean'],
            'newborn.nasal_obstruction_treated' => ['nullable', 'required_if:nasal_obstruction,true', 'boolean'],
            'newborn.palatal_abnormality' => ['nullable', 'boolean'],
            'newborn.palatal_abnormality_type' => ['nullable', 'required_if:palatal_abnormality,true', 'string'],
            'newborn.cleft_lip' => ['nullable', 'boolean'],
            'newborn.cleft_lip_type' => ['nullable', 'required_if:cleft_lip,true', 'string'],

            // Speech Development
            'speech_development.development' => ['nullable', 'string'],
            'speech_development.development_of_single_word' => ['nullable', 'string'],
            'speech_development.development_of_receptive_skills' => ['nullable', 'string'],
            'speech_development.development_of_p' => ['nullable', 'string'],
            'speech_development.development_of_b' => ['nullable', 'string'],
            'speech_development.development_of_m' => ['nullable', 'string'],
            'speech_development.development_of_c' => ['nullable', 'string'],
            'speech_development.development_of_j' => ['nullable', 'string'],
            'speech_development.development_of_k' => ['nullable', 'string'],
            'speech_development.development_of_g' => ['nullable', 'string'],
            'speech_development.development_of_f' => ['nullable', 'string'],
            'speech_development.development_of_v' => ['nullable', 'string'],
            'speech_development.development_of_Sh' => ['nullable', 'string'],
            'speech_development.development_of_s' => ['nullable', 'string'],
            'speech_development.development_of_a' => ['nullable', 'string'],
            'speech_development.development_of_i' => ['nullable', 'string'],
            'speech_development.development_of_u' => ['nullable', 'string'],
            'speech_development.nasality' => ['nullable', 'boolean'],
            'speech_development.nasality_type' => ['nullable', 'required_if:nasality,true', 'string'],
            'speech_development.facial_grimace' => ['nullable', 'boolean'],
            'speech_development.articulation' => ['nullable', 'string'],
            'speech_development.vpi' => ['nullable', 'string'],
            'speech_development.vpi_nasoendoscopy' => ['nullable', 'required_if:vpi,yes', 'boolean'],
            'speech_development.vpi_videofluroscopy' => ['nullable', 'required_if:vpi,yes', 'boolean'],
            'speech_development.vpi_surgery' => ['nullable', 'boolean'],
            'speech_development.vpi_surgery_type' => ['nullable', 'required_if:vpi_surgery,true', 'string'],

            // Hearing Development screening_by_ling_sound_s
            'hearing_development.response_calling_by_name' => ['nullable', 'string'],
            'hearing_development.screening_by_ling_sound_s' => ['nullable', 'string'],
            'hearing_development.screening_by_ling_sound_Sh' => ['nullable', 'string'],
            'hearing_development.screening_by_ling_sound_a' => ['nullable', 'string'],
            'hearing_development.screening_by_ling_sound_i' => ['nullable', 'string'],
            'hearing_development.screening_by_ling_sound_u' => ['nullable', 'string'],
            'hearing_development.screening_by_ling_sound_m' => ['nullable', 'string'],
            'hearing_development.test_pta' => ['nullable', 'boolean'],
            'hearing_development.test_pta_report' => ['nullable', 'required_if:test_pta,true', 'string'],
            'hearing_development.test_abr' => ['nullable', 'boolean'],
            'hearing_development.test_abr_report' => ['nullable', 'required_if:test_abr,true', 'string'],
            'hearing_development.test_srt' => ['nullable', 'boolean'],
            'hearing_development.test_srt_report' => ['nullable', 'required_if:test_srt,true', 'string'],
            'hearing_development.test_tympanometry' => ['nullable', 'boolean'],
            'hearing_development.test_tympanometry_report' => ['nullable', 'required_if:test_tympanometry,true', 'string'],
            'hearing_development.test_play_audiometry' => ['nullable', 'boolean'],
            'hearing_development.test_play_audiometry_report' => ['nullable', 'required_if:test_play_audiometry,true', 'string'],
            'hearing_development.test_boa' => ['nullable', 'boolean'],
            'hearing_development.test_boa_report' => ['nullable', 'required_if:test_boa,true', 'string'],
            'hearing_development.test_oae' => ['nullable', 'boolean'],
            'hearing_development.test_oae_report' => ['nullable', 'required_if:test_oae,true', 'string'],

            // Treatment Details
            'treatment.evaluation_of_imaging' => ['nullable', 'array'],
            'treatment.dissection_type' => ['nullable', 'string'],
            'treatment.dissection_of_eyelid_surgery' => ['nullable', 'boolean'],
            'treatment.dissection_of_choanal_atresia_surgery' => ['nullable', 'boolean'],
            'treatment.dissection_of_palate_surgery' => ['nullable', 'boolean'],
            'treatment.dissection_of_alveolar_cleft_surgery' => ['nullable', 'boolean'],
            'treatment.orthodontic_care' => ['nullable', 'array'],
            'treatment.cancer_malignancy_developed_cleft_child' => ['nullable', 'boolean'],
            'treatment.genetic_analysis_blood_sample_taken' => ['nullable', 'boolean'],
            'treatment.genetic_analysis_buccal_mucosal_sample_taken' => ['nullable', 'boolean'],

            // Outcome Details
            'outcome.standard_photographic_views' => ['nullable', 'string'],
            'outcome.video_speech_recordings' => ['nullable', 'string'],
            'outcome.vision_test' => ['nullable', 'string'],
            'outcome.nasal_airway_evaluation' => ['nullable', 'string'],
            'outcome.educational_occupational_attainments' => ['nullable', 'string'],
            'outcome.marital_status' => ['nullable', 'string'],
            'outcome.number_of_child' => ['nullable', 'required_if:marital_status,Married', 'numeric'],
            'outcome.number_of_abnormal_child' => ['nullable', 'required_if:marital_status,Married', 'numeric'],
            'outcome.parents_review_of_appearance' => ['nullable', 'string'],
            'outcome.parents_review_of_breathing' => ['nullable', 'string'],
            'outcome.parents_review_of_dental' => ['nullable', 'string'],
            'outcome.parents_review_of_eating' => ['nullable', 'string'],
            'outcome.parents_review_of_speech' => ['nullable', 'string'],
            'outcome.report' => ['nullable', 'string'],
            'outcome.interviewer' => ['nullable', 'string'],
        ];
    }
}
