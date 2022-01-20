@extends('layout.master')

@section('content')
    <province-abm
        data="{{ $province }}"
    ></province-abm>
@endsection
