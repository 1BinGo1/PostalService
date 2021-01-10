@extends('layouts.app', ['title' => __('Dispatch list')])

@section('breadcrumbs', Breadcrumbs::render('office.list_dispatch'))

@section('content')
    @livewire('search-dispatch', ['user' => $user])
@endsection
