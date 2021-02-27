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
                        <validation-observer tag="div" v-slot="{ handleSubmit, invalid, reset }">
                            <form action="" method="">
                                <ol>
                                    <li>
                                        <div class="d-flex align-items-center">
                                            <label>{{ __('Name of the Baby: ') }}</label>
                                            <div
                                                class="flex-grow-1 form-group{{ $errors->has('baby_name') ? ' has-danger' : '' }}">
                                                <input
                                                    class="form-control{{ $errors->has('baby_name') ? ' is-invalid' : '' }}"
                                                    name="baby_name" id="input-baby_name" type="text"
                                                    placeholder="{{ __('baby_name') }}"
                                                    value="{{ $cleft_baby->baby_name }}" required="true"
                                                    aria-required="true" />
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
                                                            value="{{ $cleft_baby->operation_age }}" required="true"
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
                                                            name="current_age" id="input-current_age" type="number"
                                                            step="0.1" placeholder="{{ __('current_age') }}"
                                                            value="{{ $cleft_baby->current_age }}" required="true"
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
                                                    placeholder="{{ __('father_name') }}"
                                                    value="{{ $cleft_baby->father_name }}" required="true"
                                                    aria-required="true" />
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
                                                    placeholder="{{ __('mother_name') }}"
                                                    value="{{ $cleft_baby->mother_name }}" required="true"
                                                    aria-required="true" />
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
                                                    placeholder="{{ __('guardian_name') }}"
                                                    value="{{ $cleft_baby->guardian_name }}" required="true"
                                                    aria-required="true"
                                                />
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
                                                            <input
                                                                type="radio"
                                                                @if($cleft_baby->address->address_type == 'urban') checked @endif
                                                                name="address_type"
                                                                id="urban"
                                                                value="urban"
                                                            >
                                                        </div>
                                                        <label for="urban" class="ml-2 mb-0">Urban</label>
                                                    </div>
                                                    <div class="d-flex align-items-center px-5">
                                                        <div
                                                            class="form-group mb-0 {{ $errors->has('guardian_name') ? ' has-danger' : '' }}">
                                                            <input
                                                                type="radio"
                                                                name="address_type"
                                                                id="rural"
                                                                value="rural"
                                                                @if($cleft_baby->address->address_type == 'rural') checked @endif
                                                            >
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
                                                                value="{{ $cleft_baby->village }}" required="true"
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
                                                                value="{{ $cleft_baby->upazilla }}" required="true"
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
                                                                value="{{ $cleft_baby->district }}" required="true"
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
                                                                value="{{ $cleft_baby->division }}" required="true"
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
                                                                value="{{ $cleft_baby->first_contact }}" required="true"
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
                                                                value="{{ $cleft_baby->alternate_contact }}"
                                                                required="true" aria-required="true" />
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
                                                            <input
                                                                type="radio"
                                                                name="consanguineous_marriage"
                                                                id="consanguineous_marriage_true"
                                                                value="true"
                                                                @if($cleft_baby->consanguineous_marriage == true) checked @endif
                                                            >
                                                        </div>
                                                        <label for="consanguineous_marriage_true" class="ml-2 mb-0">Yes</label>
                                                    </div>
                                                    <div class="d-flex align-items-center px-5">
                                                        <div
                                                            class="form-group mb-0 {{ $errors->has('consanguineous_marriage') ? ' has-danger' : '' }}">
                                                            <input
                                                                type="radio"
                                                                name="consanguineous_marriage"
                                                                id="consanguineous_marriage_false"
                                                                value="false"
                                                                @if($cleft_baby->consanguineous_marriage == false) checked @endif
                                                            >
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
                                                                <input
                                                                    type="radio"
                                                                    name="consanguinity"
                                                                    id="consanguinity_maternal_cousin"
                                                                    value="maternal_cousin"
                                                                    @if($cleft_baby->consanguinity == 'maternal_cousin') checked @endif
                                                                >
                                                            </div>
                                                            <label for="consanguinity_maternal_cousin" class="ml-2 mb-0">Cousin (Maternal)</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('consanguinity') ? ' has-danger' : '' }}">
                                                                <input
                                                                    type="radio"
                                                                    name="consanguinity"
                                                                    id="consanguinity_paternal_cousin" value="paternal_cousin"
                                                                    @if($cleft_baby->consanguinity == 'paternal_cousin') checked @endif
                                                                >
                                                            </div>
                                                            <label for="consanguinity_paternal_cousin" class="ml-2 mb-0">Cousin (Paternal)</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('consanguinity') ? ' has-danger' : '' }}">
                                                                <input
                                                                    type="radio"
                                                                    name="consanguinity"
                                                                    id="consanguinity_others"
                                                                    value="others"
                                                                    @if($cleft_baby->consanguinity == 'consanguinity_others') checked @endif
                                                                >
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
                                            <label class="pr-4">{{ __('Family H/O  Cleft Lip/Cleft Palate in first degree relatives: ') }}</label>
                                            <div class="flex-grow-1">
                                                <div class="d-flex">
                                                    <div class="d-flex align-items-center px-5">
                                                        <div
                                                            class="form-group mb-0 {{ $errors->has('family_cleft') ? ' has-danger' : '' }} ">
                                                            <input
                                                                type="radio"
                                                                name="family_cleft"
                                                                id="family_cleft_true"
                                                                value="true"
                                                                @if($cleft_baby->family_cleft == 'true') checked @endif
                                                            >
                                                        </div>
                                                        <label for="family_cleft_true" class="ml-2 mb-0">Yes</label>
                                                    </div>
                                                    <div class="d-flex align-items-center px-5">
                                                        <div
                                                            class="form-group mb-0 {{ $errors->has('family_cleft') ? ' has-danger' : '' }}">
                                                            <input
                                                                type="radio"
                                                                name="family_cleft"
                                                                id="family_cleft_false"
                                                                value="false"
                                                                @if($cleft_baby->family_cleft == 'false') checked @endif
                                                            >
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
                                                                <input
                                                                    type="radio"
                                                                    name="family_cleft_relatives"
                                                                    id="family_cleft_relatives_parents"
                                                                    value="parents"
                                                                    @if($cleft_baby->family_cleft_relatives == 'parents') checked @endif
                                                                >
                                                            </div>
                                                            <label for="family_cleft_relatives_parents" class="ml-2 mb-0">Parents</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('family_cleft_relatives') ? ' has-danger' : '' }}">
                                                                <input
                                                                    type="radio"
                                                                    name="family_cleft_relatives"
                                                                    id="family_cleft_relatives_offspring"
                                                                    value="offspring"
                                                                    @if($cleft_baby->family_cleft_relatives == 'offspring') checked @endif
                                                                >
                                                            </div>
                                                            <label for="family_cleft_relatives_offspring" class="ml-2 mb-0">Offspring</label>
                                                        </div>
                                                        <div class="d-flex align-items-center px-5">
                                                            <div
                                                                class="form-group mb-0 {{ $errors->has('family_cleft_relatives') ? ' has-danger' : '' }}">
                                                                <input
                                                                    type="radio"
                                                                    name="family_cleft_relatives"
                                                                    id="family_cleft_relatives_siblings"
                                                                    value="siblings"
                                                                    @if($cleft_baby->family_cleft_relatives == 'siblings') checked @endif
                                                                >
                                                            </div>
                                                            <label for="family_cleft_relatives_siblings" class="ml-2 mb-0">Siblings</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="d-flex">
                                            <label class="pr-4">{{ __('H/O periconceptional folic acid supplementation: ') }}</label>
                                            <div class="flex-grow-1">
                                                <div class="d-flex">
                                                    <div class="d-flex align-items-center px-5">
                                                        <div
                                                            class="form-group mb-0 {{ $errors->has('folic_acid_supplementation') ? ' has-danger' : '' }} ">
                                                            <input
                                                                type="radio"
                                                                name="folic_acid_supplementation"
                                                                id="folic_acid_supplementation_true"
                                                                value="true"
                                                                @if($cleft_baby->folic_acid_supplementation == true) checked @endif
                                                            >
                                                        </div>
                                                        <label for="folic_acid_supplementation_true" class="ml-2 mb-0">Yes</label>
                                                    </div>
                                                    <div class="d-flex align-items-center px-5">
                                                        <div
                                                            class="form-group mb-0 {{ $errors->has('folic_acid_supplementation') ? ' has-danger' : '' }}">
                                                            <input
                                                                type="radio"
                                                                name="folic_acid_supplementation"
                                                                id="folic_acid_supplementation_false"
                                                                value="false"
                                                                @if($cleft_baby->folic_acid_supplementation == false) checked @endif
                                                            >
                                                        </div>
                                                        <label for="folic_acid_supplementation_false" class="ml-2 mb-0">No</label>
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
                                                            <input
                                                                type="radio"
                                                                name="maternity_diet"
                                                                id="maternity_diet_adequate"
                                                                value="Adequate"
                                                                @if($cleft_baby->maternity_diet == 'Adequate') checked @endif
                                                            >
                                                        </div>
                                                        <label for="maternity_diet_adequate" class="ml-2 mb-0">Adequate</label>
                                                    </div>
                                                    <div class="d-flex align-items-center px-5">
                                                        <div
                                                            class="form-group mb-0 {{ $errors->has('maternity_diet') ? ' has-danger' : '' }}">
                                                            <input
                                                                type="radio"
                                                                name="maternity_diet"
                                                                id="maternity_diet_inadeqate"
                                                                value="Inadequate"
                                                                @if($cleft_baby->maternity_diet == 'Inadequate') checked @endif
                                                            >
                                                        </div>
                                                        <label for="maternity_diet_inadeqate" class="ml-2 mb-0">Inadequate</label>
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
                                                                    <input
                                                                        type="radio"
                                                                        name="mother_occupation"
                                                                        id="mother_occupation_housewife"
                                                                        value="Housewife"
                                                                        @if($cleft_baby->mother->occupation == 'Housewife') checked @endif
                                                                    >
                                                                </div>
                                                                <label for="mother_occupation_housewife" class="ml-2 mb-0">Housewife</label>
                                                            </div>
                                                            <div class="d-flex align-items-center px-5">
                                                                <div
                                                                    class="form-group mb-0 {{ $errors->has('mother_occupation') ? ' has-danger' : '' }} ">
                                                                    <input
                                                                        type="radio"
                                                                        name="mother_occupation"
                                                                        id="mother_occupation_business"
                                                                        value="Business"
                                                                        @if($cleft_baby->mother->occupation == 'Business') checked @endif
                                                                    >
                                                                </div>
                                                                <label for="mother_occupation_business" class="ml-2 mb-0">Business</label>
                                                            </div>
                                                            <div class="d-flex align-items-center px-5">
                                                                <div
                                                                    class="form-group mb-0 {{ $errors->has('mother_occupation') ? ' has-danger' : '' }} ">
                                                                    <input
                                                                        type="radio"
                                                                        name="mother_occupation"
                                                                        id="mother_occupation_service"
                                                                        value="Service"
                                                                        @if($cleft_baby->mother->occupation == 'Service') checked @endif
                                                                    >
                                                                </div>
                                                                <label for="mother_occupation_service" class="ml-2 mb-0">Service</label>
                                                            </div>
                                                            <div class="d-flex align-items-center px-5">
                                                                <div
                                                                    class="form-group mb-0 {{ $errors->has('mother_occupation') ? ' has-danger' : '' }} ">
                                                                    <input
                                                                        type="radio"
                                                                        name="mother_occupation"
                                                                        id="mother_occupation_mw"
                                                                        value="Manual Worker"
                                                                        @if($cleft_baby->mother->occupation == 'Manual Worker') checked @endif
                                                                    >
                                                                </div>
                                                                <label for="mother_occupation_mw" class="ml-2 mb-0">Manual Worker</label>
                                                            </div>
                                                            <div class="d-flex align-items-center px-5">
                                                                <div
                                                                    class="form-group mb-0 {{ $errors->has('mother_occupation') ? ' has-danger' : '' }} ">
                                                                    <input
                                                                        type="radio"
                                                                        name="mother_occupation"
                                                                        id="mother_occupation_others"
                                                                        value="Others"
                                                                        @if($cleft_baby->mother->occupation == 'Others') checked @endif
                                                                    >
                                                                </div>
                                                                <label for="mother_occupation_others" class="ml-2 mb-0">Others</label>
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
                                                                    <input
                                                                        type="radio"
                                                                        name="mother_personal"
                                                                        id="mother_personal_smoking"
                                                                        value="Smoking"
                                                                        @if($cleft_baby->mother->habbit == 'Smoking') checked @endif
                                                                    >
                                                                </div>
                                                                <label for="mother_personal_smoking" class="ml-2 mb-0">Smoking</label>
                                                            </div>
                                                            <div class="d-flex align-items-center px-5">
                                                                <div
                                                                    class="form-group mb-0 {{ $errors->has('mother_personal') ? ' has-danger' : '' }} ">
                                                                    <input
                                                                        type="radio"
                                                                        name="mother_personal"
                                                                        id="mother_personal_alcohol"
                                                                        value="Alcohol"
                                                                        @if($cleft_baby->mother->habbit == 'Alcohol') checked @endif
                                                                    >
                                                                </div>
                                                                <label for="mother_personal_alcohol" class="ml-2 mb-0">Alcohol</label>
                                                            </div>
                                                            <div class="d-flex align-items-center px-5">
                                                                <div
                                                                    class="form-group mb-0 {{ $errors->has('mother_personal') ? ' has-danger' : '' }} ">
                                                                    <input
                                                                        type="radio"
                                                                        name="mother_personal"
                                                                        id="mother_personal_non_smoking"
                                                                        value="Non smoking"
                                                                        @if($cleft_baby->mother->habbit == 'Non smoking') checked @endif
                                                                    >
                                                                </div>
                                                                <label for="mother_personal_non_smoking" class="ml-2 mb-0">Non smoking</label>
                                                            </div>
                                                            <div class="d-flex align-items-center px-5">
                                                                <div
                                                                    class="form-group mb-0 {{ $errors->has('mother_personal') ? ' has-danger' : '' }} ">
                                                                    <input
                                                                        type="radio"
                                                                        name="mother_personal"
                                                                        id="mother_personal_exposed"
                                                                        value="Exposed tobacco"
                                                                        @if($cleft_baby->mother->habbit == 'Exposed tobacco') checked @endif
                                                                    >
                                                                </div>
                                                                <label for="mother_personal_exposed" class="ml-2 mb-0">Exposed tobacco</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>

                                    </li>
                                </ol>
                            </form>
                        </validation-observer>
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
                    axios.post('{{ route('cleft_baby.get') }}', {
                            cleft_baby
                        })
                        .then(res => {
                            console.log(res);
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
                // console.log('created', this.babyId);
                // this.getBaby(this.babyId);
            }
        })

    </script>
@endpush
