@extends('layouts.app', ['title' => __('Profile')])

@section('content')
    <a href="{{ route('home') }}">{{ __('Go back to the main page') }}</a><br><br>
    <div class="card">
        <div class="card-header">{{ __('Profile') }}</div>
        <div class="card-body text-dark">
            <p class="card-title">{{ __('First name') }}: {{ auth()->user()->first_name }}</p>
            <p class="card-text">{{ __('Last name') }}: {{ auth()->user()->last_name }}</p>
            <p class="card-text">Email: {{ auth()->user()->email }}</p>
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">{{ __('Edit personal data') }}</a>
        </div>
    </div>
@endsection
