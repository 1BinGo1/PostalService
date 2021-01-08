@extends('layouts.app', ['title' => __('Create new dispatch')])

@section('content')
    <a href="{{ route('home') }}">{{ __('Go back to the main page') }}</a>
    <br><br>
    <h1>{{ __('Create new dispatch') }}</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('dispatch.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="city_dispatch">{{ __('City dispatch') }}</label>
            <input type="text" name="city_dispatch" id="city_dispatch" class="form-control" value="{{ old('city_dispatch')}}">
        </div>
        <div class="form-group">
            <label for="city_destination">{{ __('City destination') }}</label>
            <input type="text" name="city_destination" id="city_destination" class="form-control" value="{{ old('city_destination') }}">
        </div>
        <div class="form-group">
            <label for="price">{{ __('Price') }}</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}">
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Create new dispatch') }}</button>
    </form>
@endsection
