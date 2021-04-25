@extends('layouts.frontend', ['activePage' => 'craniocacial.babies', 'titlePage' => "Cranifacial Babies"])

@push('styles')
<link rel="stylesheet" type="text/css" href="{{asset('material')}}/plugins/DataTables/media/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="{{asset('material')}}/plugins/DataTables/media/css/dataTables.bootstrap.css">
<link rel="stylesheet" type="text/css" href="{{asset('material')}}/plugins/DataTables/extensions/Buttons/css/buttons.dataTables.min.css">
<style>
    .dt-button-collection.dropdown-menu {
        position: relative;
        width: 100%;
        opacity: 1;
        transform: scale(1);
    }

    .buttons-columnVisibility {
        padding: 2px 0;
    }

    .buttons-columnVisibility a{
        background-color: lightgrey;
        border-radius: 5px !important;
    }

    .dt-buttons {
        margin-left: 20px;
    }
    div.dataTables_wrapper div.dataTables_info {
        padding-top: 5px !important;
    }
    .btn, .btn.btn-default {
        color: #fff;
        background-color: #999999;
        border-color: #999999;
        box-shadow: 0 2px 2px 0 rgba(153, 153, 153, 0.14), 0 3px 1px -2px rgba(153, 153, 153, 0.2), 0 1px 5px 0 rgba(153, 153, 153, 0.12);
    }

    .btn:focus, .btn:active, .btn:hover, .btn.btn-default:focus, .btn.btn-default:active, .btn.btn-default:hover {
        box-shadow: 0 14px 26px -12px rgba(153, 153, 153, 0.42), 0 4px 23px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(153, 153, 153, 0.2);
    }

    table tbody tr {
        max-height: 35px !important; /* or whatever height you need to make them all consistent */
    }

    table tbody td {
        height:35px !important;
        overflow:hidden;
        word-wrap:break-word;
        padding: 0 !important;
        white-space: nowrap;
        vertical-align: middle !important;
        padding: 0 5px !important;
    }

    table tbody td button {
        margin-top: 0 !important;
        margin-bottom: 0 !important;
    }

    div.dataTables_wrapper div.dataTables_paginate ul.pagination {
        margin: 0px !important;
    }

    .dataTables_wrapper .dataTables_paginate {
        padding-top: 0px !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding-top: 0px !important;
    }

    .page-link {
        padding: 5px 10px !important;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-0">
                <div class="card-header card-header-warning">
                    <h4 class="card-title">Craniofacial Cleft Babies</h4>
                </div>

                <div class="card-body mt-1">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div id="babies">
                                <div class="row justify-content-around">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table table-bordered table-striped" id="datatable">
                                            <thead class="thead-dark">
                                                <th>Baby Name</th>
                                                <th>Father Name</th>
                                                <th>Mother Name</th>
                                                {{-- <th>Email</th> --}}
                                                <th>Contact</th>
                                                {{-- <th>Address</th> --}}
                                                <th>Consanguinity</th>
                                                <th>Cleft Relatives</th>
                                                <th>Maternity Diet</th>
                                                <th>FA Supplementation</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </thead>
                                            <tbody>
                                                {{-- <tr v-for="(client, index) in clients" :key="index">
                                                    <td>{{client.id}}</td>
                                                    <td>{{client.name}}</td>
                                                </tr> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

<script src="{{asset('material')}}/plugins/DataTables/media/js/jquery.dataTables.js"></script>
<script src="{{asset('material')}}/plugins/DataTables/media/js/dataTables.bootstrap4.js"></script>
{{-- <script src="{{asset('material')}}/plugins/DataTables/media/js/dataTables.responsive.js"></script> --}}
<script src="{{asset('material')}}/plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('material')}}/plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js"></script>
<script src="{{asset('material')}}/plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js"></script>
<script src="{{asset('material')}}/plugins/DataTables/extensions/Buttons/js/jszip.min.js"></script>
<script src="{{asset('material')}}/plugins/DataTables/extensions/Buttons/js/pdfmake.js"></script>
<script src="{{asset('material')}}/plugins/DataTables/extensions/Buttons/js/vfs_fonts.js"></script>
<script src="{{asset('material')}}/plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('material')}}/plugins/DataTables/extensions/Buttons/js/buttons.print.min.js"></script>
<script src="{{asset('material')}}/plugins/DataTables/extensions/Buttons/js/buttons.colVis.min.js"></script>

<script>
const app = new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    data:{
        drawer: false,
        data : [],
        disabled: false,
    },
    computed: {
        hiddenColumns: function () { return this.supportUser ? [2, 13, 14, 15, 16, 17, 18] : [13, 14, 15, 16, 17, 18]; },
    },
    filters: {
        lowercase: function (value) {
            return value.toLowerCase();
        },

        dateTime: function (datetime) {
            if (!datetime) {
                return 'N/A'
            }
            return moment(datetime).format('YYYY-MM-DD HH:mm:ss');
            // return moment(date, 'YYYY-MM-DD').format(format);
        },
    },

    methods:{
        getData() {
            axios.get('{{route("get.research-data")}}')
                .then(res=>{
                    this.data = res.data;
                    this.$nextTick(function () {
                        this.drawDatatable(function(){
                                $('html, body').animate({
                                    scrollTop: $('#datatable').offset().top - 70
                                }, 1000);
                            });
                        this.report = true;
                    });
                })
                .catch(e=> function(){
                    this.disabled = !this.disabled;
                    this.button_text = 'Fetch';
                });
        },
        drawDatatable(callback = null){
            $('#datatable').DataTable().destroy();
            this.$nextTick(function () {
                $('#datatable').DataTable({
                    processing: true,
                    serverSide: false,
                    dom : 'iBfrtlp',
                    destroy: true,
                    data: this.data,
                    buttons: !this.supportUser ? [
                                { extend: 'colvis', className: 'btn-sm',
                                    collectionLayout: 'fixed two-column',
                                //  columnText: function ( dt, idx, title ) {
                                //         return (idx+1)+': '+title;
                                //     }
                                },
                                { extend: 'copy', className: 'btn-sm' },
                                { extend: 'csv', className: 'btn-sm' },
                                { extend: 'excel', className: 'btn-sm' },
                                { extend: 'print', className: 'btn-sm' },
                                { extend: 'pdf', className: 'btn-sm' },
                            ] : [
                                    { extend: 'colvis', className: 'btn-sm',
                                        collectionLayout: 'fixed two-column',
                                    //  columnText: function ( dt, idx, title ) {
                                    //         return (idx+1)+': '+title;
                                    //     }
                                    }
                            ],
                    paging: 50,
                    order : [[ 0, "desc"]],
                    iDisplayLength: 100,
                    lengthMenu: [[25, 50, 100, 200, -1], [25, 50, 100, 200, "All"]],
                    columns: [
                                { data: 'baby_name', name: 'baby_name'},
                                { data: 'father_name', name: 'father_name'},
                                { data: 'mother_name', name: 'mother_name'},
                                // { data: 'email', name: 'email'},
                                { data: 'first_contact', name: 'first_contact'},
                                // { data: 'address', name: 'address', render: 'address.address_type'},
                                { data: 'consanguinity', name: 'consanguinity', render:function(data, type, row) {
                                        const consanguinity = row.consanguineous_marriage ? row.consanguinity : 'No';
                                        return consanguinity;
                                    }
                                },

                                { data: 'family_cleft_relatives', name: 'family_cleft_relatives', render:function(data, type, row) {
                                        const family_cleft_relatives = row.family_cleft ? row.family_cleft_relatives : 'No';
                                        return family_cleft_relatives;
                                    }
                                },

                                { data: 'folic_acid_supplementation', name: 'folic_acid_supplementation', render:function(data, type, row) {
                                        const folic_acid_supplementation = row.folic_acid_supplementation ? 'Yes' : 'No';
                                        return folic_acid_supplementation;
                                    }
                                },

                                { data: 'maternity_diet', name: 'maternity_diet', render:function(data, type, row) {
                                        const maternity_diet = row.maternity_diet ? 'Yes' : 'No';
                                        return maternity_diet;
                                    }
                                },
                                { data: 'created_at', name: 'created_at', render: function(data, type, row) {
                                        return new Date(row.created_at).toLocaleDateString();
                                    }
                                },
                                { data: 'view', name: 'view', render:function(data, type, row){
                                        return '<a href="/cleft_baby/' + row.id + '/show" class="btn btn-sm btn-primary text-white view"><i class="fa fa-binoculars"></i>View</a> <a href="/cleft_baby/' + row.id + '/delete" class="btn btn-sm btn-alert text-white delete"><i class="fa fa-binoculars"></i>Delete</a>';
                                    },
                                },


                            ],
                    // columnDefs : [
                    //         { "visible": false, "targets": this.hiddenColumns },
                    //         // { "width": "20%", "targets": 10 },
                    //     ],
                    drawCallback: function( settings ) {
                        $('.delete').click(function(e){
                            if(!confirm('Are you sure?')) e.preventDefault();
                        });
                    },
                    initComplete : function( settings, json){
                        // call your function here
                        if(callback) callback();
                    },
                });
            })
        },

    },
    mounted() {},
    created(){
        this.getData();
    }
})
</script>
@endpush
