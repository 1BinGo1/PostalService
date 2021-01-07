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
        <input type="hidden" name="admin" value="{{ auth()->user()->admin }}">
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
        <input type="hidden" name="api_key" value="{{ auth()->user()->api_key }}">
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection
