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
            'mother.occupation' => ['required', 'string', 'min:2'],
            'mother.habbit' => ['required', 'string'],
            'mother.number_of_cigerettes' => ['nullable', 'required_if:mother.habbit,Smoking', 'numeric'],
            'mother.congenital_anomaly' => ['required', 'boolean'],
            'mother.co_morbidities' => ['required', 'array'],
            'mother.medications' => ['required', 'array'],
            'mother.exposure_to_insecticides' => ['required', 'boolean'],
            'mother.exposure_to_insecticides_name' => ['nullable', 'required_if:mother.exposure_to_insecticides,true', 'string', 'min:2'],
            'mother.number_of_pregnancies' => ['required', 'string'],
            'mother.ho_pregnancy_loss' => ['required', 'string'],
            'mother.ho_pregnancy_termination' => ['required', 'string'],
            'mother.condition_of_alive_babies' => ['required', 'string', 'min:2'],

            // Details of pregnancy including
            'pregnancy.contamination_drinking_water' => ['required', 'boolean'],
            'pregnancy.contamination_drinking_water_type' => ['nullable', 'required_if:contamination_drinking_water,true', 'array'],
            'pregnancy.hazardous_waste_site' => ['required', 'boolean'],
            'pregnancy.air_pollution' => ['required', 'boolean'],
            'pregnancy.air_pollution_type' => ['nullable', 'required_if:air_pollution,true', 'array'],
            'pregnancy.pasticides_expose' => ['required', 'boolean'],
            'pregnancy.physical_activities_during_pregnancy' => ['required', 'string', 'min:2'],
            'pregnancy.intercourse_during_pregnancy' => ['required', 'boolean'],
            'pregnancy.intercourse_during_pregnancy_time_phase' => ['nullable', 'required_if:intercourse_during_pregnancy,true', 'array'],
            'pregnancy.intercourse_during_pregnancy_unusual_symptom' => ['nullable', 'required_if:intercourse_during_pregnancy,true', 'array'],
            'pregnancy.intercourse_during_post_conception' => ['required', 'string', 'min:2'],
            'pregnancy.stress' => ['required', 'boolean'],
            'pregnancy.stress_type' => ['nullable', 'required_if:stress,true', 'string'],
            'pregnancy.gestetional_diabetes_mellitus' => ['required', 'boolean'],
            'pregnancy.fever' => ['required', 'boolean'],
            'pregnancy.fever_period' => ['nullable', 'required_if:fever,true', 'string'],
            'pregnancy.abdominal_trauma' => ['required', 'boolean'],
            'pregnancy.abdominal_trauma_period' => ['nullable', 'required_if:abdominal_trauma,true', 'string'],
            'pregnancy.amniotic_membranes_rupture' => ['required', 'string', 'min:2'],
            'pregnancy.amniotic_fluid_amount' => ['required', 'string', 'min:2'],
            'pregnancy.early_amniotic_fluid_leak' => ['required', 'boolean'],

            // Particulars of Father
            'father.occupation' => ['required', 'string', 'min:2'],
            'father.habbit' => ['required', 'string'],
            'father.congenital_anomaly' => ['required', 'boolean'],
            'father.co_morbidities' => ['required', 'array'],
            'father.medications' => ['required', 'array'],

            // Particulars of Delivery
            'delivery.mode' => ['required', 'string'],
            'delivery.type' => ['required', 'string'],
            'delivery.membranes_rupture_type' => ['required', 'string'],
            'delivery.time_after_membranes_rupture' => ['required', 'string'],

            // Particulars of newborn
            'newborn.mother_age_during_affected_pregnancy' => ['required', 'string'],
            'newborn.father_age_during_affected_pregnancy' => ['required', 'string'],
            'newborn.duration_of_pregnancy_at_delivery' => ['required', 'string'],
            'newborn.condition_at_birth' => ['required', 'string'],
            'newborn.condition_at_birth_disease' => ['nullable', 'required_if:condition_at_birth,Not Healthy', 'nullable', 'string'],
            'newborn.sex_orientation' => ['required', 'string'],
            'newborn.weight' => ['required', 'string'],
            'newborn.apgar_score' => ['required', 'string'],
            'newborn.congenital_craniofacial_cleft' => ['required', 'string'],
            'newborn.tessier_classification_site' => ['required', 'string'],
            'newborn.tessier_classification_site_type_right' => ['required', 'string'],
            'newborn.tessier_classification_site_type_left' => ['required', 'string'],
            'newborn.tessier_classification_anatomical_type' => ['required', 'string'],
            'newborn.tessier_classification_microtia' => ['required', 'boolean'],
            'newborn.tessier_classification_microtia_type' => ['nullable', 'required_if:tessier_classification_microtia,true', 'string'],
            'newborn.tessier_classification_choanal_attresia' => ['required', 'string'],
            'newborn.tessier_classification_choanal_attresia_site' => ['nullable', 'required_if:tessier_classification_choanal_attresia,Present', 'string'],
            'newborn.tessier_classification_choanal_attresia_anatomical_type' => ['nullable', 'required_if:tessier_classification_choanal_attresia,Present', 'string'],
            'newborn.other_congenital_anomalies' => ['required', 'boolean'],
            'newborn.other_congenital_anomalies_involved_system' => ['nullable', 'required_if:other_congenital_anomalies,true', 'array'],
            'newborn.any_syndrome_suspected' => ['required', 'boolean'],
            'newborn.corneal_opacities_and_other_deformities' => ['required', 'boolean'],
            'newborn.ring_constrictions' => ['required', 'boolean'],
            'newborn.ring_constrictions_involving_area' => ['nullable', 'required_if:ring_constrictions,true', 'array'],
            'newborn.nasal_obstruction' => ['required', 'boolean'],
            'newborn.nasal_obstruction_treated' => ['nullable', 'required_if:nasal_obstruction,true', 'boolean'],
            'newborn.palatal_abnormality' => ['required', 'boolean'],
            'newborn.palatal_abnormality_type' => ['nullable', 'required_if:palatal_abnormality,true', 'string'],
            'newborn.cleft_lip' => ['required', 'boolean'],
            'newborn.cleft_lip_type' => ['nullable', 'required_if:cleft_lip,true', 'string'],

            // Speech Development
            'speech_development.development' => ['required', 'string'],
            'speech_development.development_of_single_word' => ['required', 'string'],
            'speech_development.development_of_receptive_skills' => ['required', 'string'],
            'speech_development.development_of_p' => ['required', 'string'],
            'speech_development.development_of_b' => ['required', 'string'],
            'speech_development.development_of_m' => ['required', 'string'],
            'speech_development.development_of_c' => ['required', 'string'],
            'speech_development.development_of_j' => ['required', 'string'],
            'speech_development.development_of_k' => ['required', 'string'],
            'speech_development.development_of_g' => ['required', 'string'],
            'speech_development.development_of_f' => ['required', 'string'],
            'speech_development.development_of_v' => ['required', 'string'],
            'speech_development.development_of_Sh' => ['required', 'string'],
            'speech_development.development_of_s' => ['required', 'string'],
            'speech_development.development_of_a' => ['required', 'string'],
            'speech_development.development_of_i' => ['required', 'string'],
            'speech_development.development_of_u' => ['required', 'string'],
            'speech_development.development_of_p_description' => ['nullable', 'string'],
            'speech_development.development_of_b_description' => ['nullable', 'string'],
            'speech_development.development_of_m_description' => ['nullable', 'string'],
            'speech_development.development_of_c_description' => ['nullable', 'string'],
            'speech_development.development_of_j_description' => ['nullable', 'string'],
            'speech_development.development_of_k_description' => ['nullable', 'string'],
            'speech_development.development_of_g_description' => ['nullable', 'string'],
            'speech_development.development_of_f_description' => ['nullable', 'string'],
            'speech_development.development_of_v_description' => ['nullable', 'string'],
            'speech_development.development_of_S_descriptionh' => ['nullable', 'string'],
            'speech_development.development_of_s_description' => ['nullable', 'string'],
            'speech_development.development_of_a_description' => ['nullable', 'string'],
            'speech_development.development_of_i_description' => ['nullable', 'string'],
            'speech_development.development_of_u_description' => ['nullable', 'string'],
            'speech_development.nasality' => ['required', 'boolean'],
            'speech_development.nasality_type' => ['nullable', 'required_if:nasality,true', 'string'],
            'speech_development.facial_grimace' => ['required', 'boolean'],
            'speech_development.articulation' => ['required', 'string'],
            'speech_development.vpi' => ['required', 'string'],
            'speech_development.vpi_nasoendoscopy' => ['nullable', 'required_if:vpi,yes', 'boolean'],
            'speech_development.vpi_videofluroscopy' => ['nullable', 'required_if:vpi,yes', 'boolean'],
            'speech_development.vpi_surgery' => ['required', 'boolean'],
            'speech_development.vpi_surgery_type' => ['nullable', 'required_if:vpi_surgery,true', 'string'],

            // Hearing Development screening_by_ling_sound_s
            'hearing_development.response_calling_by_name' => ['required', 'string'],
            'hearing_development.screening_by_ling_sound_s' => ['required', 'string'],
            'hearing_development.screening_by_ling_sound_Sh' => ['required', 'string'],
            'hearing_development.screening_by_ling_sound_a' => ['required', 'string'],
            'hearing_development.screening_by_ling_sound_i' => ['required', 'string'],
            'hearing_development.screening_by_ling_sound_u' => ['required', 'string'],
            'hearing_development.screening_by_ling_sound_m' => ['required', 'string'],
            'hearing_development.test_pta' => ['required', 'boolean'],
            'hearing_development.test_pta_report' => ['nullable', 'required_if:test_pta,true', 'string'],
            'hearing_development.test_pta_abnormality_type' => ['nullable', 'required_if:test_pta_report,Abnormal', 'string'],
            'hearing_development.test_abr' => ['required', 'boolean'],
            'hearing_development.test_abr_report' => ['nullable', 'required_if:test_abr,true', 'string'],
            'hearing_development.test_abr_abnormality_type' => ['nullable', 'required_if:test_abr_report,Abnormal', 'string'],
            'hearing_development.test_srt' => ['required', 'boolean'],
            'hearing_development.test_srt_report' => ['nullable', 'required_if:test_srt,true', 'string'],
            'hearing_development.test_srt_abnormality_type' => ['nullable', 'required_if:test_srt_report,Abnormal', 'string'],
            'hearing_development.test_tympanometry' => ['required', 'boolean'],
            'hearing_development.test_tympanometry_report' => ['nullable', 'required_if:test_tympanometry,true', 'string'],
            'hearing_development.test_tympanometry_abnormality_type' => ['nullable', 'required_if:test_tympanometry_report,Abnormal', 'string'],
            'hearing_development.test_play_audiometry' => ['required', 'boolean'],
            'hearing_development.test_play_audiometry_report' => ['nullable', 'required_if:test_play_audiometry,true', 'string'],
            'hearing_development.test_play_audiometry_abnormality_type' => ['nullable', 'required_if:test_play_audiometry_report,Abnormal', 'string'],
            'hearing_development.test_boa' => ['required', 'boolean'],
            'hearing_development.test_boa_report' => ['nullable', 'required_if:test_boa,true', 'string'],
            'hearing_development.test_boa_abnormality_type' => ['nullable', 'required_if:test_boa_report,Abnormal', 'string'],

            // Treatment Details
            'treatment.evaluation_of_imaging' => ['required', 'array'],
            'treatment.dissection_type' => ['required', 'string'],
            'treatment.dissection_of_eyelid_surgery' => ['required', 'boolean'],
            'treatment.dissection_of_choanal_atresia_surgery' => ['required', 'boolean'],
            'treatment.dissection_of_palate_surgery' => ['required', 'boolean'],
            'treatment.dissection_of_alveolar_cleft_surgery' => ['required', 'boolean'],
            'treatment.orthodontic_care' => ['required', 'array'],
            'treatment.cancer_malignancy_developed_cleft_child' => ['required', 'boolean'],
            'treatment.genetic_analysis_blood_sample_taken' => ['required', 'boolean'],
            'treatment.genetic_analysis_buccal_mucosal_sample_taken' => ['required', 'boolean'],

            // Outcome Details
            'outcome.standard_photographic_views' => ['required', 'string'],
            'outcome.video_speech_recordings' => ['required', 'string'],
            'outcome.vision_test' => ['required', 'string'],
            'outcome.nasal_airway_evaluation' => ['required', 'string'],
            'outcome.educational_occupational_attainments' => ['required', 'string'],
            'outcome.marital_status' => ['required', 'string'],
            'outcome.number_of_child' => ['nullable', 'required_if:marital_status,Married', 'numeric'],
            'outcome.number_of_abnormal_child' => ['nullable', 'required_if:marital_status,Married', 'numeric'],
            'outcome.parents_review_of_appearance' => ['required', 'string'],
            'outcome.parents_review_of_breathing' => ['required', 'string'],
            'outcome.parents_review_of_dental' => ['required', 'string'],
            'outcome.parents_review_of_eating' => ['required', 'string'],
            'outcome.parents_review_of_speech' => ['required', 'string'],
            'outcome.report' => ['required', 'string'],
            'outcome.interviewer' => ['required', 'string'],
        ];
    }
}
