@extends('layouts.app', ['title' => "Список отправлений"])

@section('content')
    <a href="{{ route('home') }}">Вернуться на главную</a><br><br>
    <p>Список отправлений пользователя {{ $user->last_name . " " . $user->first_name }}:</p>
    @livewire('search-dispatch', ['user' => $user])
@endsection
