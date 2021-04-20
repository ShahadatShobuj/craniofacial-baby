@extends('layouts.frontend', ['activePage' => 'craniocacial.baby', 'titlePage' => "Cranifacial Baby"])

@push('styles')
    <style>
        .form-control {
            border: none;
            border-bottom: 1px dotted;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

    </style>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-0">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title text-center">Epidemiological and Clinical Study of Craniofacial Clefts in
                            Bangladesh</h4>
                    </div>

                    <div class="card-body mt-1">
                        <p>
                            Dr. Mohammad Rabiul Karim Khan, Dr. Shahreen Kalam, Dr. Tanmoy Prakash Ghosh,Dr. Aminur Rashid,
                            Dr. Abida Sultana,Nargis Jahan, Dr. Md. Mahfuzul Gani, Prof. Dr. Rayhana Awwal, Prof. Dr. Md.
                            Abul Kalam,Dr. B.C. Sommerlad.
                        </p>
                        <h3>
                            Introduction:
                        </h3>
                        <p>
                            Craniofacial clefts appear to be relatively common in Bangladesh. This project aims to review
                            approximately 60 patients seen over last 18 years at Sheikh HasinaNational Institute of Burn and
                            Plastic Surgery (SHNIBPS) and Dhaka Medical CollegeHospital (DMCH). These patient will be
                            evaluated now at SHNIBPS or DMCH or at their homes.
                        </p>
                        <p>
                            The aims are to attempt to elucidate possible causes, define the deformities (particulary
                            looking for choanal atresia), outline the treatment pathway and assess outcomes where possible.
                        </p>
                        {{-- <validation-observer tag="div" v-slot="{ handleSubmit, invalid, reset }"> --}}
                        <form action="" method="" v-if="cleftBaby">
                            <ol>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <label>{{ __('Name of the Baby: ') }}</label>
                                        <div
                                            class="flex-grow-1 form-group{{ $errors->has('baby_name') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('baby_name') ? ' is-invalid' : '' }}"
                                                name="baby_name" id="input-baby_name" type="text"
                                                placeholder="{{ __('baby_name') }}" v-model="cleftBaby.baby_name"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('baby_name'))
                                                <span id="baby_name-error" class="error text-danger"
                                                    for="input-baby_name">{{ $errors->first('baby_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <label>{{ __('Age of Baby: ') }}</label>
                                        <div class="flex-grow-1 row">
                                            <div class="col d-flex align-items-center">

                                                <label for="">Operation Age:</label>

                                                <div
                                                    class="flex-grow-1 form-group{{ $errors->has('operation_age') ? ' has-danger' : '' }}">
                                                    <input id="baby_operation_age"
                                                        class="form-control flex-grow-1 {{ $errors->has('operation_age') ? 'is-invalid' : '' }}"
                                                        name="operation_age" id="input-operation_age" type="number"
                                                        step="0.1" placeholder="{{ __('operation_age') }}"
                                                        v-model="cleftBaby.operation_age" required="true"
                                                        aria-required="true" />
                                                    @if ($errors->has('operation_age'))
                                                        <span id="operation_age-error" class="error text-danger"
                                                            for="input-operation_age">{{ $errors->first('operation_age') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col d-flex align-items-center">
                                                <label for="">Current Age:</label>
                                                <div
                                                    class="form-group flex-grow-1 {{ $errors->has('current_age') ? 'has-danger' : '' }}">
                                                    <input id="baby_current_age"
                                                        class="form-control flex-grow-1 {{ $errors->has('current_age') ? 'is-invalid' : '' }}"
                                                        name="current_age" id="input-current_age" type="number" step="0.1"
                                                        placeholder="{{ __('current_age') }}"
                                                        v-model="cleftBaby.current_age" required="true"
                                                        aria-required="true" />
                                                    @if ($errors->has('current_age'))
                                                        <span id="current_age-error" class="error text-danger"
                                                            for="input-current_age">{{ $errors->first('current_age') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <label>{{ __('Name of father: ') }}</label>
                                        <div
                                            class="flex-grow-1 form-group{{ $errors->has('father_name') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('father_name') ? ' is-invalid' : '' }}"
                                                name="father_name" id="input-father_name" type="text"
                                                placeholder="{{ __('father_name') }}" v-model="cleftBaby.father_name"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('father_name'))
                                                <span id="father_name-error" class="error text-danger"
                                                    for="input-father_name">{{ $errors->first('father_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <label>{{ __('Name of mother: ') }}</label>
                                        <div
                                            class="flex-grow-1 form-group{{ $errors->has('mother_name') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('mother_name') ? ' is-invalid' : '' }}"
                                                name="mother_name" id="input-mother_name" type="text"
                                                placeholder="{{ __('mother_name') }}" v-model="cleftBaby.mother_name"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('mother_name'))
                                                <span id="mother_name-error" class="error text-danger"
                                                    for="input-mother_name">{{ $errors->first('mother_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <label>{{ __('Name of guardian: ') }}</label>
                                        <div
                                            class="flex-grow-1 form-group{{ $errors->has('guardian_name') ? ' has-danger' : '' }}">
                                            <input
                                                class="form-control{{ $errors->has('guardian_name') ? ' is-invalid' : '' }}"
                                                name="guardian_name" id="input-guardian_name" type="text"
                                                placeholder="{{ __('guardian_name') }}" v-model="cleftBaby.guardian_name"
                                                required="true" aria-required="true" />
                                            @if ($errors->has('guardian_name'))
                                                <span id="guardian_name-error" class="error text-danger"
                                                    for="input-guardian_name">{{ $errors->first('guardian_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <label class="pr-4">{{ __('Address: ') }}</label>
                                        <div class="flex-grow-1">
                                            <div class="d-flex">
                                                <div class="d-flex align-items-center px-5">
                                                    <div
                                                        class="form-group mb-0 {{ $errors->has('guardian_name') ? ' has-danger' : '' }} ">
                                                        <input type="radio" v-model="cleftBaby.address.address_type"
                                                            name="address_type" id="urban" value="urban">
                                                    </div>
                                                    <label for="urban" class="ml-2 mb-0">Urban</label>
                                                </div>
                                                <div class="d-flex align-items-center px-5">
                                                    <div
                                                        class="form-group mb-0 {{ $errors->has('guardian_name') ? ' has-danger' : '' }}">
                                                        <input type="radio" name="address_type" id="rural" value="rural"
                                                            v-model="cleftBaby.address.address_type">
                                                    </div>
                                                    <label for="rural" class="ml-2 mb-0">Rural</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex align-items-center">

                                                    <label for="">Village/Area: </label>

                                                    <div
                                                        class="flex-grow-1 form-group{{ $errors->has('village') ? ' has-danger' : '' }}">
                                                        <input id="baby_village"
                                                            class="form-control flex-grow-1 {{ $errors->has('village') ? 'is-invalid' : '' }}"
                                                            name="village" id="input-village"
                                                            placeholder="{{ __('village') }}"
                                                            v-model="cleftBaby.address.village" required="true"
                                                            aria-required="true" />
                                                        @if ($errors->has('village'))
                                                            <span id="village-error" class="error text-danger"
                                                                for="input-village">{{ $errors->first('village') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col d-flex align-items-center">
                                                    <label for="">Upazilla: </label>
                                                    <div
                                                        class="form-group flex-grow-1 {{ $errors->has('upazilla') ? 'has-danger' : '' }}">
                                                        <input id="baby_upazilla"
                                                            class="form-control flex-grow-1 {{ $errors->has('upazilla') ? 'is-invalid' : '' }}"
                                                            name="upazilla" id="input-upazilla"
                                                            placeholder="{{ __('upazilla') }}"
                                                            v-model="cleftBaby.address.upazilla" required="true"
                                                            aria-required="true" />
                                                        @if ($errors->has('upazilla'))
                                                            <span id="upazilla-error" class="error text-danger"
                                                                for="input-upazilla">{{ $errors->first('upazilla') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex align-items-center">

                                                    <label for="">District: </label>

                                                    <div
                                                        class="flex-grow-1 form-group{{ $errors->has('district') ? ' has-danger' : '' }}">
                                                        <input id="baby_district"
                                                            class="form-control flex-grow-1 {{ $errors->has('district') ? 'is-invalid' : '' }}"
                                                            name="district" id="input-district"
                                                            placeholder="{{ __('district') }}"
                                                            v-model="cleftBaby.address.district" required="true"
                                                            aria-required="true" />
                                                        @if ($errors->has('district'))
                                                            <span id="district-error" class="error text-danger"
                                                                for="input-district">{{ $errors->first('district') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col d-flex align-items-center">
                                                    <label for="">Division: </label>
                                                    <div
                                                        class="form-group flex-grow-1 {{ $errors->has('division') ? 'has-danger' : '' }}">
                                                        <input id="baby_division"
                                                            class="form-control flex-grow-1 {{ $errors->has('division') ? 'is-invalid' : '' }}"
                                                            name="division" id="input-division"
                                                            placeholder="{{ __('division') }}"
                                                            v-model="cleftBaby.address.division" required="true"
                                                            aria-required="true" />
                                                        @if ($errors->has('division'))
                                                            <span id="division-error" class="error text-danger"
                                                                for="input-division">{{ $errors->first('division') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex align-items-center">
                                        <label class="pr-4">{{ __('Contact No: ') }}</label>
                                        <ol class="flex-grow-1 pl-0 row" style="list-style: none;">
                                            <li class="col">
                                                <div class="d-flex align-items-center">

                                                    <label for="">(a) </label>

                                                    <div
                                                        class="flex-grow-1 form-group{{ $errors->has('first_contact') ? ' has-danger' : '' }}">
                                                        <input id="baby_first_contact"
                                                            class="form-control flex-grow-1 {{ $errors->has('first_contact') ? 'is-invalid' : '' }}"
                                                            name="first_contact" id="input-first_contact"
                                                            placeholder="{{ __('01x-xx-xxxxxx') }}"
                                                            v-model="cleftBaby.first_contact" required="true"
                                                            aria-required="true" />
                                                        @if ($errors->has('first_contact'))
                                                            <span id="first_contact-error" class="error text-danger"
                                                                for="input-first_contact">{{ $errors->first('first_contact') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="col">
                                                <div class="d-flex align-items-center">
                                                    <label for="">(b) </label>
                                                    <div
                                                        class="form-group flex-grow-1 {{ $errors->has('alternate_contact') ? 'has-danger' : '' }}">
                                                        <input id="baby_alternate_contact"
                                                            class="form-control flex-grow-1 {{ $errors->has('alternate_contact') ? 'is-invalid' : '' }}"
                                                            name="alternate_contact" id="input-alternate_contact"
                                                            placeholder="{{ __('01x-xx-xxxxxx') }}"
                                                            v-model="cleftBaby.alternate_contact" required="true"
                                                            aria-required="true" />
                                                        @if ($errors->has('alternate_contact'))
                                                            <span id="alternate_contact-error" class="error text-danger"
                                                                for="input-alternate_contact">{{ $errors->first('alternate_contact') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <label class="pr-4">{{ __('Consanguinity of marriage: ') }}</label>
                                        <div class="flex-grow-1">
                                            <div class="d-flex">
                                                <div class="d-flex align-items-center px-5">
                                                    <div
                                                        class="form-group mb-0 {{ $errors->has('consanguineous_marriage') ? ' has-danger' : '' }} ">
                                                        <input type="radio" name="consanguineous_marriage"
                                                            id="consanguineous_marriage_true" value="1"
                                                            v-model="cleftBaby.consanguineous_marriage">
                                                    </div>
                                                    <label for="consanguineous_marriage_true" class="ml-2 mb-0">Yes</label>
                                                </div>
                                                <div class="d-flex align-items-center px-5">
                                                    <div
                                                        class="form-group mb-0 {{ $errors->has('consanguineous_marriage') ? ' has-danger' : '' }}">
                                                        <input type="radio" name="consanguineous_marriage"
                                                            id="consanguineous_marriage_false" value="0"
                                                            v-model="cleftBaby.consanguineous_marriage">
                                                    </div>
                                                    <label for="consanguineous_marriage_false" class="ml-2 mb-0">No</label>
                                                </div>
                                            </div>
                                            <div class="d-flex">

                                                <label for="">If yes: </label>

                                                <div class="flex-grow-1 d-flex">
                                                    <div class="d-flex align-items-center px-5">
                                                        <div
                                                            class="form-group mb-0 {{ $errors->has('consanguinity') ? ' has-danger' : '' }} ">
                                                            <input type="radio" name="consanguinity"
                                                                id="consanguinity_maternal" value="maternal"
                                                                v-model="cleftBaby.consanguinity">
                                                        </div>
                                                        <label for="consanguinity_maternal" class="ml-2 mb-0">Cousin
                                                            (Maternal)</label>
                                                    </div>
                                                    <div class="d-flex align-items-center px-5">
                                                        <div
                                                            class="form-group mb-0 {{ $errors->has('consanguinity') ? ' has-danger' : '' }}">
                                                            <input type="radio" name="consanguinity"
                                                                id="consanguinity_paternal" value="paternal"
                                                                v-model="cleftBaby.consanguinity">
                                                        </div>
                                                        <label for="consanguinity_paternal" class="ml-2 mb-0">Cousin
                                                            (Paternal)</label>
                                                    </div>
                                                    <div class="d-flex align-items-center px-5">
                                                        <div
                                                            class="form-group mb-0 {{ $errors->has('consanguinity') ? ' has-danger' : '' }}">
                                                            <input type="radio" name="consanguinity"
                                                                id="consanguinity_others" value="others"
                                                                v-model="cleftBaby.consanguinity">
                                                        </div>
                                                        <label for="consanguinity_others" class="ml-2 mb-0">Others</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <label
                                            class="pr-4">{{ __('Family H/O  Cleft Lip/Cleft Palate in first degree relatives: ') }}</label>
                                        <div class="flex-grow-1">
                                            <div class="d-flex">
                                                <div class="d-flex align-items-center px-5">
                                                    <div
                                                        class="form-group mb-0 {{ $errors->has('family_cleft') ? ' has-danger' : '' }} ">
                                                        <input type="radio" name="family_cleft" id="family_cleft_true"
                                                            value="1" v-model="cleftBaby.family_cleft">
                                                    </div>
                                                    <label for="family_cleft_true" class="ml-2 mb-0">Yes</label>
                                                </div>
                                                <div class="d-flex align-items-center px-5">
                                                    <div
                                                        class="form-group mb-0 {{ $errors->has('family_cleft') ? ' has-danger' : '' }}">
                                                        <input type="radio" name="family_cleft" id="family_cleft_false"
                                                            value="0" v-model="cleftBaby.family_cleft">
                                                    </div>
                                                    <label for="family_cleft_false" class="ml-2 mb-0">No</label>
                                                </div>
                                            </div>
                                            <div class="d-flex">

                                                <label for="">If yes: </label>

                                                <div class="flex-grow-1 d-flex">
                                                    <div class="d-flex align-items-center px-5">
                                                        <div
                                                            class="form-group mb-0 {{ $errors->has('family_cleft_relatives') ? ' has-danger' : '' }} ">
                                                            <input type="radio" name="family_cleft_relatives"
                                                                id="family_cleft_relatives_parents" value="parents"
                                                                v-model="cleftBaby.family_cleft">
                                                        </div>
                                                        <label for="family_cleft_relatives_parents"
                                                            class="ml-2 mb-0">Parents</label>
                                                    </div>
                                                    <div class="d-flex align-items-center px-5">
                                                        <div
                                                            class="form-group mb-0 {{ $errors->has('family_cleft_relatives') ? ' has-danger' : '' }}">
                                                            <input type="radio" name="family_cleft_relatives"
                                                                id="family_cleft_relatives_offspring" value="offspring"
                                                                v-model="cleftBaby.family_cleft">
                                                        </div>
                                                        <label for="family_cleft_relatives_offspring"
                                                            class="ml-2 mb-0">Offspring</label>
                                                    </div>
                                                    <div class="d-flex align-items-center px-5">
                                                        <div
                                                            class="form-group mb-0 {{ $errors->has('family_cleft_relatives') ? ' has-danger' : '' }}">
                                                            <input type="radio" name="family_cleft_relatives"
                                                                id="family_cleft_relatives_siblings" value="siblings"
                                                                v-model="cleftBaby.family_cleft">
                                                        </div>
                                                        <label for="family_cleft_relatives_siblings"
                                                            class="ml-2 mb-0">Siblings</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <label
                                            class="pr-4">{{ __('H/O periconceptional folic acid supplementation: ') }}</label>
                                        <div class="flex-grow-1">
                                            <div class="d-flex">
                                                <div class="d-flex align-items-center px-5">
                                                    <div
                                                        class="form-group mb-0 {{ $errors->has('folic_acid_supplementation') ? ' has-danger' : '' }} ">
                                                        <input type="radio" name="folic_acid_supplementation"
                                                            id="folic_acid_supplementation_true" value="1"
                                                            v-model="cleftBaby.folic_acid_supplementation">
                                                    </div>
                                                    <label for="folic_acid_supplementation_true"
                                                        class="ml-2 mb-0">Yes</label>
                                                </div>
                                                <div class="d-flex align-items-center px-5">
                                                    <div
                                                        class="form-group mb-0 {{ $errors->has('folic_acid_supplementation') ? ' has-danger' : '' }}">
                                                        <input type="radio" name="folic_acid_supplementation"
                                                            id="folic_acid_supplementation_false" value="0"
                                                            v-model="cleftBaby.folic_acid_supplementation">
                                                    </div>
                                                    <label for="folic_acid_supplementation_false"
                                                        class="ml-2 mb-0">No</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <label class="pr-4">{{ __('Maternity Diet: ') }}</label>
                                        <div class="flex-grow-1">
                                            <div class="d-flex">
                                                <div class="d-flex align-items-center px-5">
                                                    <div
                                                        class="form-group mb-0 {{ $errors->has('maternity_diet') ? ' has-danger' : '' }} ">
                                                        <input type="radio" name="maternity_diet"
                                                            id="maternity_diet_adequate" value="Adequate"
                                                            v-model="cleftBaby.maternity_diet">
                                                    </div>
                                                    <label for="maternity_diet_adequate" class="ml-2 mb-0">Adequate</label>
                                                </div>
                                                <div class="d-flex align-items-center px-5">
                                                    <div
                                                        class="form-group mb-0 {{ $errors->has('maternity_diet') ? ' has-danger' : '' }}">
                                                        <input type="radio" name="maternity_diet"
                                                            id="maternity_diet_inadeqate" value="Inadequate"
                                                            v-model="cleftBaby.maternity_diet">
                                                    </div>
                                                    <label for="maternity_diet_inadeqate"
                                                        class="ml-2 mb-0">Inadequate</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <label class="pr-4">{{ __('Particulars of Mother: ') }}</label>
                                    <ol style="list-style-type: lower-alpha">
                                        <li>
                                            <div class="d-flex">
                                                <label class="pr-4 font-weight-bold">{{ __('Occupation: ') }}</label>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('mother_occupation') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="mother_occupation"
                                                                    id="mother_occupation_housewife" value="Housewife"
                                                                    v-model="cleftBaby.mother.occupation">
                                                            </div>
                                                            <label for="mother_occupation_housewife"
                                                                class="ml-2 mb-0">Housewife</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('mother_occupation') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="mother_occupation"
                                                                    id="mother_occupation_business" value="Business"
                                                                    v-model="cleftBaby.mother.occupation">
                                                            </div>
                                                            <label for="mother_occupation_business"
                                                                class="ml-2 mb-0">Business</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('mother_occupation') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="mother_occupation"
                                                                    id="mother_occupation_service" value="Service"
                                                                    v-model="cleftBaby.mother.occupation">
                                                            </div>
                                                            <label for="mother_occupation_service"
                                                                class="ml-2 mb-0">Service</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('mother_occupation') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="mother_occupation"
                                                                    id="mother_occupation_mw" value="Manual Worker"
                                                                    v-model="cleftBaby.mother.occupation">
                                                            </div>
                                                            <label for="mother_occupation_mw" class="ml-2 mb-0">Manual
                                                                Worker</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('mother_occupation') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="mother_occupation"
                                                                    id="mother_occupation_others" value="Others"
                                                                    v-model="cleftBaby.mother.occupation">
                                                            </div>
                                                            <label for="mother_occupation_others"
                                                                class="ml-2 mb-0">Others</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex">
                                                <label class="pr-4 font-weight-bold">{{ __('Personal: ') }}</label>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('mother_personal') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="mother_personal"
                                                                    id="mother_personal_smoking" value="Smoking"
                                                                    v-model="cleftBaby.mother.habbit">
                                                            </div>
                                                            <label for="mother_personal_smoking"
                                                                class="ml-2 mb-0">Smoking</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('mother_personal') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="mother_personal"
                                                                    id="mother_personal_alcohol" value="Alcohol"
                                                                    v-model="cleftBaby.mother.habbit">
                                                            </div>
                                                            <label for="mother_personal_alcohol"
                                                                class="ml-2 mb-0">Alcohol</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('mother_personal') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="mother_personal"
                                                                    id="mother_personal_non_smoking" value="Non smoking"
                                                                    v-model="cleftBaby.mother.habbit">
                                                            </div>
                                                            <label for="mother_personal_non_smoking" class="ml-2 mb-0">Non
                                                                smoking</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('mother_personal') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="mother_personal"
                                                                    id="mother_personal_exposed" value="Exposed tobacco"
                                                                    v-model="cleftBaby.mother.habbit">
                                                            </div>
                                                            <label for="mother_personal_exposed" class="ml-2 mb-0">Exposed
                                                                tobacco</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <label class="" for="number_of_cigerettes">
                                                            If yes, numbers of cigerettes smoked per day:
                                                        </label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" style="width: 100px;"
                                                                v-model="cleftBaby.mother.number_of_cigerettes"
                                                                rules="numeric" placeholder="0" id="number_of_cigerettes"
                                                                hide-details />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex">
                                                <label
                                                    class="pr-4 font-weight-bold">{{ __('Congenital anomaly: ') }}</label>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('congenital_anomaly') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="congenital_anomaly"
                                                                    id="congenital_anomaly_true" value="1"
                                                                    v-model="cleftBaby.mother.congenital_anomaly">
                                                            </div>
                                                            <label for="congenital_anomaly_true"
                                                                class="ml-2 mb-0">Yes</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('congenital_anomaly') ? ' has-danger' : '' }}">
                                                                <input type="radio" name="congenital_anomaly"
                                                                    id="congenital_anomaly_false" value="0"
                                                                    v-model="cleftBaby.mother.congenital_anomaly">
                                                            </div>
                                                            <label for="congenital_anomaly_false"
                                                                class="ml-2 mb-0">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Co-morbidities: ') }}</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="d-flex flex-wrap">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('co_morbidities') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="co_morbidities"
                                                                    id="co_morbidities_dm" value="DM"
                                                                    v-model="cleftBaby.mother.co_morbidities">
                                                            </div>
                                                            <label for="co_morbidities_dm" class="ml-2 mb-0">DM</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('co_morbidities') ? ' has-danger' : '' }}">
                                                                <input type="checkbox" name="co_morbidities"
                                                                    id="co_morbidities_htn" value="HTN"
                                                                    v-model="cleftBaby.mother.co_morbidities">
                                                            </div>
                                                            <label for="co_morbidities_htn" class="ml-2 mb-0">HTN</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('co_morbidities') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="co_morbidities"
                                                                    id="co_morbidities_asthma" value="Asthma"
                                                                    v-model="cleftBaby.mother.co_morbidities">
                                                            </div>
                                                            <label for="co_morbidities_asthma"
                                                                class="ml-2 mb-0">Asthma</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('co_morbidities') ? ' has-danger' : '' }}">
                                                                <input type="checkbox" name="co_morbidities"
                                                                    id="co_morbidities_tb" value="TB"
                                                                    v-model="cleftBaby.mother.co_morbidities">
                                                            </div>
                                                            <label for="co_morbidities_tb" class="ml-2 mb-0">TB</label>
                                                        </div>

                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('co_morbidities') ? ' has-danger' : '' }}">
                                                                <input type="checkbox" name="co_morbidities"
                                                                    id="co_morbidities_epilepsy" value="Epilepsy"
                                                                    v-model="cleftBaby.mother.co_morbidities">
                                                            </div>
                                                            <label for="co_morbidities_epilepsy"
                                                                class="ml-2 mb-0">Epilepsy</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('co_morbidities') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="co_morbidities"
                                                                    id="co_morbidities_obesity" value="Obesity"
                                                                    v-model="cleftBaby.mother.co_morbidities">
                                                            </div>
                                                            <label for="co_morbidities_obesity" class="ml-2 mb-0">Maternity
                                                                Obesity (BMI during pregnancy > 29kg per Square)</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('co_morbidities') ? ' has-danger' : '' }}">
                                                                <input type="checkbox" name="co_morbidities"
                                                                    id="co_morbidities_none" value="None"
                                                                    v-model="cleftBaby.mother.co_morbidities">
                                                            </div>
                                                            <label for="co_morbidities_none" class="ml-2 mb-0">None</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Medications: ') }}</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="d-flex flex-wrap">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="medications"
                                                                    id="medications_diazepam" value="Diazepam"
                                                                    v-model="cleftBaby.mother.medications">
                                                            </div>
                                                            <label for="medications_diazepam"
                                                                class="ml-2 mb-0">Diazepam</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }}">
                                                                <input type="checkbox" name="medications"
                                                                    id="medications_phenobarbitone" value="Phenobarbitone"
                                                                    v-model="cleftBaby.mother.medications">
                                                            </div>
                                                            <label for="medications_phenobarbitone"
                                                                class="ml-2 mb-0">Phenobarbitone</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="medications"
                                                                    id="medications_phenytoin" value="Phenytoin"
                                                                    v-model="cleftBaby.mother.medications">
                                                            </div>
                                                            <label for="medications_phenytoin"
                                                                class="ml-2 mb-0">Phenytoin</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }}">
                                                                <input type="checkbox" name="medications"
                                                                    id="medications_lithium" value="Lithium"
                                                                    v-model="cleftBaby.mother.medications">
                                                            </div>
                                                            <label for="medications_lithium"
                                                                class="ml-2 mb-0">Lithium</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="medications"
                                                                    id="medications_ocp" value="OCP"
                                                                    v-model="cleftBaby.mother.medications">
                                                            </div>
                                                            <label for="medications_ocp" class="ml-2 mb-0">OCP</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }}">
                                                                <input type="checkbox" name="medications"
                                                                    id="medications_acei_abr" value="ACEI/ABR"
                                                                    v-model="cleftBaby.mother.medications">
                                                            </div>
                                                            <label for="medications_acei_abr"
                                                                class="ml-2 mb-0">ACEI/ABR</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="medications"
                                                                    id="medications_retineric_acid" value="Retineric Acid"
                                                                    v-model="cleftBaby.mother.medications">
                                                            </div>
                                                            <label for="medications_retineric_acid"
                                                                class="ml-2 mb-0">Retineric Acid</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="medications"
                                                                    id="medications_ayurvedic_unani" value="Ayurvedic/Unani"
                                                                    v-model="cleftBaby.mother.medications">
                                                            </div>
                                                            <label for="medications_ayurvedic_unani"
                                                                class="ml-2 mb-0">Ayurvedic/Unani</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="medications"
                                                                    id="medications_homeopathy" value="Homeopathy"
                                                                    v-model="cleftBaby.mother.medications">
                                                            </div>
                                                            <label for="medications_homeopathy"
                                                                class="ml-2 mb-0">Homeopathy</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="medications"
                                                                    id="medications_thalidomide" value="Thalidomide"
                                                                    v-model="cleftBaby.mother.medications">
                                                            </div>
                                                            <label for="medications_thalidomide"
                                                                class="ml-2 mb-0">Thalidomide</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="medications"
                                                                    id="medications_vitamin_a" value="Vitamin A"
                                                                    v-model="cleftBaby.mother.medications">
                                                            </div>
                                                            <label for="medications_vitamin_a" class="ml-2 mb-0">Vitamin
                                                                A</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="medications"
                                                                    id="medications_valproic_acid" value="Valproic Acid"
                                                                    v-model="cleftBaby.mother.medications">
                                                            </div>
                                                            <label for="medications_valproic_acid"
                                                                class="ml-2 mb-0">Valproic Acid</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="medications"
                                                                    id="medications_b_blocker" value="B-blocker"
                                                                    v-model="cleftBaby.mother.medications">
                                                            </div>
                                                            <label for="medications_b_blocker"
                                                                class="ml-2 mb-0">B-blocker</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="medications"
                                                                    id="medications_folate_antagonist"
                                                                    value="Folate antagonist"
                                                                    v-model="cleftBaby.mother.medications">
                                                            </div>
                                                            <label for="medications_folate_antagonist"
                                                                class="ml-2 mb-0">Folate antagonist</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="medications"
                                                                    id="medications_trimethoprim" value="Trimethoprim"
                                                                    v-model="cleftBaby.mother.medications">
                                                            </div>
                                                            <label for="medications_trimethoprim"
                                                                class="ml-2 mb-0">Trimethoprim</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="medications"
                                                                    id="medications_sulfasalazine" value="Sulfasalazine"
                                                                    v-model="cleftBaby.mother.medications">
                                                            </div>
                                                            <label for="medications_sulfasalazine"
                                                                class="ml-2 mb-0">Sulfasalazine</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="medications"
                                                                    id="medications_nitrofurantion" value="Nitrofurantion"
                                                                    v-model="cleftBaby.mother.medications">
                                                            </div>
                                                            <label for="medications_nitrofurantion"
                                                                class="ml-2 mb-0">Nitrofurantion</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="medications"
                                                                    id="medications_ondansetron" value="Ondansetron"
                                                                    v-model="cleftBaby.mother.medications">
                                                            </div>
                                                            <label for="medications_ondansetron"
                                                                class="ml-2 mb-0">Ondansetron</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="medications"
                                                                    id="medications_isotretinoin" value="Isotretinoin"
                                                                    v-model="cleftBaby.mother.medications">
                                                            </div>
                                                            <label for="medications_isotretinoin"
                                                                class="ml-2 mb-0">Isotretinoin</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="medications"
                                                                    id="medications_warfarin" value="Warfarin"
                                                                    v-model="cleftBaby.mother.medications">
                                                            </div>
                                                            <label for="medications_warfarin"
                                                                class="ml-2 mb-0">Warfarin</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="medications"
                                                                    id="medications_des" value="DES (Diethylstilbesterl)"
                                                                    v-model="cleftBaby.mother.medications">
                                                            </div>
                                                            <label for="medications_des" class="ml-2 mb-0">DES
                                                                (Diethylstilbesterl)</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }}">
                                                                <input type="checkbox" name="medications"
                                                                    id="medications_none" value="None"
                                                                    v-model="cleftBaby.mother.medications">
                                                            </div>
                                                            <label for="medications_none" class="ml-2 mb-0">None</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Exposure to insecticides and other toxic agents in antenatal period: ') }}</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('exposure_to_insecticides') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="exposure_to_insecticides"
                                                                    id="exposure_to_insecticides_true" value="1"
                                                                    v-model="cleftBaby.mother.exposure_to_insecticides">
                                                            </div>
                                                            <label for="exposure_to_insecticides_true"
                                                                class="ml-2 mb-0">Yes</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('exposure_to_insecticides') ? ' has-danger' : '' }}">
                                                                <input type="radio" name="exposure_to_insecticides"
                                                                    id="exposure_to_insecticides_false" value="0"
                                                                    v-model="cleftBaby.mother.exposure_to_insecticides">
                                                            </div>
                                                            <label for="exposure_to_insecticides_false"
                                                                class="ml-2 mb-0">No</label>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <label class="" for="number_of_cigerettes">
                                                            If yes, mention the name:
                                                        </label>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" style="width: 100px;"
                                                                v-model="cleftBaby.mother.number_of_cigerettes"
                                                                rules="numeric" id="number_of_cigerettes" hide-details />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Obstetric Variables: ') }}</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label
                                                                class="pr-4 font-weight-bold">{{ __('Number of Pregnancies: ') }}</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="d-flex">
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('number_of_pregnancies') ? ' has-danger' : '' }} ">
                                                                        <input type="radio" name="number_of_pregnancies"
                                                                            id="number_of_pregnancies_1" value="1"
                                                                            v-model="cleftBaby.mother.number_of_pregnancies">
                                                                    </div>
                                                                    <label for="number_of_pregnancies_1"
                                                                        class="ml-2 mb-0">1</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('number_of_pregnancies') ? ' has-danger' : '' }} ">
                                                                        <input type="radio" name="number_of_pregnancies"
                                                                            id="number_of_pregnancies_2" value="2"
                                                                            v-model="cleftBaby.mother.number_of_pregnancies">
                                                                    </div>
                                                                    <label for="number_of_pregnancies_2"
                                                                        class="ml-2 mb-0">2</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('number_of_pregnancies') ? ' has-danger' : '' }} ">
                                                                        <input type="radio" name="number_of_pregnancies"
                                                                            id="number_of_pregnancies_3" value=">=3"
                                                                            v-model="cleftBaby.mother.number_of_pregnancies">
                                                                    </div>
                                                                    <label for="number_of_pregnancies_3" class="ml-2 mb-0">
                                                                        &geq; 3
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label
                                                                class="pr-4 font-weight-bold">{{ __('H/O Pregnancy Loss: ') }}</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="d-flex">
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('ho_pregnancy_loss') ? ' has-danger' : '' }} ">
                                                                        <input type="radio" name="ho_pregnancy_loss"
                                                                            id="ho_pregnancy_loss_0" value="0"
                                                                            v-model="cleftBaby.mother.ho_pregnancy_loss">
                                                                    </div>
                                                                    <label for="ho_pregnancy_loss_0"
                                                                        class="ml-2 mb-0">0</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('ho_pregnancy_loss') ? ' has-danger' : '' }} ">
                                                                        <input type="radio" name="ho_pregnancy_loss"
                                                                            id="ho_pregnancy_loss_1" value="1"
                                                                            v-model="cleftBaby.mother.ho_pregnancy_loss">
                                                                    </div>
                                                                    <label for="ho_pregnancy_loss_1"
                                                                        class="ml-2 mb-0">1</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('ho_pregnancy_loss') ? ' has-danger' : '' }} ">
                                                                        <input type="radio" name="ho_pregnancy_loss"
                                                                            id="ho_pregnancy_loss_2" value=">=2"
                                                                            v-model="cleftBaby.mother.ho_pregnancy_loss">
                                                                    </div>
                                                                    <label for="ho_pregnancy_loss_2" class="ml-2 mb-0">
                                                                        &geq; 2
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label
                                                                class="pr-4 font-weight-bold">{{ __('H/O Pregnancy Termination: ') }}</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="d-flex">
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('ho_pregnancy_termination') ? ' has-danger' : '' }} ">
                                                                        <input type="radio" name="ho_pregnancy_termination"
                                                                            id="ho_pregnancy_termination_0" value="0"
                                                                            v-model="cleftBaby.mother.ho_pregnancy_termination">
                                                                    </div>
                                                                    <label for="ho_pregnancy_termination_0"
                                                                        class="ml-2 mb-0">0</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('ho_pregnancy_termination') ? ' has-danger' : '' }} ">
                                                                        <input type="radio" name="ho_pregnancy_termination"
                                                                            id="ho_pregnancy_termination_1" value="1"
                                                                            v-model="cleftBaby.mother.ho_pregnancy_termination">
                                                                    </div>
                                                                    <label for="ho_pregnancy_termination_1"
                                                                        class="ml-2 mb-0">1</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('ho_pregnancy_termination') ? ' has-danger' : '' }} ">
                                                                        <input type="radio" name="ho_pregnancy_termination"
                                                                            id="ho_pregnancy_termination_2" value=">=2"
                                                                            v-model="cleftBaby.mother.ho_pregnancy_termination">
                                                                    </div>
                                                                    <label for="ho_pregnancy_termination_2"
                                                                        class="ml-2 mb-0">
                                                                        &geq; 2
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <label class="pr-4 font-weight-bold">
                                                        {{ __('Condition of alive babies: ') }}
                                                    </label>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('condition_of_alive_babies') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="condition_of_alive_babies"
                                                                    id="condition_of_alive_babies_healthy" value="Healthy"
                                                                    v-model="cleftBaby.mother.condition_of_alive_babies">
                                                            </div>
                                                            <label for="condition_of_alive_babies_healthy"
                                                                class="ml-2 mb-0">Yes</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('condition_of_alive_babies') ? ' has-danger' : '' }}">
                                                                <input type="radio" name="condition_of_alive_babies"
                                                                    id="condition_of_alive_babies_unhealthy"
                                                                    value="congenital_anomalies"
                                                                    v-model="cleftBaby.mother.condition_of_alive_babies">
                                                            </div>
                                                            <label for="condition_of_alive_babies_unhealthy"
                                                                class="ml-2 mb-0">Congenital Anomalies</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </li>
                                <li>
                                    <label class="pr-4">{{ __('Details of pregnancy including: ') }}</label>
                                    <ol style="list-style-type: lower-alpha">
                                        <li>
                                            <div class="d-flex">
                                                <label
                                                    class="pr-4 font-weight-bold">{{ __('Contamination of drinking water: ') }}</label>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('contamination_drinking_water') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="contamination_drinking_water"
                                                                    id="contamination_drinking_water_true" value="1"
                                                                    v-model="cleftBaby.mother.pregnancy.contamination_drinking_water">
                                                            </div>
                                                            <label for="contamination_drinking_water_true"
                                                                class="ml-2 mb-0">Yes</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('contamination_drinking_water') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="contamination_drinking_water"
                                                                    id="contamination_drinking_water_false" value="0"
                                                                    v-model="cleftBaby.mother.pregnancy.contamination_drinking_water">
                                                            </div>
                                                            <label for="contamination_drinking_water_false"
                                                                class="ml-2 mb-0">No</label>
                                                        </div>

                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <label class="" for="number_of_cigerettes">
                                                            If yes:
                                                        </label>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('contamination_drinking_water_type') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox"
                                                                    name="contamination_drinking_water_type"
                                                                    id="contamination_drinking_water_type_lead" value="Lead"
                                                                    v-model="cleftBaby.mother.pregnancy.contamination_drinking_water_type">
                                                            </div>
                                                            <label for="contamination_drinking_water_type_lead"
                                                                class="ml-2 mb-0">Lead</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('contamination_drinking_water_type') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox"
                                                                    name="contamination_drinking_water_type"
                                                                    id="contamination_drinking_water_type_arsenic"
                                                                    value="Arsenic"
                                                                    v-model="cleftBaby.mother.pregnancy.contamination_drinking_water_type">
                                                            </div>
                                                            <label for="contamination_drinking_water_type_arsenic"
                                                                class="ml-2 mb-0">Arsenic
                                                            </label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('contamination_drinking_water_type') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox"
                                                                    name="contamination_drinking_water_type"
                                                                    id="contamination_drinking_water_type_clorine"
                                                                    value="Clorine"
                                                                    v-model="cleftBaby.mother.pregnancy.contamination_drinking_water_type">
                                                            </div>
                                                            <label for="contamination_drinking_water_type_clorine"
                                                                class="ml-2 mb-0">Clorine</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex">
                                                <label
                                                    class="pr-4 font-weight-bold">{{ __('Hazardous Waste Site: ') }}</label>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('hazardous_waste_site') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="hazardous_waste_site"
                                                                    id="hazardous_waste_site_true" value="1"
                                                                    v-model="cleftBaby.mother.pregnancy.hazardous_waste_site">
                                                            </div>
                                                            <label for="hazardous_waste_site_true"
                                                                class="ml-2 mb-0">Yes</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('hazardous_waste_site') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="hazardous_waste_site"
                                                                    id="hazardous_waste_site_false" value="0"
                                                                    v-model="cleftBaby.mother.pregnancy.hazardous_waste_site">
                                                            </div>
                                                            <label for="hazardous_waste_site_false"
                                                                class="ml-2 mb-0">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Air pollution: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('air_pollution') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="air_pollution"
                                                                    id="air_pollution_true" value="1"
                                                                    v-model="cleftBaby.mother.pregnancy.air_pollution">
                                                            </div>
                                                            <label for="air_pollution_true" class="ml-2 mb-0">Yes</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('air_pollution') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="air_pollution"
                                                                    id="air_pollution_false" value="0"
                                                                    v-model="cleftBaby.mother.pregnancy.air_pollution">
                                                            </div>
                                                            <label for="air_pollution_false" class="ml-2 mb-0">No</label>
                                                        </div>

                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <label class="" for="number_of_cigerettes">
                                                            If yes:
                                                        </label>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('air_pollution_type') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="air_pollution_type"
                                                                    id="air_pollution_type_co" value="CO"
                                                                    v-model="cleftBaby.mother.pregnancy.air_pollution_type">
                                                            </div>
                                                            <label for="air_pollution_type_co" class="ml-2 mb-0">CO</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('air_pollution_type') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="air_pollution_type"
                                                                    id="air_pollution_type_no2" value="NO2"
                                                                    v-model="cleftBaby.mother.pregnancy.air_pollution_type">
                                                            </div>
                                                            <label for="air_pollution_type_no2" class="ml-2 mb-0">
                                                                <span>NO<sub>2</sub></span>
                                                            </label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('air_pollution_type') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="air_pollution_type"
                                                                    id="air_pollution_type_so2" value="SO2"
                                                                    v-model="cleftBaby.mother.pregnancy.air_pollution_type">
                                                            </div>
                                                            <label for="air_pollution_type_so2" class="ml-2 mb-0">
                                                                <span>SO<sub>2</sub></span>
                                                            </label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('air_pollution_type') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="air_pollution_type"
                                                                    id="air_pollution_type_pb" value="PB"
                                                                    v-model="cleftBaby.mother.pregnancy.air_pollution_type">
                                                            </div>
                                                            <label for="air_pollution_type_pb" class="ml-2 mb-0">
                                                                PB
                                                            </label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('air_pollution_type') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="air_pollution_type"
                                                                    id="air_pollution_type_o3" value="O3"
                                                                    v-model="cleftBaby.mother.pregnancy.air_pollution_type">
                                                            </div>
                                                            <label for="air_pollution_type_o3" class="ml-2 mb-0">
                                                                <span>O<sub>3</sub></span>
                                                            </label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('air_pollution_type') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="air_pollution_type"
                                                                    id="air_pollution_type_benzene" value="Benzene"
                                                                    v-model="cleftBaby.mother.pregnancy.air_pollution_type">
                                                            </div>
                                                            <label for="air_pollution_type_benzene" class="ml-2 mb-0">
                                                                Benzene
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex">
                                                <label
                                                    class="pr-4 font-weight-bold">{{ __('Pesticides Expose: ') }}</label>
                                                <div class="flex-grow-1">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('pasticides_expose') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="pasticides_expose"
                                                                    id="pasticides_expose_true" value="1"
                                                                    v-model="cleftBaby.mother.pregnancy.pasticides_expose">
                                                            </div>
                                                            <label for="pasticides_expose_true"
                                                                class="ml-2 mb-0">Yes</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('pasticides_expose') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="pasticides_expose"
                                                                    id="pasticides_expose_false" value="0"
                                                                    v-model="cleftBaby.mother.pregnancy.pasticides_expose">
                                                            </div>
                                                            <label for="pasticides_expose_false"
                                                                class="ml-2 mb-0">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Physical activities during pregnancy: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('physical_activities_during_pregnancy') ? ' has-danger' : '' }} ">
                                                                <input type="radio"
                                                                    name="physical_activities_during_pregnancy"
                                                                    id="physical_activities_during_pregnancy_rest"
                                                                    value="Rest"
                                                                    v-model="cleftBaby.mother.pregnancy.physical_activities_during_pregnancy">
                                                            </div>
                                                            <label for="physical_activities_during_pregnancy_rest"
                                                                class="ml-2 mb-0">At rest</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('physical_activities_during_pregnancy') ? ' has-danger' : '' }} ">
                                                                <input type="radio"
                                                                    name="physical_activities_during_pregnancy"
                                                                    id="physical_activities_during_pregnancy_moderate"
                                                                    value="Moderate"
                                                                    v-model="cleftBaby.mother.pregnancy.physical_activities_during_pregnancy">
                                                            </div>
                                                            <label for="physical_activities_during_pregnancy_moderate"
                                                                class="ml-2 mb-0">Mild to moderate (no heavy weight
                                                                lifting)</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('physical_activities_during_pregnancy') ? ' has-danger' : '' }} ">
                                                                <input type="radio"
                                                                    name="physical_activities_during_pregnancy"
                                                                    id="physical_activities_during_pregnancy_severe"
                                                                    value="Severe"
                                                                    v-model="cleftBaby.mother.pregnancy.physical_activities_during_pregnancy">
                                                            </div>
                                                            <label for="physical_activities_during_pregnancy_severe"
                                                                class="ml-2 mb-0">Moderate to severe (usual daily activities
                                                                including heavy weight lifting)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Sexual Intercourse: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <ol>
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label
                                                                        class="pr-4 font-weight-bold">{{ __('During Pregnancy: ') }}</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="d-flex">
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('intercourse_during_pregnancy') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="intercourse_during_pregnancy"
                                                                                    id="intercourse_during_pregnancy_true"
                                                                                    value="1"
                                                                                    v-model="cleftBaby.mother.pregnancy.intercourse_during_pregnancy">
                                                                            </div>
                                                                            <label for="intercourse_during_pregnancy_true"
                                                                                class="ml-2 mb-0">Yes</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('intercourse_during_pregnancy') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="intercourse_during_pregnancy"
                                                                                    id="intercourse_during_pregnancy_false"
                                                                                    value="0"
                                                                                    v-model="cleftBaby.mother.pregnancy.intercourse_during_pregnancy">
                                                                            </div>
                                                                            <label for="intercourse_during_pregnancy_false"
                                                                                class="ml-2 mb-0">No</label>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-3">
                                                                            <label>
                                                                                If yes, When:
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-9 d-flex">
                                                                            <div class="d-flex align-items-center px-5">
                                                                                <div
                                                                                    class="form-group mb-0 {{ $errors->has('intercourse_during_pregnancy_time_phase') ? ' has-danger' : '' }} ">
                                                                                    <input type="checkbox"
                                                                                        name="intercourse_during_pregnancy_time_phase"
                                                                                        id="intercourse_during_pregnancy_time_phase_first_trimester"
                                                                                        value="first_trimester"
                                                                                        v-model="cleftBaby.mother.pregnancy.intercourse_during_pregnancy_time_phase">
                                                                                </div>
                                                                                <label
                                                                                    for="intercourse_during_pregnancy_time_phase_first_trimester"
                                                                                    class="ml-2 mb-0">
                                                                                    <span>1<sup>st</sup> trimester</span>

                                                                                </label>
                                                                            </div>
                                                                            <div class="d-flex align-items-center px-5">
                                                                                <div
                                                                                    class="form-group mb-0 {{ $errors->has('intercourse_during_pregnancy_time_phase') ? ' has-danger' : '' }} ">
                                                                                    <input type="checkbox"
                                                                                        name="intercourse_during_pregnancy_time_phase"
                                                                                        id="intercourse_during_pregnancy_time_phase__second_trimester"
                                                                                        value="second_trimester"
                                                                                        v-model="cleftBaby.mother.pregnancy.intercourse_during_pregnancy_time_phase">
                                                                                </div>
                                                                                <label
                                                                                    for="intercourse_during_pregnancy_time_phase__second_trimester"
                                                                                    class="ml-2 mb-0">
                                                                                    <span>2<sup>nd</sup> trimester</span>
                                                                                </label>
                                                                            </div>
                                                                            <div class="d-flex align-items-center px-5">
                                                                                <div
                                                                                    class="form-group mb-0 {{ $errors->has('intercourse_during_pregnancy_time_phase') ? ' has-danger' : '' }} ">
                                                                                    <input type="checkbox"
                                                                                        name="intercourse_during_pregnancy_time_phase"
                                                                                        id="intercourse_during_pregnancy_time_phase__third_trimester"
                                                                                        value="third_trimester"
                                                                                        v-model="cleftBaby.mother.pregnancy.intercourse_during_pregnancy_time_phase">
                                                                                </div>
                                                                                <label
                                                                                    for="intercourse_during_pregnancy_time_phase__third_trimester"
                                                                                    class="ml-2 mb-0">
                                                                                    <span>3<sup>rd</sup> trimester</span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row align-items-center">
                                                                        <div class="col-md-3">
                                                                            <label>
                                                                                Was there anything like:
                                                                            </label>
                                                                        </div>
                                                                        <div class="col-md-9 d-flex">
                                                                            <div class="d-flex align-items-center px-5">
                                                                                <div
                                                                                    class="form-group mb-0 {{ $errors->has('intercourse_during_pregnancy_unusual_symptom') ? ' has-danger' : '' }} ">
                                                                                    <input type="checkbox"
                                                                                        name="intercourse_during_pregnancy_unusual_symptom"
                                                                                        id="intercourse_during_pregnancy_unusual_symptom_unusual_pain"
                                                                                        value="unusual_pain"
                                                                                        v-model="cleftBaby.mother.pregnancy.intercourse_during_pregnancy_unusual_symptom">
                                                                                </div>
                                                                                <label
                                                                                    for="intercourse_during_pregnancy_unusual_symptom_unusual_pain"
                                                                                    class="ml-2 mb-0">
                                                                                    Unusual Pain

                                                                                </label>
                                                                            </div>
                                                                            <div class="d-flex align-items-center px-5">
                                                                                <div
                                                                                    class="form-group mb-0 {{ $errors->has('intercourse_during_pregnancy_unusual_symptom') ? ' has-danger' : '' }} ">
                                                                                    <input type="checkbox"
                                                                                        name="intercourse_during_pregnancy_unusual_symptom"
                                                                                        id="intercourse_during_pregnancy_unusual_symptom_unusual_bleeding"
                                                                                        value="unusual_bleeding"
                                                                                        v-model="cleftBaby.mother.pregnancy.intercourse_during_pregnancy_unusual_symptom">
                                                                                </div>
                                                                                <label
                                                                                    for="intercourse_during_pregnancy_unusual_symptom_unusual_bleeding"
                                                                                    class="ml-2 mb-0">
                                                                                    Unusual Bleeding

                                                                                </label>
                                                                            </div>
                                                                            <div class="d-flex align-items-center px-5">
                                                                                <div
                                                                                    class="form-group mb-0 {{ $errors->has('intercourse_during_pregnancy_unusual_symptom') ? ' has-danger' : '' }} ">
                                                                                    <input type="checkbox"
                                                                                        name="intercourse_during_pregnancy_unusual_symptom"
                                                                                        id="intercourse_during_pregnancy_unusual_symptom_unusual_discharge"
                                                                                        value="unusual_discharge"
                                                                                        v-model="cleftBaby.mother.pregnancy.intercourse_during_pregnancy_unusual_symptom">
                                                                                </div>
                                                                                <label
                                                                                    for="intercourse_during_pregnancy_unusual_symptom_unusual_discharge"
                                                                                    class="ml-2 mb-0">
                                                                                    Unusual Discharge
                                                                                </label>
                                                                            </div>
                                                                            <div class="d-flex align-items-center px-5">
                                                                                <div
                                                                                    class="form-group mb-0 {{ $errors->has('intercourse_during_pregnancy_unusual_symptom') ? ' has-danger' : '' }} ">
                                                                                    <input type="checkbox"
                                                                                        name="intercourse_during_pregnancy_unusual_symptom"
                                                                                        id="intercourse_during_pregnancy_unusual_symptom__others"
                                                                                        value="others"
                                                                                        v-model="cleftBaby.mother.pregnancy.intercourse_during_pregnancy_unusual_symptom">
                                                                                </div>
                                                                                <label
                                                                                    for="intercourse_during_pregnancy_unusual_symptom__others"
                                                                                    class="ml-2 mb-0">
                                                                                    Others
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label
                                                                        class="pr-4 font-weight-bold">{{ __('Post – conception: resume of coitus: ') }}</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="d-flex">
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('intercourse_during_post_conception') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="intercourse_during_post_conception"
                                                                                    id="intercourse_during_post_conception_less_than_one_month"
                                                                                    value="less_than_one_month"
                                                                                    v-model="cleftBaby.mother.pregnancy.intercourse_during_post_conception">
                                                                            </div>
                                                                            <label
                                                                                for="intercourse_during_post_conception_less_than_one_month"
                                                                                class="ml-2 mb-0">
                                                                                < 1 month</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('intercourse_during_post_conception') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="intercourse_during_post_conception"
                                                                                    id="intercourse_during_post_conception_one_to_three_month"
                                                                                    value="one_to_three_month"
                                                                                    v-model="cleftBaby.mother.pregnancy.intercourse_during_post_conception">
                                                                            </div>
                                                                            <label
                                                                                for="intercourse_during_post_conception_one_to_three_month"
                                                                                class="ml-2 mb-0">1-3 months</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('intercourse_during_post_conception') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="intercourse_during_post_conception"
                                                                                    id="intercourse_during_post_conception_more_than_one_month"
                                                                                    value="more_than_one_month"
                                                                                    v-model="cleftBaby.mother.pregnancy.intercourse_during_post_conception">
                                                                            </div>
                                                                            <label
                                                                                for="intercourse_during_post_conception_more_than_one_month"
                                                                                class="ml-2 mb-0">> 3 month</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="pr-4 font-weight-bold">{{ __('Stress: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('stress') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="stress" id="stress_true" value="1"
                                                                    v-model="cleftBaby.mother.pregnancy.stress">
                                                            </div>
                                                            <label for="stress_true" class="ml-2 mb-0">Yes</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('stress') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="stress" id="stress_false"
                                                                    value="0" v-model="cleftBaby.mother.pregnancy.stress">
                                                            </div>
                                                            <label for="stress_false" class="ml-2 mb-0">No</label>
                                                        </div>

                                                    </div>
                                                    <div class="row align-items-center">
                                                        <div class="col-md-3">
                                                            <label>
                                                                If yes:
                                                            </label>
                                                        </div>
                                                        <div class="col-md-9 d-flex">
                                                            <div class="d-flex align-items-center px-5">
                                                                <div
                                                                    class="form-group mb-0 {{ $errors->has('stress_type') ? ' has-danger' : '' }} ">
                                                                    <input type="checkbox" name="stress_type"
                                                                        id="stress_type_death_of_close_one"
                                                                        value="death_of_close_one"
                                                                        v-model="cleftBaby.mother.pregnancy.stress_type">
                                                                </div>
                                                                <label for="stress_type_death_of_close_one"
                                                                    class="ml-2 mb-0">Death or Major illness of close
                                                                    one</label>
                                                            </div>
                                                            <div class="d-flex align-items-center px-5">
                                                                <div
                                                                    class="form-group mb-0 {{ $errors->has('stress_type') ? ' has-danger' : '' }} ">
                                                                    <input type="checkbox" name="stress_type"
                                                                        id="stress_type_seperation_or_divorce"
                                                                        value="seperation_or_divorce"
                                                                        v-model="cleftBaby.mother.pregnancy.stress_type">
                                                                </div>
                                                                <label for="stress_type_seperation_or_divorce"
                                                                    class="ml-2 mb-0">
                                                                    Seperation/Divorce
                                                                </label>
                                                            </div>
                                                            <div class="d-flex align-items-center px-5">
                                                                <div
                                                                    class="form-group mb-0 {{ $errors->has('stress_type') ? ' has-danger' : '' }} ">
                                                                    <input type="checkbox" name="stress_type"
                                                                        id="stress_type_loss_of_job" value="loss_of_job"
                                                                        v-model="cleftBaby.mother.pregnancy.stress_type">
                                                                </div>
                                                                <label for="stress_type_loss_of_job" class="ml-2 mb-0">
                                                                    Loss of job
                                                                </label>
                                                            </div>
                                                            <div class="d-flex align-items-center px-5">
                                                                <div
                                                                    class="form-group mb-0 {{ $errors->has('stress_type') ? ' has-danger' : '' }} ">
                                                                    <input type="checkbox" name="stress_type"
                                                                        id="stress_type_familial_difficulties"
                                                                        value="familial_difficulties"
                                                                        v-model="cleftBaby.mother.pregnancy.stress_type">
                                                                </div>
                                                                <label for="stress_type_familial_difficulties"
                                                                    class="ml-2 mb-0">
                                                                    Familial difficulties
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Gestetional Diabetes Mellitus: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('gestetional_diabetes_mellitus') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="gestetional_diabetes_mellitus"
                                                                    id="gestetional_diabetes_mellitus_true" value="1"
                                                                    v-model="cleftBaby.mother.pregnancy.gestetional_diabetes_mellitus">
                                                            </div>
                                                            <label for="gestetional_diabetes_mellitus_true"
                                                                class="ml-2 mb-0">Yes</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('gestetional_diabetes_mellitus') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="gestetional_diabetes_mellitus"
                                                                    id="gestetional_diabetes_mellitus_false" value="0"
                                                                    v-model="cleftBaby.mother.pregnancy.gestetional_diabetes_mellitus">
                                                            </div>
                                                            <label for="gestetional_diabetes_mellitus_false"
                                                                class="ml-2 mb-0">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="pr-4 font-weight-bold">{{ __('Fever: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('fever') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="fever" id="fever_true" value="1"
                                                                    v-model="cleftBaby.mother.pregnancy.fever">
                                                            </div>
                                                            <label for="fever_true" class="ml-2 mb-0">Yes</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('fever') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="fever" id="fever_false" value="0"
                                                                    v-model="cleftBaby.mother.pregnancy.fever">
                                                            </div>
                                                            <label for="fever_false" class="ml-2 mb-0">No</label>
                                                        </div>

                                                    </div>
                                                    <div class="row align-items-center">
                                                        <div class="col-md-3">
                                                            <label>
                                                                If yes:
                                                            </label>
                                                        </div>
                                                        <div class="col-md-9 d-flex">
                                                            <div class="d-flex align-items-center px-5">
                                                                <div
                                                                    class="form-group mb-0 {{ $errors->has('fever_period') ? ' has-danger' : '' }} ">
                                                                    <input type="checkbox" name="fever_period"
                                                                        id="fever_period_first_trimester"
                                                                        value="first_trimester"
                                                                        v-model="cleftBaby.mother.pregnancy.fever_period">
                                                                </div>
                                                                <label for="fever_period_first_trimester" class="ml-2 mb-0">
                                                                    <span>1<sup>st</sup> trimester</span>

                                                                </label>
                                                            </div>
                                                            <div class="d-flex align-items-center px-5">
                                                                <div
                                                                    class="form-group mb-0 {{ $errors->has('fever_period') ? ' has-danger' : '' }} ">
                                                                    <input type="checkbox" name="fever_period"
                                                                        id="fever_period__second_trimester"
                                                                        value="second_trimester"
                                                                        v-model="cleftBaby.mother.pregnancy.fever_period">
                                                                </div>
                                                                <label for="fever_period__second_trimester"
                                                                    class="ml-2 mb-0">
                                                                    <span>2<sup>nd</sup> trimester</span>
                                                                </label>
                                                            </div>
                                                            <div class="d-flex align-items-center px-5">
                                                                <div
                                                                    class="form-group mb-0 {{ $errors->has('fever_period') ? ' has-danger' : '' }} ">
                                                                    <input type="checkbox" name="fever_period"
                                                                        id="fever_period__third_trimester"
                                                                        value="third_trimester"
                                                                        v-model="cleftBaby.mother.pregnancy.fever_period">
                                                                </div>
                                                                <label for="fever_period__third_trimester"
                                                                    class="ml-2 mb-0">
                                                                    <span>3<sup>rd</sup> trimester</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Accidents/trauma to abdomen during pregnancy: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('abdominal_trauma') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="abdominal_trauma"
                                                                    id="abdominal_trauma_true" value="1"
                                                                    v-model="cleftBaby.mother.pregnancy.abdominal_trauma">
                                                            </div>
                                                            <label for="abdominal_trauma_true" class="ml-2 mb-0">Yes</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('abdominal_trauma') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="abdominal_trauma"
                                                                    id="abdominal_trauma_false" value="0"
                                                                    v-model="cleftBaby.mother.pregnancy.abdominal_trauma">
                                                            </div>
                                                            <label for="abdominal_trauma_false" class="ml-2 mb-0">No</label>
                                                        </div>

                                                    </div>
                                                    <div class="row align-items-center">
                                                        <div class="col-md-3">
                                                            <label>
                                                                If yes, at which time of pregnancy:
                                                            </label>
                                                        </div>
                                                        <div class="col-md-9 d-flex">
                                                            <div class="d-flex align-items-center px-5">
                                                                <div
                                                                    class="form-group mb-0 {{ $errors->has('abdominal_trauma_period') ? ' has-danger' : '' }} ">
                                                                    <input type="checkbox" name="abdominal_trauma_period"
                                                                        id="abdominal_trauma_period_first_trimester"
                                                                        value="first_trimester"
                                                                        v-model="cleftBaby.mother.pregnancy.abdominal_trauma_period">
                                                                </div>
                                                                <label for="abdominal_trauma_period_first_trimester"
                                                                    class="ml-2 mb-0">
                                                                    <span>1<sup>st</sup> trimester</span>

                                                                </label>
                                                            </div>
                                                            <div class="d-flex align-items-center px-5">
                                                                <div
                                                                    class="form-group mb-0 {{ $errors->has('abdominal_trauma_period') ? ' has-danger' : '' }} ">
                                                                    <input type="checkbox" name="abdominal_trauma_period"
                                                                        id="abdominal_trauma_period__second_trimester"
                                                                        value="second_trimester"
                                                                        v-model="cleftBaby.mother.pregnancy.abdominal_trauma_period">
                                                                </div>
                                                                <label for="abdominal_trauma_period__second_trimester"
                                                                    class="ml-2 mb-0">
                                                                    <span>2<sup>nd</sup> trimester</span>
                                                                </label>
                                                            </div>
                                                            <div class="d-flex align-items-center px-5">
                                                                <div
                                                                    class="form-group mb-0 {{ $errors->has('abdominal_trauma_period') ? ' has-danger' : '' }} ">
                                                                    <input type="checkbox" name="abdominal_trauma_period"
                                                                        id="abdominal_trauma_period__third_trimester"
                                                                        value="third_trimester"
                                                                        v-model="cleftBaby.mother.pregnancy.abdominal_trauma_period">
                                                                </div>
                                                                <label for="abdominal_trauma_period__third_trimester"
                                                                    class="ml-2 mb-0">
                                                                    <span>3<sup>rd</sup> trimester</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Accidents/trauma to abdomen during pregnancy: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('amniotic_membranes_rupture') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="amniotic_membranes_rupture"
                                                                    id="amniotic_membranes_rupture_Pre-term"
                                                                    value="Pre-term"
                                                                    v-model="cleftBaby.mother.pregnancy.amniotic_membranes_rupture">
                                                            </div>
                                                            <label for="amniotic_membranes_rupture_Pre-term"
                                                                class="ml-2 mb-0">Pre-term (> 3-10 weeks before EDD)</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('amniotic_membranes_rupture') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="amniotic_membranes_rupture"
                                                                    id="amniotic_membranes_rupture_term" value="Term"
                                                                    v-model="cleftBaby.mother.pregnancy.amniotic_membranes_rupture">
                                                            </div>
                                                            <label for="amniotic_membranes_rupture_term"
                                                                class="ml-2 mb-0">Term (EDD +- 2 weeks)</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('amniotic_membranes_rupture') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="amniotic_membranes_rupture"
                                                                    id="amniotic_membranes_rupture_post_term"
                                                                    value="Post-Term"
                                                                    v-model="cleftBaby.mother.pregnancy.amniotic_membranes_rupture">
                                                            </div>
                                                            <label for="amniotic_membranes_rupture_post_term"
                                                                class="ml-2 mb-0">Post-term (> 2 weeks after EDD)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Accidents/trauma to abdomen during pregnancy: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('amniotic_fluid_amount') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="amniotic_fluid_amount"
                                                                    id="amniotic_fluid_amount_Oligohydramnios"
                                                                    value="Oligohydramnios"
                                                                    v-model="cleftBaby.mother.pregnancy.amniotic_fluid_amount">
                                                            </div>
                                                            <label for="amniotic_fluid_amount_Oligohydramnios"
                                                                class="ml-2 mb-0">Oligohydramnios</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('amniotic_fluid_amount') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="amniotic_fluid_amount"
                                                                    id="amniotic_fluid_amount_Normal" value="Normal"
                                                                    v-model="cleftBaby.mother.pregnancy.amniotic_fluid_amount">
                                                            </div>
                                                            <label for="amniotic_fluid_amount_Normal"
                                                                class="ml-2 mb-0">Normal</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('amniotic_fluid_amount') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="amniotic_fluid_amount"
                                                                    id="amniotic_fluid_amount_Polyhydramnios"
                                                                    value="Polyhydramnios"
                                                                    v-model="cleftBaby.mother.pregnancy.amniotic_fluid_amount">
                                                            </div>
                                                            <label for="amniotic_fluid_amount_Polyhydramnios"
                                                                class="ml-2 mb-0">Polyhydramnios</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Early amniotic fluid leak: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('early_amniotic_fluid_leak') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="early_amniotic_fluid_leak"
                                                                    id="early_amniotic_fluid_leak_true" value="1"
                                                                    v-model="cleftBaby.mother.pregnancy.early_amniotic_fluid_leak">
                                                            </div>
                                                            <label for="early_amniotic_fluid_leak_true"
                                                                class="ml-2 mb-0">Yes</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('early_amniotic_fluid_leak') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="early_amniotic_fluid_leak"
                                                                    id="early_amniotic_fluid_leak_false" value="0"
                                                                    v-model="cleftBaby.mother.pregnancy.early_amniotic_fluid_leak">
                                                            </div>
                                                            <label for="early_amniotic_fluid_leak_false"
                                                                class="ml-2 mb-0">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </li>
                                <li>
                                    <label class="pr-4">{{ __('Particulars of Father: ') }}</label>
                                    <ol style="list-style-type: lower-alpha">
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Occupation: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('father_occupation') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="father_occupation"
                                                                    id="father_occupation_Unemployed" value="Unemployed"
                                                                    v-model="cleftBaby.father.occupation">
                                                            </div>
                                                            <label for="father_occupation_Unemployed"
                                                                class="ml-2 mb-0">Unemployed</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('father_occupation') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="father_occupation"
                                                                    id="father_occupation_Business" value="Business"
                                                                    v-model="cleftBaby.father.occupation">
                                                            </div>
                                                            <label for="father_occupation_Business"
                                                                class="ml-2 mb-0">Business</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('father_occupation') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="father_occupation"
                                                                    id="father_occupation_Service" value="Service"
                                                                    v-model="cleftBaby.father.occupation">
                                                            </div>
                                                            <label for="father_occupation_Service"
                                                                class="ml-2 mb-0">Service</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('father_occupation') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="father_occupation"
                                                                    id="father_occupation_Day_Labour" value="Day Labour"
                                                                    v-model="cleftBaby.father.occupation">
                                                            </div>
                                                            <label for="father_occupation_Day_Labour" class="ml-2 mb-0">Day
                                                                Labour</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('father_occupation') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="father_occupation"
                                                                    id="father_occupation_Rikshqw_puller"
                                                                    value="Rikshaw Puller"
                                                                    v-model="cleftBaby.father.occupation">
                                                            </div>
                                                            <label for="father_occupation_Rikshqw_puller"
                                                                class="ml-2 mb-0">Rikshaw Puller</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('father_occupation') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="father_occupation"
                                                                    id="father_occupation_Farmer" value="Farmer"
                                                                    v-model="cleftBaby.father.occupation">
                                                            </div>
                                                            <label for="father_occupation_Farmer"
                                                                class="ml-2 mb-0">Farmer</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('father_occupation') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="father_occupation"
                                                                    id="father_occupation_others" value="Others"
                                                                    v-model="cleftBaby.father.occupation">
                                                            </div>
                                                            <label for="father_occupation_others"
                                                                class="ml-2 mb-0">Others</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="pr-4 font-weight-bold">{{ __('Personal: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('father_personal') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="father_personal"
                                                                    id="father_personal_smoking" value="Smoking"
                                                                    v-model="cleftBaby.father.habbit">
                                                            </div>
                                                            <label for="father_personal_smoking"
                                                                class="ml-2 mb-0">Smoking</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('father_personal') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="father_personal"
                                                                    id="father_personal_alcohol" value="Alcohol"
                                                                    v-model="cleftBaby.father.habbit">
                                                            </div>
                                                            <label for="father_personal_alcohol"
                                                                class="ml-2 mb-0">Alcohol</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('father_personal') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="father_personal"
                                                                    id="father_personal_non_smoking" value="Non-smoking"
                                                                    v-model="cleftBaby.father.habbit">
                                                            </div>
                                                            <label for="father_personal_non_smoking"
                                                                class="ml-2 mb-0">Non-smoking tobacco</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Congenital anomaly: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('father_congenital_anomaly') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="father_congenital_anomaly"
                                                                    id="father_congenital_anomaly_true" value="1"
                                                                    v-model="cleftBaby.father.congenital_anomaly">
                                                            </div>
                                                            <label for="father_congenital_anomaly_true"
                                                                class="ml-2 mb-0">Yes</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('father_congenital_anomaly') ? ' has-danger' : '' }}">
                                                                <input type="radio" name="father_congenital_anomaly"
                                                                    id="father_congenital_anomaly_false" value="0"
                                                                    v-model="cleftBaby.father.congenital_anomaly">
                                                            </div>
                                                            <label for="father_congenital_anomaly_false"
                                                                class="ml-2 mb-0">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Co-morbidities: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex flex-wrap">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('father_co_morbidities') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="father_co_morbidities"
                                                                    id="father_co_morbidities_dm" value="DM"
                                                                    v-model="cleftBaby.father.co_morbidities">
                                                            </div>
                                                            <label for="father_co_morbidities_dm"
                                                                class="ml-2 mb-0">DM</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('father_co_morbidities') ? ' has-danger' : '' }}">
                                                                <input type="checkbox" name="father_co_morbidities"
                                                                    id="father_co_morbidities_htn" value="HTN"
                                                                    v-model="cleftBaby.father.co_morbidities">
                                                            </div>
                                                            <label for="father_co_morbidities_htn"
                                                                class="ml-2 mb-0">HTN</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('father_co_morbidities') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" name="father_co_morbidities"
                                                                    id="father_co_morbidities_asthma" value="Asthma"
                                                                    v-model="cleftBaby.father.co_morbidities">
                                                            </div>
                                                            <label for="father_co_morbidities_asthma"
                                                                class="ml-2 mb-0">Asthma</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('father_co_morbidities') ? ' has-danger' : '' }}">
                                                                <input type="checkbox" name="father_co_morbidities"
                                                                    id="father_co_morbidities_tb" value="TB"
                                                                    v-model="cleftBaby.father.co_morbidities">
                                                            </div>
                                                            <label for="father_co_morbidities_tb"
                                                                class="ml-2 mb-0">TB</label>
                                                        </div>

                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('father_co_morbidities') ? ' has-danger' : '' }}">
                                                                <input type="checkbox" name="father_co_morbidities"
                                                                    id="father_co_morbidities_epilepsy" value="Epilepsy"
                                                                    v-model="cleftBaby.father.co_morbidities">
                                                            </div>
                                                            <label for="father_co_morbidities_epilepsy"
                                                                class="ml-2 mb-0">Epilepsy</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('father_co_morbidities') ? ' has-danger' : '' }}">
                                                                <input type="checkbox" name="father_co_morbidities"
                                                                    id="father_co_morbidities_none" value="None"
                                                                    v-model="cleftBaby.father.co_morbidities">
                                                            </div>
                                                            <label for="father_co_morbidities_none"
                                                                class="ml-2 mb-0">None</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Medications: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex flex-wrap">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" id="father_medications_diazepam"
                                                                    value="Diazepam" v-model="cleftBaby.father.medications">
                                                            </div>
                                                            <label for="father_medications_diazepam"
                                                                class="ml-2 mb-0">Diazepam</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }}">
                                                                <input type="checkbox"
                                                                    id="father_medications_phenobarbitone"
                                                                    value="Phenobarbitone"
                                                                    v-model="cleftBaby.father.medications">
                                                            </div>
                                                            <label for="father_medications_phenobarbitone"
                                                                class="ml-2 mb-0">Phenobarbitone</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" id="father_medications_phenytoin"
                                                                    value="Phenytoin"
                                                                    v-model="cleftBaby.father.medications">
                                                            </div>
                                                            <label for="father_medications_phenytoin"
                                                                class="ml-2 mb-0">Phenytoin</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }}">
                                                                <input type="checkbox" id="father_medications_lithium"
                                                                    value="Lithium" v-model="cleftBaby.father.medications">
                                                            </div>
                                                            <label for="father_medications_lithium"
                                                                class="ml-2 mb-0">Lithium</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" id="father_medications_ocp"
                                                                    value="OCP" v-model="cleftBaby.father.medications">
                                                            </div>
                                                            <label for="father_medications_ocp"
                                                                class="ml-2 mb-0">OCP</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }}">
                                                                <input type="checkbox" id="father_medications_acei_abr"
                                                                    value="ACEI/ABR" v-model="cleftBaby.father.medications">
                                                            </div>
                                                            <label for="father_medications_acei_abr"
                                                                class="ml-2 mb-0">ACEI/ABR</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox"
                                                                    id="father_medications_ayurvedic_unani"
                                                                    value="Ayurvedic/Unani"
                                                                    v-model="cleftBaby.father.medications">
                                                            </div>
                                                            <label for="father_medications_ayurvedic_unani"
                                                                class="ml-2 mb-0">Ayurvedic/Unani</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }} ">
                                                                <input type="checkbox" id="father_medications_homeopathy"
                                                                    value="Homeopathy"
                                                                    v-model="cleftBaby.father.medications">
                                                            </div>
                                                            <label for="father_medications_homeopathy"
                                                                class="ml-2 mb-0">Homeopathy</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('medications') ? ' has-danger' : '' }}">
                                                                <input type="checkbox" id="father_medications_none"
                                                                    value="None" v-model="cleftBaby.father.medications">
                                                            </div>
                                                            <label for="father_medications_none"
                                                                class="ml-2 mb-0">None</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </li>
                                <li>
                                    <label class="pr-4">{{ __('Particulars of Delivery: ') }}</label>
                                    <ol style="list-style-type: lower-alpha">
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Mode of delivering : ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('delivery_type') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="delivery_type"
                                                                    id="delivery_type_NVD" value="NVD"
                                                                    v-model="cleftBaby.mother.delivery.mode">
                                                            </div>
                                                            <label for="delivery_type_NVD" class="ml-2 mb-0">NVD (Normal
                                                                Vaginal Delivery)</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('delivery_type') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="delivery_type"
                                                                    id="delivery_type_Caesar" value="Caesar"
                                                                    v-model="cleftBaby.mother.delivery.mode">
                                                            </div>
                                                            <label for="delivery_type_Caesar" class="ml-2 mb-0">Caesarean
                                                                Section Delivery</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    {{-- <label class="pr-4 font-weight-bold">{{ __('Mode of delivering : ') }}</label> --}}
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('delivery_mode') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="delivery_mode"
                                                                    id="delivery_mode_Spontaneous" value="Spontaneous"
                                                                    v-model="cleftBaby.mother.delivery.type">
                                                            </div>
                                                            <label for="delivery_mode_Spontaneous"
                                                                class="ml-2 mb-0">Spontaneous</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('delivery_mode') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="delivery_mode"
                                                                    id="delivery_mode_Induced" value="Induced"
                                                                    v-model="cleftBaby.mother.delivery.type">
                                                            </div>
                                                            <label for="delivery_mode_Induced"
                                                                class="ml-2 mb-0">Induced</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    {{-- <label class="pr-4 font-weight-bold">{{ __('Mode of delivering : ') }}</label> --}}
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('membranes_rupture_type') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="membranes_rupture_type"
                                                                    id="membranes_rupture_type_Spontaneous"
                                                                    value="Spontaneous"
                                                                    v-model="cleftBaby.mother.delivery.type">
                                                            </div>
                                                            <label for="membranes_rupture_type_Spontaneous"
                                                                class="ml-2 mb-0">Spontaneous rupture of membranes</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('membranes_rupture_type') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="membranes_rupture_type"
                                                                    id="membranes_rupture_type_Artificial"
                                                                    value="Artificial"
                                                                    v-model="cleftBaby.mother.delivery.type">
                                                            </div>
                                                            <label for="membranes_rupture_type_Artificial"
                                                                class="ml-2 mb-0">Artificial rupture of membranes
                                                                (ARM)</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('membranes_rupture_type') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="membranes_rupture_type"
                                                                    id="membranes_rupture_type_None" value="None"
                                                                    v-model="cleftBaby.mother.delivery.type">
                                                            </div>
                                                            <label for="membranes_rupture_type_None"
                                                                class="ml-2 mb-0">None</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Time between rupture of membranes and delivery: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('time_after_membranes_rupture') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="time_after_membranes_rupture"
                                                                    id="time_after_membranes_rupture_less_a_hour"
                                                                    value="less_a_hour"
                                                                    v-model="cleftBaby.mother.delivery.time_after_membranes_rupture">
                                                            </div>
                                                            <label for="time_after_membranes_rupture_less_a_hour"
                                                                class="ml-2 mb-0">
                                                                < 1 hour</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('time_after_membranes_rupture') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="time_after_membranes_rupture"
                                                                    id="time_after_membranes_rupture_one_to_six_hours"
                                                                    value="one_to_six_hours"
                                                                    v-model="cleftBaby.mother.delivery.time_after_membranes_rupture">
                                                            </div>
                                                            <label for="time_after_membranes_rupture_one_to_six_hours"
                                                                class="ml-2 mb-0">1-6 hours</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('time_after_membranes_rupture') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="time_after_membranes_rupture"
                                                                    id="time_after_membranes_rupture_seven_to_twenty_four_hours"
                                                                    value="seven_to_twenty_four_hours"
                                                                    v-model="cleftBaby.mother.delivery.time_after_membranes_rupture">
                                                            </div>
                                                            <label
                                                                for="time_after_membranes_rupture_seven_to_twenty_four_hours"
                                                                class="ml-2 mb-0">1-6 hours</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('time_after_membranes_rupture') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="time_after_membranes_rupture"
                                                                    id="time_after_membranes_rupture_more_than_twenty_four_hours"
                                                                    value="more_than_twenty_four_hours"
                                                                    v-model="cleftBaby.mother.delivery.time_after_membranes_rupture">
                                                            </div>
                                                            <label
                                                                for="time_after_membranes_rupture_more_than_twenty_four_hours"
                                                                class="ml-2 mb-0">> 24 hours</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('time_after_membranes_rupture') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="time_after_membranes_rupture"
                                                                    id="time_after_membranes_rupture_None" value="None"
                                                                    v-model="cleftBaby.mother.delivery.time_after_membranes_rupture">
                                                            </div>
                                                            <label for="time_after_membranes_rupture_None"
                                                                class="ml-2 mb-0">None</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </li>
                                <li>
                                    <label
                                        class="pr-4">{{ __('Particulars of   newborn: (from pre-operative photos where available and added information from examination): ') }}</label>
                                    <ol style="list-style-type: lower-alpha">
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Age of mother at this/affected pregnancy: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('mother_age_during_affected_pregnancy') ? ' has-danger' : '' }} ">
                                                                <input type="radio"
                                                                    name="mother_age_during_affected_pregnancy"
                                                                    id="mother_age_during_affected_pregnancy_less_or_equal_20_years"
                                                                    value="less_or_equal_20_years"
                                                                    v-model="cleftBaby.mother.newborn.mother_age_during_affected_pregnancy">
                                                            </div>
                                                            <label
                                                                for="mother_age_during_affected_pregnancy_less_or_equal_20_years"
                                                                class="ml-2 mb-0">&leq; 20 years</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('mother_age_during_affected_pregnancy') ? ' has-danger' : '' }} ">
                                                                <input type="radio"
                                                                    name="mother_age_during_affected_pregnancy"
                                                                    id="mother_age_during_affected_pregnancy_21_to_25_years"
                                                                    value="21_to_25_years"
                                                                    v-model="cleftBaby.mother.newborn.mother_age_during_affected_pregnancy">
                                                            </div>
                                                            <label for="mother_age_during_affected_pregnancy_21_to_25_years"
                                                                class="ml-2 mb-0">21-25 years</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('mother_age_during_affected_pregnancy') ? ' has-danger' : '' }} ">
                                                                <input type="radio"
                                                                    name="mother_age_during_affected_pregnancy"
                                                                    id="mother_age_during_affected_pregnancy_26_to_30_years"
                                                                    value="26_to_30_years"
                                                                    v-model="cleftBaby.mother.newborn.mother_age_during_affected_pregnancy">
                                                            </div>
                                                            <label for="mother_age_during_affected_pregnancy_26_to_30_years"
                                                                class="ml-2 mb-0">26-30 years</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('mother_age_during_affected_pregnancy') ? ' has-danger' : '' }} ">
                                                                <input type="radio"
                                                                    name="mother_age_during_affected_pregnancy"
                                                                    id="mother_age_during_affected_pregnancy_greater_or_equal_31_years"
                                                                    value="greater_or_equal_31_years"
                                                                    v-model="cleftBaby.mother.newborn.mother_age_during_affected_pregnancy">
                                                            </div>
                                                            <label
                                                                for="mother_age_during_affected_pregnancy_greater_or_equal_31_years"
                                                                class="ml-2 mb-0">&geq; 31 years</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Age of father at this/affected pregnancy: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('father_age_during_affected_pregnancy') ? ' has-danger' : '' }} ">
                                                                <input type="radio"
                                                                    name="father_age_during_affected_pregnancy"
                                                                    id="father_age_during_affected_pregnancy_less_or_equal_20_years"
                                                                    value="less_or_equal_20_years"
                                                                    v-model="cleftBaby.mother.newborn.father_age_during_affected_pregnancy">
                                                            </div>
                                                            <label
                                                                for="father_age_during_affected_pregnancy_less_or_equal_20_years"
                                                                class="ml-2 mb-0">&leq; 20 years</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('father_age_during_affected_pregnancy') ? ' has-danger' : '' }} ">
                                                                <input type="radio"
                                                                    name="father_age_during_affected_pregnancy"
                                                                    id="father_age_during_affected_pregnancy_21_to_30_years"
                                                                    value="21_to_30_years"
                                                                    v-model="cleftBaby.mother.newborn.father_age_during_affected_pregnancy">
                                                            </div>
                                                            <label for="father_age_during_affected_pregnancy_21_to_30_years"
                                                                class="ml-2 mb-0">21-30 years</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('father_age_during_affected_pregnancy') ? ' has-danger' : '' }} ">
                                                                <input type="radio"
                                                                    name="father_age_during_affected_pregnancy"
                                                                    id="father_age_during_affected_pregnancy_31_to_40_years"
                                                                    value="31_to_40_years"
                                                                    v-model="cleftBaby.mother.newborn.father_age_during_affected_pregnancy">
                                                            </div>
                                                            <label for="father_age_during_affected_pregnancy_31_to_40_years"
                                                                class="ml-2 mb-0">31-40 years</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('father_age_during_affected_pregnancy') ? ' has-danger' : '' }} ">
                                                                <input type="radio"
                                                                    name="father_age_during_affected_pregnancy"
                                                                    id="father_age_during_affected_pregnancy_greater_or_equal_41_years"
                                                                    value="greater_or_equal_41_years"
                                                                    v-model="cleftBaby.mother.newborn.father_age_during_affected_pregnancy">
                                                            </div>
                                                            <label
                                                                for="father_age_during_affected_pregnancy_greater_or_equal_41_years"
                                                                class="ml-2 mb-0">&geq; 41 years</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Duration of pregnancy at delivery: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('duration_of_pregnancy_at_delivery') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="duration_of_pregnancy_at_delivery"
                                                                    id="duration_of_pregnancy_at_delivery_Preterm"
                                                                    value="Preterm"
                                                                    v-model="cleftBaby.mother.newborn.duration_of_pregnancy_at_delivery">
                                                            </div>
                                                            <label for="duration_of_pregnancy_at_delivery_Preterm"
                                                                class="ml-2 mb-0">Pre-term</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('duration_of_pregnancy_at_delivery') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="duration_of_pregnancy_at_delivery"
                                                                    id="duration_of_pregnancy_at_delivery_Term" value="Term"
                                                                    v-model="cleftBaby.mother.newborn.duration_of_pregnancy_at_delivery">
                                                            </div>
                                                            <label for="duration_of_pregnancy_at_delivery_Term"
                                                                class="ml-2 mb-0">Term</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('duration_of_pregnancy_at_delivery') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="duration_of_pregnancy_at_delivery"
                                                                    id="duration_of_pregnancy_at_delivery_Post-dated"
                                                                    value="Post-dated"
                                                                    v-model="cleftBaby.mother.newborn.duration_of_pregnancy_at_delivery">
                                                            </div>
                                                            <label for="duration_of_pregnancy_at_delivery_Post-dated"
                                                                class="ml-2 mb-0">Post-dated</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Condition of baby at birth: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('condition_at_birth') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="condition_at_birth"
                                                                    id="condition_at_birth_Healthy" value="Healthy"
                                                                    v-model="cleftBaby.mother.newborn.condition_at_birth">
                                                            </div>
                                                            <label for="condition_at_birth_Healthy"
                                                                class="ml-2 mb-0">Healthy</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('condition_at_birth') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="condition_at_birth"
                                                                    id="condition_at_birth_not_healthy" value="Not Healthy"
                                                                    v-model="cleftBaby.mother.newborn.condition_at_birth">
                                                            </div>
                                                            <label for="condition_at_birth_not_healthy"
                                                                class="ml-2 mb-0">Not Healthy</label>
                                                        </div>

                                                    </div>
                                                    <div class="row align-items-center">
                                                        <div class="col-md-3">
                                                            <label>
                                                                If not healthy, Mention the Disease or Abnormality:
                                                            </label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="d-flex align-items-center">
                                                                {{-- <label class="" for="condition_at_birth">
                                                                    If yes, numbers of cigerettes smoked per day:
                                                                </label> --}}
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                        style="width: 200px;"
                                                                        v-model="cleftBaby.mother.newborn.condition_at_birth_disease"
                                                                        rules="numeric" placeholder="0"
                                                                        id="condition_at_birth" hide-details />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="pr-4 font-weight-bold">{{ __('Sex: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('sex_orientation') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="sex_orientation"
                                                                    id="sex_orientation_Male" value="Male"
                                                                    v-model="cleftBaby.mother.newborn.sex_orientation">
                                                            </div>
                                                            <label for="sex_orientation_Male" class="ml-2 mb-0">Male</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('sex_orientation') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="sex_orientation"
                                                                    id="sex_orientation_female" value="Female"
                                                                    v-model="cleftBaby.mother.newborn.sex_orientation">
                                                            </div>
                                                            <label for="sex_orientation_female"
                                                                class="ml-2 mb-0">Female</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('sex_orientation') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="sex_orientation"
                                                                    id="sex_orientation_Others" value="Others"
                                                                    v-model="cleftBaby.mother.newborn.sex_orientation">
                                                            </div>
                                                            <label for="sex_orientation_Others"
                                                                class="ml-2 mb-0">Others</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="pr-4 font-weight-bold">{{ __('Weight: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('weight') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="weight"
                                                                    id="weight_less_than_one_and_half_kg"
                                                                    value="less_than_one_and_half_kg"
                                                                    v-model="cleftBaby.mother.newborn.weight">
                                                            </div>
                                                            <label for="weight_less_than_one_and_half_kg" class="ml-2 mb-0">
                                                                < 1.5kg</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('weight') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="weight"
                                                                    id="weight_bteween_one_half_and_two_kg"
                                                                    value="bteween_one_half_and_two_kg"
                                                                    v-model="cleftBaby.mother.newborn.weight">
                                                            </div>
                                                            <label for="weight_bteween_one_half_and_two_kg"
                                                                class="ml-2 mb-0">1.5-2kg</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('weight') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="weight"
                                                                    id="weight_bteween_two_and_three_kg"
                                                                    value="bteween_two_and_three_kg"
                                                                    v-model="cleftBaby.mother.newborn.weight">
                                                            </div>
                                                            <label for="weight_bteween_two_and_three_kg"
                                                                class="ml-2 mb-0">2-3kg</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('weight') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="weight" id="weight_more_than_3_kg"
                                                                    value="more_than_3_kg"
                                                                    v-model="cleftBaby.mother.newborn.weight">
                                                            </div>
                                                            <label for="weight_more_than_3_kg"
                                                                class="ml-2 mb-0">>3kg</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('APGAR Score: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('apgar_score') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="apgar_score"
                                                                    id="apgar_score_seven_to_ten" value="seven_to_ten"
                                                                    v-model="cleftBaby.mother.newborn.apgar_score">
                                                            </div>
                                                            <label for="apgar_score_seven_to_ten"
                                                                class="ml-2 mb-0">7-10</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('apgar_score') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="apgar_score"
                                                                    id="apgar_score_four_to_six" value="four_to_six"
                                                                    v-model="cleftBaby.mother.newborn.apgar_score">
                                                            </div>
                                                            <label for="apgar_score_four_to_six"
                                                                class="ml-2 mb-0">4-6</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('apgar_score') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="apgar_score"
                                                                    id="apgar_score_zero_to_three" value="zero_to_three"
                                                                    v-model="cleftBaby.mother.newborn.apgar_score">
                                                            </div>
                                                            <label for="apgar_score_zero_to_three"
                                                                class="ml-2 mb-0">0-3</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('apgar_score') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="apgar_score"
                                                                    id="apgar_score_unknown" value="unknown"
                                                                    v-model="cleftBaby.mother.newborn.apgar_score">
                                                            </div>
                                                            <label for="apgar_score_unknown" class="ml-2 mb-0">Not
                                                                known</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Congenital craniofacial cleft: ') }}</label>
                                                </div>
                                                <div class="col-md-9 d-flex">
                                                    <label class="pr-4 font-weight-bold">{{ __('Diagnosis: ') }}</label>
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('congenital_craniofacial_cleft') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="congenital_craniofacial_cleft"
                                                                    id="congenital_craniofacial_cleft_Antenatal"
                                                                    value="Antenatal"
                                                                    v-model="cleftBaby.mother.newborn.congenital_craniofacial_cleft">
                                                            </div>
                                                            <label for="congenital_craniofacial_cleft_Antenatal"
                                                                class="ml-2 mb-0">Antenatal</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('congenital_craniofacial_cleft') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="congenital_craniofacial_cleft"
                                                                    id="congenital_craniofacial_cleft_postnatal"
                                                                    value="Postnatal"
                                                                    v-model="cleftBaby.mother.newborn.congenital_craniofacial_cleft">
                                                            </div>
                                                            <label for="congenital_craniofacial_cleft_postnatal"
                                                                class="ml-2 mb-0">Postnatal</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('congenital_craniofacial_cleft') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="congenital_craniofacial_cleft"
                                                                    id="congenital_craniofacial_cleft_unknown"
                                                                    value="unknown"
                                                                    v-model="cleftBaby.mother.newborn.congenital_craniofacial_cleft">
                                                            </div>
                                                            <label for="congenital_craniofacial_cleft_unknown"
                                                                class="ml-2 mb-0">Not known</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <label
                                                class="pr-4 font-weight-bold">{{ __('The clinical deformity to be defined using Tessier classification where relevant: ') }}</label>
                                            <ol style="list-style-type: lower-alpha">
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label
                                                                class="pr-4 font-weight-bold">{{ __('Site: ') }}</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="d-flex">
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site"
                                                                            id="tessier_classification_site_left"
                                                                            value="left"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site">
                                                                    </div>
                                                                    <label for="tessier_classification_site_left"
                                                                        class="ml-2 mb-0">Left</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site"
                                                                            id="tessier_classification_site_right"
                                                                            value="right"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site">
                                                                    </div>
                                                                    <label for="tessier_classification_site_right"
                                                                        class="ml-2 mb-0">Right</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site"
                                                                            id="tessier_classification_site_bilateral"
                                                                            value="bilateral"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site">
                                                                    </div>
                                                                    <label for="tessier_classification_site_bilateral"
                                                                        class="ml-2 mb-0">Bilateral</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label
                                                                class="pr-4 font-weight-bold">{{ __('Tessier type (if possible): Right ') }}</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="d-flex flex-wrap">
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_right') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_right"
                                                                            id="tessier_classification_site_type_right_0"
                                                                            value="0"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_right">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_right_0"
                                                                        class="ml-2 mb-0">0</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_right') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_right"
                                                                            id="tessier_classification_site_type_right_1"
                                                                            value="1"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_right">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_right_1"
                                                                        class="ml-2 mb-0">1</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_right') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_right"
                                                                            id="tessier_classification_site_type_right_2"
                                                                            value="2"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_right">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_right_2"
                                                                        class="ml-2 mb-0">2</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_right') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_right"
                                                                            id="tessier_classification_site_type_right_3"
                                                                            value="3"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_right">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_right_3"
                                                                        class="ml-2 mb-0">3</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_right') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_right"
                                                                            id="tessier_classification_site_type_right_4"
                                                                            value="4"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_right">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_right_4"
                                                                        class="ml-2 mb-0">4</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_right') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_right"
                                                                            id="tessier_classification_site_type_right_5"
                                                                            value="5"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_right">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_right_5"
                                                                        class="ml-2 mb-0">5</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_right') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_right"
                                                                            id="tessier_classification_site_type_right_6"
                                                                            value="6"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_right">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_right_6"
                                                                        class="ml-2 mb-0">6</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_right') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_right"
                                                                            id="tessier_classification_site_type_right_7"
                                                                            value="7"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_right">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_right_7"
                                                                        class="ml-2 mb-0">7</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_right') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_right"
                                                                            id="tessier_classification_site_type_right_8"
                                                                            value="8"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_right">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_right_8"
                                                                        class="ml-2 mb-0">8</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_right') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_right"
                                                                            id="tessier_classification_site_type_right_9"
                                                                            value="9"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_right">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_right_9"
                                                                        class="ml-2 mb-0">9</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_right') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_right"
                                                                            id="tessier_classification_site_type_right_10"
                                                                            value="10"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_right">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_right_10"
                                                                        class="ml-2 mb-0">10</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_right') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_right"
                                                                            id="tessier_classification_site_type_right_11"
                                                                            value="11"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_right">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_right_11"
                                                                        class="ml-2 mb-0">11</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_right') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_right"
                                                                            id="tessier_classification_site_type_right_12"
                                                                            value="12"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_right">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_right_12"
                                                                        class="ml-2 mb-0">12</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_right') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_right"
                                                                            id="tessier_classification_site_type_right_14"
                                                                            value="14"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_right">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_right_14"
                                                                        class="ml-2 mb-0">14</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_right') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_right"
                                                                            id="tessier_classification_site_type_right_14"
                                                                            value="14"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_right">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_right_14"
                                                                        class="ml-2 mb-0">14</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_right') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_right"
                                                                            id="tessier_classification_site_type_right_31"
                                                                            value="31"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_right">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_right_31"
                                                                        class="ml-2 mb-0">31</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_right') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_right"
                                                                            id="tessier_classification_site_type_right_difficult_to_know"
                                                                            value="difficult_to_know"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_right">
                                                                    </div>
                                                                    <label
                                                                        for="tessier_classification_site_type_right_difficult_to_know"
                                                                        class="ml-2 mb-0">Difficult to know</label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label
                                                                class="pr-4 font-weight-bold">{{ __('Tessier type (if possible): Left ') }}</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="d-flex flex-wrap">
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_left') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_left"
                                                                            id="tessier_classification_site_type_left_0"
                                                                            value="0"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_left">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_left_0"
                                                                        class="ml-2 mb-0">0</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_left') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_left"
                                                                            id="tessier_classification_site_type_left_1"
                                                                            value="1"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_left">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_left_1"
                                                                        class="ml-2 mb-0">1</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_left') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_left"
                                                                            id="tessier_classification_site_type_left_2"
                                                                            value="2"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_left">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_left_2"
                                                                        class="ml-2 mb-0">2</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_left') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_left"
                                                                            id="tessier_classification_site_type_left_3"
                                                                            value="3"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_left">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_left_3"
                                                                        class="ml-2 mb-0">3</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_left') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_left"
                                                                            id="tessier_classification_site_type_left_4"
                                                                            value="4"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_left">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_left_4"
                                                                        class="ml-2 mb-0">4</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_left') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_left"
                                                                            id="tessier_classification_site_type_left_5"
                                                                            value="5"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_left">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_left_5"
                                                                        class="ml-2 mb-0">5</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_left') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_left"
                                                                            id="tessier_classification_site_type_left_6"
                                                                            value="6"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_left">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_left_6"
                                                                        class="ml-2 mb-0">6</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_left') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_left"
                                                                            id="tessier_classification_site_type_left_7"
                                                                            value="7"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_left">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_left_7"
                                                                        class="ml-2 mb-0">7</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_left') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_left"
                                                                            id="tessier_classification_site_type_left_8"
                                                                            value="8"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_left">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_left_8"
                                                                        class="ml-2 mb-0">8</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_left') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_left"
                                                                            id="tessier_classification_site_type_left_9"
                                                                            value="9"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_left">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_left_9"
                                                                        class="ml-2 mb-0">9</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_left') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_left"
                                                                            id="tessier_classification_site_type_left_10"
                                                                            value="10"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_left">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_left_10"
                                                                        class="ml-2 mb-0">10</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_left') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_left"
                                                                            id="tessier_classification_site_type_left_11"
                                                                            value="11"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_left">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_left_11"
                                                                        class="ml-2 mb-0">11</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_left') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_left"
                                                                            id="tessier_classification_site_type_left_12"
                                                                            value="12"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_left">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_left_12"
                                                                        class="ml-2 mb-0">12</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_left') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_left"
                                                                            id="tessier_classification_site_type_left_14"
                                                                            value="14"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_left">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_left_14"
                                                                        class="ml-2 mb-0">14</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_left') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_left"
                                                                            id="tessier_classification_site_type_left_14"
                                                                            value="14"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_left">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_left_14"
                                                                        class="ml-2 mb-0">14</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_left') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_left"
                                                                            id="tessier_classification_site_type_left_31"
                                                                            value="31"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_left">
                                                                    </div>
                                                                    <label for="tessier_classification_site_type_left_31"
                                                                        class="ml-2 mb-0">31</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_site_type_left') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_site_type_left"
                                                                            id="tessier_classification_site_type_left_difficult_to_know"
                                                                            value="difficult_to_know"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_site_type_left">
                                                                    </div>
                                                                    <label
                                                                        for="tessier_classification_site_type_left_difficult_to_know"
                                                                        class="ml-2 mb-0">Difficult to know</label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label
                                                                class="pr-4 font-weight-bold">{{ __('Anatomical type: ') }}</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="d-flex">
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_anatomical_type') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_anatomical_type"
                                                                            id="tessier_classification_anatomical_type_Bony_Cleft"
                                                                            value="Bony Cleft"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_anatomical_type">
                                                                    </div>
                                                                    <label
                                                                        for="tessier_classification_anatomical_type_Bony_Cleft"
                                                                        class="ml-2 mb-0">Bony Cleft</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_anatomical_type') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_anatomical_type"
                                                                            id="tessier_classification_anatomical_type_Soft_tissue_cleft"
                                                                            value="Soft tissue cleft"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_anatomical_type">
                                                                    </div>
                                                                    <label
                                                                        for="tessier_classification_anatomical_type_Soft_tissue_cleft"
                                                                        class="ml-2 mb-0">Soft tissue cleft</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_anatomical_type') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_anatomical_type"
                                                                            id="tessier_classification_anatomical_type_Absent"
                                                                            value="Absent"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_anatomical_type">
                                                                    </div>
                                                                    <label
                                                                        for="tessier_classification_anatomical_type_Absent"
                                                                        class="ml-2 mb-0">Absent</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_anatomical_type') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_anatomical_type"
                                                                            id="tessier_classification_anatomical_type_Both"
                                                                            value="Both"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_anatomical_type">
                                                                    </div>
                                                                    <label for="tessier_classification_anatomical_type_Both"
                                                                        class="ml-2 mb-0">Both</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label
                                                                class="pr-4 font-weight-bold">{{ __('Microtia: ') }}</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="d-flex">
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_microtia') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_microtia"
                                                                            id="tessier_classification_microtia_true"
                                                                            value="1"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_microtia">
                                                                    </div>
                                                                    <label for="tessier_classification_microtia_true"
                                                                        class="ml-2 mb-0">Yes</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_microtia') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_microtia"
                                                                            id="tessier_classification_microtia_false"
                                                                            value="0"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_microtia">
                                                                    </div>
                                                                    <label for="tessier_classification_microtia_false"
                                                                        class="ml-2 mb-0">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label
                                                                        class="pr-4 font-weight-bold">{{ __('If yes, ') }}</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="d-flex">
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('tessier_classification_microtia_type') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="tessier_classification_microtia_type"
                                                                                    id="tessier_classification_microtia_type_Bilateral"
                                                                                    value="Bilateral"
                                                                                    v-model="cleftBaby.mother.newborn.tessier_classification_microtia_type">
                                                                            </div>
                                                                            <label
                                                                                for="tessier_classification_microtia_type_Bilateral"
                                                                                class="ml-2 mb-0">Bilateral</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('tessier_classification_microtia_type') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="tessier_classification_microtia_type"
                                                                                    id="tessier_classification_microtia_type_Unilateral"
                                                                                    value="Unilateral"
                                                                                    v-model="cleftBaby.mother.newborn.tessier_classification_microtia_type">
                                                                            </div>
                                                                            <label
                                                                                for="tessier_classification_microtia_type_Unilateral"
                                                                                class="ml-2 mb-0">Unilateral</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('tessier_classification_microtia_type') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="tessier_classification_microtia_type"
                                                                                    id="tessier_classification_microtia_type_Right"
                                                                                    value="Right"
                                                                                    v-model="cleftBaby.mother.newborn.tessier_classification_microtia_type">
                                                                            </div>
                                                                            <label
                                                                                for="tessier_classification_microtia_type_Right"
                                                                                class="ml-2 mb-0">Right</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('tessier_classification_microtia_type') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="tessier_classification_microtia_type"
                                                                                    id="tessier_classification_microtia_type_Left"
                                                                                    value="Left"
                                                                                    v-model="cleftBaby.mother.newborn.tessier_classification_microtia_type">
                                                                            </div>
                                                                            <label
                                                                                for="tessier_classification_microtia_type_Left"
                                                                                class="ml-2 mb-0">Left</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label
                                                                class="pr-4 font-weight-bold">{{ __('Choanal atresia: ') }}</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="d-flex">
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_choanal_attresia') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_choanal_attresia"
                                                                            id="tessier_classification_choanal_attresia_true"
                                                                            value="Present"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_choanal_attresia">
                                                                    </div>
                                                                    <label
                                                                        for="tessier_classification_choanal_attresia_true"
                                                                        class="ml-2 mb-0">Present</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('tessier_classification_choanal_attresia') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="tessier_classification_choanal_attresia"
                                                                            id="tessier_classification_choanal_attresia_false"
                                                                            value="Absent"
                                                                            v-model="cleftBaby.mother.newborn.tessier_classification_choanal_attresia">
                                                                    </div>
                                                                    <label
                                                                        for="tessier_classification_choanal_attresia_false"
                                                                        class="ml-2 mb-0">Absent</label>
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <label
                                                                    class="pr-4 font-weight-bold">{{ __('If present, ') }}</label>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label
                                                                        class="pr-4 font-weight-bold">{{ __('Site: ') }}</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="d-flex">
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('tessier_classification_choanal_attresia_site') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="tessier_classification_choanal_attresia_site"
                                                                                    id="tessier_classification_choanal_attresia_site_Bilateral"
                                                                                    value="Bilateral"
                                                                                    v-model="cleftBaby.mother.newborn.tessier_classification_choanal_attresia_site">
                                                                            </div>
                                                                            <label
                                                                                for="tessier_classification_choanal_attresia_site_Bilateral"
                                                                                class="ml-2 mb-0">Bilateral</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('tessier_classification_choanal_attresia_site') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="tessier_classification_choanal_attresia_site"
                                                                                    id="tessier_classification_choanal_attresia_site_Right"
                                                                                    value="Right"
                                                                                    v-model="cleftBaby.mother.newborn.tessier_classification_choanal_attresia_site">
                                                                            </div>
                                                                            <label
                                                                                for="tessier_classification_choanal_attresia_site_Right"
                                                                                class="ml-2 mb-0">Right</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('tessier_classification_choanal_attresia_site') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="tessier_classification_choanal_attresia_site"
                                                                                    id="tessier_classification_choanal_attresia_site_Left"
                                                                                    value="Left"
                                                                                    v-model="cleftBaby.mother.newborn.tessier_classification_choanal_attresia_site">
                                                                            </div>
                                                                            <label
                                                                                for="tessier_classification_choanal_attresia_site_Left"
                                                                                class="ml-2 mb-0">Left</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label
                                                                        class="pr-4 font-weight-bold">{{ __('Anatomical type: ') }}</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="d-flex">
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('tessier_classification_choanal_attresia_anatomical_type') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="tessier_classification_choanal_attresia_anatomical_type"
                                                                                    id="tessier_classification_choanal_attresia_anatomical_type_Soft"
                                                                                    value="Soft"
                                                                                    v-model="cleftBaby.mother.newborn.tessier_classification_choanal_attresia_anatomical_type">
                                                                            </div>
                                                                            <label
                                                                                for="tessier_classification_choanal_attresia_anatomical_type_Soft"
                                                                                class="ml-2 mb-0">Soft</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('tessier_classification_choanal_attresia_anatomical_type') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="tessier_classification_choanal_attresia_anatomical_type"
                                                                                    id="tessier_classification_choanal_attresia_anatomical_type_Bony"
                                                                                    value="Bony"
                                                                                    v-model="cleftBaby.mother.newborn.tessier_classification_choanal_attresia_anatomical_type">
                                                                            </div>
                                                                            <label
                                                                                for="tessier_classification_choanal_attresia_anatomical_type_Bony"
                                                                                class="ml-2 mb-0">Bony</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label
                                                                class="pr-4 font-weight-bold">{{ __('Other congenital anomalies: ') }}</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="d-flex">
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('other_congenital_anomalies') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="other_congenital_anomalies"
                                                                            id="other_congenital_anomalies_true" value="1"
                                                                            v-model="cleftBaby.mother.newborn.other_congenital_anomalies">
                                                                    </div>
                                                                    <label for="other_congenital_anomalies_true"
                                                                        class="ml-2 mb-0">Yes</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('other_congenital_anomalies') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="other_congenital_anomalies"
                                                                            id="other_congenital_anomalies_false" value="0"
                                                                            v-model="cleftBaby.mother.newborn.other_congenital_anomalies">
                                                                    </div>
                                                                    <label for="other_congenital_anomalies_false"
                                                                        class="ml-2 mb-0">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label
                                                                        class="pr-4 font-weight-bold">{{ __('If yes, ') }}</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="d-flex">
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('other_congenital_anomalies_involved_system') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="other_congenital_anomalies_involved_system"
                                                                                    id="other_congenital_anomalies_involved_system_Ear"
                                                                                    value="Ear"
                                                                                    v-model="cleftBaby.mother.newborn.other_congenital_anomalies_involved_system">
                                                                            </div>
                                                                            <label
                                                                                for="other_congenital_anomalies_involved_system_Ear"
                                                                                class="ml-2 mb-0">Ear</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('other_congenital_anomalies_involved_system') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="other_congenital_anomalies_involved_system"
                                                                                    id="other_congenital_anomalies_involved_system_Cardiac"
                                                                                    value="Cardiac"
                                                                                    v-model="cleftBaby.mother.newborn.other_congenital_anomalies_involved_system">
                                                                            </div>
                                                                            <label
                                                                                for="other_congenital_anomalies_involved_system_Cardiac"
                                                                                class="ml-2 mb-0">Cardiac</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('other_congenital_anomalies_involved_system') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="other_congenital_anomalies_involved_system"
                                                                                    id="other_congenital_anomalies_involved_system_Head-neck"
                                                                                    value="Head-neck"
                                                                                    v-model="cleftBaby.mother.newborn.other_congenital_anomalies_involved_system">
                                                                            </div>
                                                                            <label
                                                                                for="other_congenital_anomalies_involved_system_Head-neck"
                                                                                class="ml-2 mb-0">Head-neck</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('other_congenital_anomalies_involved_system') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="other_congenital_anomalies_involved_system"
                                                                                    id="other_congenital_anomalies_involved_system_Abdominal"
                                                                                    value="Abdominal"
                                                                                    v-model="cleftBaby.mother.newborn.other_congenital_anomalies_involved_system">
                                                                            </div>
                                                                            <label
                                                                                for="other_congenital_anomalies_involved_system_Abdominal"
                                                                                class="ml-2 mb-0">Abdominal</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('other_congenital_anomalies_involved_system') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="other_congenital_anomalies_involved_system"
                                                                                    id="other_congenital_anomalies_involved_system_Genitourinary"
                                                                                    value="Genitourinary"
                                                                                    v-model="cleftBaby.mother.newborn.other_congenital_anomalies_involved_system">
                                                                            </div>
                                                                            <label
                                                                                for="other_congenital_anomalies_involved_system_Genitourinary"
                                                                                class="ml-2 mb-0">Genitourinary</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('other_congenital_anomalies_involved_system') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="other_congenital_anomalies_involved_system"
                                                                                    id="other_congenital_anomalies_involved_system_Upper-limb"
                                                                                    value="Upper-limb"
                                                                                    v-model="cleftBaby.mother.newborn.other_congenital_anomalies_involved_system">
                                                                            </div>
                                                                            <label
                                                                                for="other_congenital_anomalies_involved_system_Upper-limb"
                                                                                class="ml-2 mb-0">Upper limb</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('other_congenital_anomalies_involved_system') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="other_congenital_anomalies_involved_system"
                                                                                    id="other_congenital_anomalies_involved_system_Lower-limb"
                                                                                    value="Lower-limb"
                                                                                    v-model="cleftBaby.mother.newborn.other_congenital_anomalies_involved_system">
                                                                            </div>
                                                                            <label
                                                                                for="other_congenital_anomalies_involved_system_Lower-limb"
                                                                                class="ml-2 mb-0">Lower limb</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('other_congenital_anomalies_involved_system') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="other_congenital_anomalies_involved_system"
                                                                                    id="other_congenital_anomalies_involved_system_Dental"
                                                                                    value="Dental"
                                                                                    v-model="cleftBaby.mother.newborn.other_congenital_anomalies_involved_system">
                                                                            </div>
                                                                            <label
                                                                                for="other_congenital_anomalies_involved_system_Dental"
                                                                                class="ml-2 mb-0">Dental</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label
                                                                class="pr-4 font-weight-bold">{{ __('Any syndrome suspected: ') }}</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="d-flex">
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('any_syndrome_suspected') ? ' has-danger' : '' }} ">
                                                                        <input type="radio" name="any_syndrome_suspected"
                                                                            id="any_syndrome_suspected_true" value="1"
                                                                            v-model="cleftBaby.mother.newborn.any_syndrome_suspected">
                                                                    </div>
                                                                    <label for="any_syndrome_suspected_true"
                                                                        class="ml-2 mb-0">Yes</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('any_syndrome_suspected') ? ' has-danger' : '' }} ">
                                                                        <input type="radio" name="any_syndrome_suspected"
                                                                            id="any_syndrome_suspected_false" value="0"
                                                                            v-model="cleftBaby.mother.newborn.any_syndrome_suspected">
                                                                    </div>
                                                                    <label for="any_syndrome_suspected_false"
                                                                        class="ml-2 mb-0">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label
                                                                class="pr-4 font-weight-bold">{{ __('Eyes (Corneal opacities and other deformities): ') }}</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="d-flex">
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('corneal_opacities_and_other_deformities') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="corneal_opacities_and_other_deformities"
                                                                            id="corneal_opacities_and_other_deformities_true"
                                                                            value="1"
                                                                            v-model="cleftBaby.mother.newborn.corneal_opacities_and_other_deformities">
                                                                    </div>
                                                                    <label
                                                                        for="corneal_opacities_and_other_deformities_true"
                                                                        class="ml-2 mb-0">Yes</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('corneal_opacities_and_other_deformities') ? ' has-danger' : '' }} ">
                                                                        <input type="radio"
                                                                            name="corneal_opacities_and_other_deformities"
                                                                            id="corneal_opacities_and_other_deformities_false"
                                                                            value="0"
                                                                            v-model="cleftBaby.mother.newborn.corneal_opacities_and_other_deformities">
                                                                    </div>
                                                                    <label
                                                                        for="corneal_opacities_and_other_deformities_false"
                                                                        class="ml-2 mb-0">No</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label
                                                                class="pr-4 font-weight-bold">{{ __('Ring constrictions, carefully looking at subtle constrictions (to be photographed with contralateral site as comparison): ') }}</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="d-flex">
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('ring_constrictions') ? ' has-danger' : '' }} ">
                                                                        <input type="radio" name="ring_constrictions"
                                                                            id="ring_constrictions_true" value="1"
                                                                            v-model="cleftBaby.mother.newborn.ring_constrictions">
                                                                    </div>
                                                                    <label for="ring_constrictions_true"
                                                                        class="ml-2 mb-0">Yes</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('ring_constrictions') ? ' has-danger' : '' }} ">
                                                                        <input type="radio" name="ring_constrictions"
                                                                            id="ring_constrictions_false" value="0"
                                                                            v-model="cleftBaby.mother.newborn.ring_constrictions">
                                                                    </div>
                                                                    <label for="ring_constrictions_false"
                                                                        class="ml-2 mb-0">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label
                                                                        class="pr-4 font-weight-bold">{{ __('If yes, ') }}</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="d-flex">
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('ring_constrictions_involving_area') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="ring_constrictions_involving_area"
                                                                                    id="ring_constrictions_involving_area_Head"
                                                                                    value="Head"
                                                                                    v-model="cleftBaby.mother.newborn.ring_constrictions_involving_area">
                                                                            </div>
                                                                            <label
                                                                                for="ring_constrictions_involving_area_Head"
                                                                                class="ml-2 mb-0">Head</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('ring_constrictions_involving_area') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="ring_constrictions_involving_area"
                                                                                    id="ring_constrictions_involving_area_Upper-limb"
                                                                                    value="Upper-limb"
                                                                                    v-model="cleftBaby.mother.newborn.ring_constrictions_involving_area">
                                                                            </div>
                                                                            <label
                                                                                for="ring_constrictions_involving_area_Upper-limb"
                                                                                class="ml-2 mb-0">Upper limb</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('ring_constrictions_involving_area') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="ring_constrictions_involving_area"
                                                                                    id="ring_constrictions_involving_area_Lower-limb"
                                                                                    value="Lower-limb"
                                                                                    v-model="cleftBaby.mother.newborn.ring_constrictions_involving_area">
                                                                            </div>
                                                                            <label
                                                                                for="ring_constrictions_involving_area_Lower-limb"
                                                                                class="ml-2 mb-0">Lower limb</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label
                                                                class="pr-4 font-weight-bold">{{ __('Nasal airway obstruction (tested by tissue paper test, occluding the nose if possible and nasal anemometry, if available): ') }}</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="d-flex">
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('nasal_obstruction') ? ' has-danger' : '' }} ">
                                                                        <input type="radio" name="nasal_obstruction"
                                                                            id="nasal_obstruction_true" value="1"
                                                                            v-model="cleftBaby.mother.newborn.nasal_obstruction">
                                                                    </div>
                                                                    <label for="nasal_obstruction_true"
                                                                        class="ml-2 mb-0">Yes</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('nasal_obstruction') ? ' has-danger' : '' }} ">
                                                                        <input type="radio" name="nasal_obstruction"
                                                                            id="nasal_obstruction_false" value="0"
                                                                            v-model="cleftBaby.mother.newborn.nasal_obstruction">
                                                                    </div>
                                                                    <label for="nasal_obstruction_false"
                                                                        class="ml-2 mb-0">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label
                                                                        class="pr-4 font-weight-bold">{{ __('If yes, ') }}</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="d-flex">
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('nasal_obstruction_treated') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="nasal_obstruction_treated"
                                                                                    id="nasal_obstruction_treated_true"
                                                                                    value="1"
                                                                                    v-model="cleftBaby.mother.newborn.nasal_obstruction_treated">
                                                                            </div>
                                                                            <label for="nasal_obstruction_treated_true"
                                                                                class="ml-2 mb-0">Treated</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('nasal_obstruction_treated') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="nasal_obstruction_treated"
                                                                                    id="nasal_obstruction_treated_false"
                                                                                    value="0"
                                                                                    v-model="cleftBaby.mother.newborn.nasal_obstruction_treated">
                                                                            </div>
                                                                            <label for="nasal_obstruction_treated_false"
                                                                                class="ml-2 mb-0">Not treated</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label
                                                                class="pr-4 font-weight-bold">{{ __('Palatal abnormality: ') }}</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="d-flex">
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('palatal_abnormality') ? ' has-danger' : '' }} ">
                                                                        <input type="radio" name="palatal_abnormality"
                                                                            id="palatal_abnormality_true" value="1"
                                                                            v-model="cleftBaby.mother.newborn.palatal_abnormality">
                                                                    </div>
                                                                    <label for="palatal_abnormality_true"
                                                                        class="ml-2 mb-0">Yes</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('palatal_abnormality') ? ' has-danger' : '' }} ">
                                                                        <input type="radio" name="palatal_abnormality"
                                                                            id="palatal_abnormality_false" value="0"
                                                                            v-model="cleftBaby.mother.newborn.palatal_abnormality">
                                                                    </div>
                                                                    <label for="palatal_abnormality_false"
                                                                        class="ml-2 mb-0">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label
                                                                        class="pr-4 font-weight-bold">{{ __('If yes, ') }}</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="d-flex flex-wrap">
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('palatal_abnormality_type') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="palatal_abnormality_type"
                                                                                    id="palatal_abnormality_type_Complete"
                                                                                    value="Complete"
                                                                                    v-model="cleftBaby.mother.newborn.palatal_abnormality_type">
                                                                            </div>
                                                                            <label for="palatal_abnormality_type_Complete"
                                                                                class="ml-2 mb-0">Complete</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('palatal_abnormality_type') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="palatal_abnormality_type"
                                                                                    id="palatal_abnormality_type_Incomplete"
                                                                                    value="Incomplete"
                                                                                    v-model="cleftBaby.mother.newborn.palatal_abnormality_type">
                                                                            </div>
                                                                            <label for="palatal_abnormality_type_Incomplete"
                                                                                class="ml-2 mb-0">Incomplete</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('palatal_abnormality_type') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="palatal_abnormality_type"
                                                                                    id="palatal_abnormality_type_Bilateral"
                                                                                    value="Bilateral"
                                                                                    v-model="cleftBaby.mother.newborn.palatal_abnormality_type">
                                                                            </div>
                                                                            <label for="palatal_abnormality_type_Bilateral"
                                                                                class="ml-2 mb-0">Bilateral</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('palatal_abnormality_type') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="palatal_abnormality_type"
                                                                                    id="palatal_abnormality_type_Unilateral"
                                                                                    value="Unilateral"
                                                                                    v-model="cleftBaby.mother.newborn.palatal_abnormality_type">
                                                                            </div>
                                                                            <label for="palatal_abnormality_type_Unilateral"
                                                                                class="ml-2 mb-0">Unilateral</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('palatal_abnormality_type') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="palatal_abnormality_type"
                                                                                    id="palatal_abnormality_type_Right"
                                                                                    value="Right"
                                                                                    v-model="cleftBaby.mother.newborn.palatal_abnormality_type">
                                                                            </div>
                                                                            <label for="palatal_abnormality_type_Right"
                                                                                class="ml-2 mb-0">Right</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('palatal_abnormality_type') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="palatal_abnormality_type"
                                                                                    id="palatal_abnormality_type_Left"
                                                                                    value="Left"
                                                                                    v-model="cleftBaby.mother.newborn.palatal_abnormality_type">
                                                                            </div>
                                                                            <label for="palatal_abnormality_type_Left"
                                                                                class="ml-2 mb-0">Left</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('palatal_abnormality_type') ? ' has-danger' : '' }} ">
                                                                                <input type="radio"
                                                                                    name="palatal_abnormality_type"
                                                                                    id="palatal_abnormality_type_Submucous"
                                                                                    value="Submucous"
                                                                                    v-model="cleftBaby.mother.newborn.palatal_abnormality_type">
                                                                            </div>
                                                                            <label for="palatal_abnormality_type_Submucous"
                                                                                class="ml-2 mb-0">Submucous</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label
                                                                class="pr-4 font-weight-bold">{{ __('Ring constrictions, carefully looking at subtle constrictions (to be photographed with contralateral site as comparison): ') }}</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <div class="d-flex">
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('cleft_lip') ? ' has-danger' : '' }} ">
                                                                        <input type="radio" name="cleft_lip"
                                                                            id="cleft_lip_true" value="1"
                                                                            v-model="cleftBaby.mother.newborn.cleft_lip">
                                                                    </div>
                                                                    <label for="cleft_lip_true"
                                                                        class="ml-2 mb-0">Yes</label>
                                                                </div>
                                                                <div class="d-flex align-items-center px-5">
                                                                    <div
                                                                        class="form-group mb-0 {{ $errors->has('cleft_lip') ? ' has-danger' : '' }} ">
                                                                        <input type="radio" name="cleft_lip"
                                                                            id="cleft_lip_false" value="0"
                                                                            v-model="cleftBaby.mother.newborn.cleft_lip">
                                                                    </div>
                                                                    <label for="cleft_lip_false"
                                                                        class="ml-2 mb-0">No</label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label
                                                                        class="pr-4 font-weight-bold">{{ __('If yes, ') }}</label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="d-flex">
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('cleft_lip_type') ? ' has-danger' : '' }} ">
                                                                                <input type="radio" name="cleft_lip_type"
                                                                                    id="cleft_lip_type_Complete"
                                                                                    value="Complete"
                                                                                    v-model="cleftBaby.mother.newborn.cleft_lip_type">
                                                                            </div>
                                                                            <label for="cleft_lip_type_Complete"
                                                                                class="ml-2 mb-0">Complete</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('cleft_lip_type') ? ' has-danger' : '' }} ">
                                                                                <input type="radio" name="cleft_lip_type"
                                                                                    id="cleft_lip_type_Incomplete"
                                                                                    value="Incomplete"
                                                                                    v-model="cleftBaby.mother.newborn.cleft_lip_type">
                                                                            </div>
                                                                            <label for="cleft_lip_type_Incomplete"
                                                                                class="ml-2 mb-0">Incomplete</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('cleft_lip_type') ? ' has-danger' : '' }} ">
                                                                                <input type="radio" name="cleft_lip_type"
                                                                                    id="cleft_lip_type_Bilateral"
                                                                                    value="Bilateral"
                                                                                    v-model="cleftBaby.mother.newborn.cleft_lip_type">
                                                                            </div>
                                                                            <label for="cleft_lip_type_Bilateral"
                                                                                class="ml-2 mb-0">Bilateral</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('cleft_lip_type') ? ' has-danger' : '' }} ">
                                                                                <input type="radio" name="cleft_lip_type"
                                                                                    id="cleft_lip_type_Unilateral"
                                                                                    value="Unilateral"
                                                                                    v-model="cleftBaby.mother.newborn.cleft_lip_type">
                                                                            </div>
                                                                            <label for="cleft_lip_type_Unilateral"
                                                                                class="ml-2 mb-0">Unilateral</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('cleft_lip_type') ? ' has-danger' : '' }} ">
                                                                                <input type="radio" name="cleft_lip_type"
                                                                                    id="cleft_lip_type_Right" value="Right"
                                                                                    v-model="cleftBaby.mother.newborn.cleft_lip_type">
                                                                            </div>
                                                                            <label for="cleft_lip_type_Right"
                                                                                class="ml-2 mb-0">Right</label>
                                                                        </div>
                                                                        <div class="d-flex align-items-center px-5">
                                                                            <div
                                                                                class="form-group mb-0 {{ $errors->has('cleft_lip_type') ? ' has-danger' : '' }} ">
                                                                                <input type="radio" name="cleft_lip_type"
                                                                                    id="cleft_lip_type_Left" value="Left"
                                                                                    v-model="cleftBaby.mother.newborn.cleft_lip_type">
                                                                            </div>
                                                                            <label for="cleft_lip_type_Left"
                                                                                class="ml-2 mb-0">Left</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                        </li>
                                    </ol>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label
                                                class="pr-4 font-weight-bold">{{ __('Evaludation of Imaging(Original): ') }}</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="d-flex">
                                                <div class="d-flex align-items-center px-5">
                                                    <div
                                                        class="form-group mb-0 {{ $errors->has('evaluation_of_imaging') ? ' has-danger' : '' }} ">
                                                        <input type="checkbox" name="evaluation_of_imaging"
                                                            id="evaluation_of_imaging_X-rays" value="X-rays"
                                                            v-model="cleftBaby.treatment.evaluation_of_imaging">
                                                    </div>
                                                    <label for="evaluation_of_imaging_X-rays"
                                                        class="ml-2 mb-0">X-rays</label>
                                                </div>
                                                <div class="d-flex align-items-center px-5">
                                                    <div
                                                        class="form-group mb-0 {{ $errors->has('evaluation_of_imaging') ? ' has-danger' : '' }} ">
                                                        <input type="checkbox" name="evaluation_of_imaging"
                                                            id="evaluation_of_imaging_CT" value="CT"
                                                            v-model="cleftBaby.treatment.evaluation_of_imaging">
                                                    </div>
                                                    <label for="evaluation_of_imaging_CT" class="ml-2 mb-0">CT</label>
                                                </div>
                                                <div class="d-flex align-items-center px-5">
                                                    <div
                                                        class="form-group mb-0 {{ $errors->has('evaluation_of_imaging') ? ' has-danger' : '' }} ">
                                                        <input type="checkbox" name="evaluation_of_imaging"
                                                            id="evaluation_of_imaging_MRI" value="MRI"
                                                            v-model="cleftBaby.treatment.evaluation_of_imaging">
                                                    </div>
                                                    <label for="evaluation_of_imaging_MRI" class="ml-2 mb-0">MRI</label>
                                                </div>
                                                <div class="d-flex align-items-center px-5">
                                                    <div
                                                        class="form-group mb-0 {{ $errors->has('evaluation_of_imaging') ? ' has-danger' : '' }} ">
                                                        <input type="checkbox" name="evaluation_of_imaging"
                                                            id="evaluation_of_imaging_None" value="None"
                                                            v-model="cleftBaby.treatment.evaluation_of_imaging">
                                                    </div>
                                                    <label for="evaluation_of_imaging_None" class="ml-2 mb-0">None</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="pr-4 font-weight-bold">{{ __('Treatment pathway: ') }}</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div>Descriptions and timing of operations including:</div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Whether dissection was: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('dissection_type') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="dissection_type"
                                                                    id="dissection_type_Supra-periosteal" value="Supra periosteal"
                                                                    v-model="cleftBaby.treatment.dissection_type">
                                                            </div>
                                                            <label for="dissection_type_Supra-periosteal"
                                                                class="ml-2 mb-0">Supra periosteal</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('dissection_type') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="dissection_type"
                                                                    id="dissection_type_Sub-periosteal" value="Sub periosteal"
                                                                    v-model="cleftBaby.treatment.dissection_type">
                                                            </div>
                                                            <label for="dissection_type_Sub-periosteal"
                                                                class="ml-2 mb-0">Sub periosteal</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Surgery to eyelids: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('dissection_of_eyelid_surgery') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="dissection_of_eyelid_surgery"
                                                                    id="dissection_of_eyelid_surgery_true" value="1"
                                                                    v-model="cleftBaby.treatment.dissection_of_eyelid_surgery">
                                                            </div>
                                                            <label for="dissection_of_eyelid_surgery_true"
                                                                class="ml-2 mb-0">Yes</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('dissection_of_eyelid_surgery') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="dissection_of_eyelid_surgery"
                                                                    id="dissection_of_eyelid_surgery_false" value="0"
                                                                    v-model="cleftBaby.treatment.dissection_of_eyelid_surgery">
                                                            </div>
                                                            <label for="dissection_of_eyelid_surgery_false"
                                                                class="ml-2 mb-0">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Surgery to choanal atresia: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('dissection_of_choanal_atresia_surgery') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="dissection_of_choanal_atresia_surgery"
                                                                    id="dissection_of_choanal_atresia_surgery_true" value="1"
                                                                    v-model="cleftBaby.treatment.dissection_of_choanal_atresia_surgery">
                                                            </div>
                                                            <label for="dissection_of_choanal_atresia_surgery_true"
                                                                class="ml-2 mb-0">Yes</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('dissection_of_choanal_atresia_surgery') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="dissection_of_choanal_atresia_surgery"
                                                                    id="dissection_of_choanal_atresia_surgery_false" value="0"
                                                                    v-model="cleftBaby.treatment.dissection_of_choanal_atresia_surgery">
                                                            </div>
                                                            <label for="dissection_of_choanal_atresia_surgery_false"
                                                                class="ml-2 mb-0">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Surgery to palate: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('dissection_of_palate_surgery') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="dissection_of_palate_surgery"
                                                                    id="dissection_of_palate_surgery_true" value="1"
                                                                    v-model="cleftBaby.treatment.dissection_of_palate_surgery">
                                                            </div>
                                                            <label for="dissection_of_palate_surgery_true"
                                                                class="ml-2 mb-0">Yes</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('dissection_of_palate_surgery') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="dissection_of_palate_surgery"
                                                                    id="dissection_of_palate_surgery_false" value="0"
                                                                    v-model="cleftBaby.treatment.dissection_of_palate_surgery">
                                                            </div>
                                                            <label for="dissection_of_palate_surgery_false"
                                                                class="ml-2 mb-0">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label
                                                        class="pr-4 font-weight-bold">{{ __('Surgery to alveolar cleft: ') }}</label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="d-flex">
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('dissection_of_alveolar_cleft_surgery') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="dissection_of_alveolar_cleft_surgery"
                                                                    id="dissection_of_alveolar_cleft_surgery_true" value="1"
                                                                    v-model="cleftBaby.treatment.dissection_of_alveolar_cleft_surgery">
                                                            </div>
                                                            <label for="dissection_of_alveolar_cleft_surgery_true"
                                                                class="ml-2 mb-0">Yes</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('dissection_of_alveolar_cleft_surgery') ? ' has-danger' : '' }} ">
                                                                <input type="radio" name="dissection_of_alveolar_cleft_surgery"
                                                                    id="dissection_of_alveolar_cleft_surgery_false" value="0"
                                                                    v-model="cleftBaby.treatment.dissection_of_alveolar_cleft_surgery">
                                                            </div>
                                                            <label for="dissection_of_alveolar_cleft_surgery_false"
                                                                class="ml-2 mb-0">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ol>
                        </form>
                        {{-- </validation-observer> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        const app = new Vue({
            el: '#app',
            vuetify: new Vuetify(),
            data: {
                drawer: false,
                babyId: "{{ request()->route('cleft_baby')->id }}",
                cleftBaby: null,
                disabled: false,
            },
            computed: {},
            filters: {
                lowercase: function(value) {
                    return value.toLowerCase();
                },

                dateTime: function(datetime) {
                    if (!datetime) {
                        return 'N/A'
                    }
                    return moment(datetime).format('YYYY-MM-DD HH:mm:ss');
                    // return moment(date, 'YYYY-MM-DD').format(format);
                },
            },

            methods: {
                getBaby(cleft_baby) {
                    axios.post("{{ route('cleft_baby.get') }}", {
                            cleft_baby
                        })
                        .then(res => {
                            // console.log(res);
                            this.cleftBaby = res.data;
                        })
                        .catch(e => function() {
                            this.button_text = 'Fetch';
                        });
                },
            },
            mounted() {
                // console.log('mounted', this.babyId);
            },
            created() {
                this.getBaby(this.babyId);
            }
        })

    </script>
@endpush
