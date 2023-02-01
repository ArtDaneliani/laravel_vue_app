@extends('layout')
@section('title')Vue @endsection()

@section('main_content')
    <h1>страница с использованием Vue 3</h1>
    <div>
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center py-4 sm:pt-0">
            <welcome/>
        </div>
{{--        <div>--}}
{{--            <home/>--}}
{{--        </div>--}}
    </div>
@endsection()


