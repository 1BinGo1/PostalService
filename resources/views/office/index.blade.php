@extends('layouts.app', ['title' => __('Dispatch list')])

@section('content')
    <a href="{{ route('home') }}">{{ __('Go back to the main page') }}</a><br><br>
    <p>{{ __('Dispatch list') }}:</p>
    @livewire('search-dispatch', ['user' => $user])
@endsection
