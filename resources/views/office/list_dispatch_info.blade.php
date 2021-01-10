@extends('layouts.app', ['title' => __('Information about dispatch')])

@section('breadcrumbs', Breadcrumbs::render('office.list_dispatch_info'))

@section('content')
    <a href="{{ route('office.main') }}">{{ __('Go back to the list dispatch') }}</a><br><br>
    <p>{{ __('Track code sending history') }}: {{ $dispatch->track_code }}:</p>
    @livewire('search-dispatch-history', ['dispatch' => $dispatch])
@endsection
