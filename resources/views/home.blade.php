@extends('layouts.frontend', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])


@section('content')
<v-container>
    <v-row class="justify-content-center">
        <v-col md="10" sm="12">
            <v-card>
                <v-card-title>Dashboard</v-card-title>
                <v-card-text>
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
                    <p><b>NB. All the above history to be obtained from a control group of mothers of other cleft patients and, if possible, mothers of non-cleft children.</b></p>
                </v-card-text>
            </v-card>
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
        // console.log(this.hasState(15));
    },
    methods:{},
});
</script>
@endpush