@extends('layout')
@section('title') Login @endsection()

@section('main_content')
    <h1>Вход</h1>
    <hr>
    @if ($errors->any())
    @foreach($errors->all() as $error)
        <div class="errors">{{ $error }}</div>
    @endforeach
    @endif
    <form method="POST" action="{{ route('user-login') }}">
        @csrf
        <input type="email" name="email" placeholder="Username"/>
        <input type="password" name="password" placeholder="Password"/>
        <button type="submit">Войти</button>
    </form>

    <hr>
@endsection()

