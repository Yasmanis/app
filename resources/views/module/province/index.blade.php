@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header d-flex flex-wrap align-items-center mb-4">
                    <div class="me-2">
                        <h4 class="card-title">Provincias</h4>
                        <p class="card-title-desc">Listado de Provincias:</p>
                    </div>
                    <div class="ms-auto">
                        <a href="{{ route('provincias.create') }}" class="btn btn-soft-primary waves-effect waves-light">Agregar Provincia</a>
                    </div>
                </div>
                <div class="card-body">
                    <table-vue
                        table_header="{{ $table_header }}"
                        data="{{ $provinces }}"
                        base_url="{{ $base_url }}"
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
