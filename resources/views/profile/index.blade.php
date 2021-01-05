@extends('layouts.app')

@section('content')
    <div class="card border-dark">
        <div class="card-header">Profile</div>
        <div class="card-body text-dark">
            <p class="card-title">First name: {{ auth()->user()->first_name }}</p>
            <p class="card-text">Last name: {{ auth()->user()->last_name }}</p>
            <p class="card-text">Email: {{ auth()->user()->email }}</p>
            <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit personal data</a>
        </div>
    </div>
@endsection
