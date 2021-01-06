@extends('layouts.app')

@section('content')
    <a href="{{ route('office.main') }}">Вернуться к списку отправлений</a><br><br>
    <p>История отправлений трек-кода {{ $dispatch->track_code }}:</p>
    @livewire('search-dispatch-history', ['dispatch' => $dispatch])
@endsection
