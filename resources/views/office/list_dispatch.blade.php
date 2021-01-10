@extends('layouts.app', ['title' => __('Dispatch list')])

@section('breadcrumbs', Breadcrumbs::render('office.list_dispatch'))

@section('content')
    <a href="{{ route('home') }}">{{ __('Go back to the main page') }}</a><br><br>
    <p>{{ __('Dispatch list user') }} {{ $user->last_name . " " . $user->first_name }}:</p>
    @livewire('search-dispatch', ['user' => $user])
@endsection
