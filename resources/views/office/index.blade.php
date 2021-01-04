@extends('layouts.app')

@section('content')
    <a href="{{ route('home') }}">Вернуться на главную</a><br><br>
    <p>Список отправлений:</p>
    @livewire('search-dispatch-all')
@endsection
