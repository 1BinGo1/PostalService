@extends('layouts.app', ['title' => __('Create a new user')])

@section('breadcrumbs', Breadcrumbs::render('profile.create'))

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('profile.store') }}" method="post">
        @csrf
        <input type="hidden" name="api_key" value="">
        <div class="form-group">
            <label for="admin">{{ __('Role') }}</label>
            <select class="form-control" name="admin" id="admin">
                <option value="0">{{ __('User') }}</option>
                <option value="1">{{ __('Administrator') }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="first_name">{{ __('First name') }}</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name')}}">
        </div>
        <div class="form-group">
            <label for="last_name">{{ __('Last name') }}</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Create a new user') }}</button>
    </form>
@endsection
