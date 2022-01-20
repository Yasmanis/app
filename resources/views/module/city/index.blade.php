@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex flex-wrap align-items-center mb-4">
                    <div class="me-2">
                        <h4 class="card-title">Ciudades</h4>
                        <p class="card-title-desc">Listado de Ciudades:</p>
                    </div>
                </div>
                <div class="card-body">
                    <table-vue
                        table_header="{{ $table_header }}"
                        data="{{ $dataTable }}"
                        base_url="{{ $base_url }}"
                        no_action="true"
                    ></table-vue>
                </div>
            </div>
        </div>
    </div>
    @if(session()->has('message'))
        <Message
            message="{{ session()->get('message') }}"
        ></Message>
    @endif
@endsection
