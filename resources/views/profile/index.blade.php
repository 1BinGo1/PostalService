@extends('layouts.app')

@section('content')
    <p>Profile</p>
    <p>First name: {{ auth()->user()->first_name }}</p>
    <p>Last name: {{ auth()->user()->last_name }}</p>
    <p>Email: {{ auth()->user()->email }}</p>
    <a href="{{ route('profile.edit') }}">Edit personal data</a>
@endsection
