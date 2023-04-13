@extends('layout')
@section('title') ToDo @endsection()

@section('main_content')
    <h1>Список заданий</h1>
    <hr>

    <ul>
{{--        @foreach ($items as $item)--}}
{{--            <li>--}}
{{--                {{ $item->name  }}--}}
{{--            </li>--}}
{{--        @endforeach--}}
    </ul>

    <hr>
@endsection()
