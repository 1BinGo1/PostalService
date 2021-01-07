@extends('layouts.app')

@section('content')
    <a href="{{ route('home') }}">Вернуться на главную</a>
    <br><br>
    <h1>Create user</h1>
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
            <label for="admin">Role</label>
            <select class="form-control" name="admin" id="admin">
                <option value="0">Пользователь</option>
                <option value="1">Администратор</option>
            </select>
        </div>
        <div class="form-group">
            <label for="first_name">First name</label>
            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name')}}">
        </div>
        <div class="form-group">
            <label for="last_name">Last name</label>
            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" value="{{ old('password') }}">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
