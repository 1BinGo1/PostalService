@extends('layouts.app')

@section('content')
    <a href="{{ route('profile.index') }}">Вернуться к профилю</a>
    <br>
    <h1>Edit profile</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('profile.update') }}" method="post">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="first_name">First name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') ?? auth()->user()->first_name }}">
        </div>
        <div class="form-group">
            <label for="last_name">Last name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') ?? auth()->user()->last_name }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') ?? auth()->user()->email }}">
        </div>
        <div class="form-group">
            <label for="old_password">Old password</label>
            <input type="password" name="old_password" id="old_password" class="form-control" value="{{ old('old_password') }}">
        </div>
        <div class="form-group">
            <label for="new_password">New password</label>
            <input type="password" name="new_password" id="new_password" class="form-control" value="{{ old('new_password') }}">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection
