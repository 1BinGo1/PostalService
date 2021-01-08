@extends('layouts.app', ['title' => __('Edit dispatch')])

@section('content')
    <a href="{{ route('office.main') }}">{{ __('Go back to the list dispatch') }}</a>
    <br><br>
    <h1>{{ __('Edit dispatch') }}</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('dispatch.update', ['dispatch' => $dispatch->id]) }}" method="post">
        @csrf
        @method('PATCH')
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <input type="hidden" name="track_code" value="{{ $dispatch->track_code }}">
        <div class="form-group">
            <label for="status">{{ __('Status') }}</label>
            <select class="form-control" name="status" id="status">
                <option value="Expects" @if($dispatch->status === 'Expects') selected @endif>{{ __('Expects') }}</option>
                <option value="Sent" @if($dispatch->status === 'Sent') selected @endif>{{ __('Sent') }}</option>
                <option value="Delivered" @if($dispatch->status === 'Delivered') selected @endif>{{ __('Delivered') }}</option>
                <option value="Issued" @if($dispatch->status === 'Issued') selected @endif>{{ __('Issued') }}</option>
            </select>
        </div>
        <div class="form-group">
            <label for="city_dispatch">{{ __('City dispatch') }}</label>
            <input type="text" name="city_dispatch" id="city_dispatch" class="form-control" value="{{ old('city_dispatch') ?? $dispatch->city_dispatch}}">
        </div>
        <div class="form-group">
            <label for="city_destination">{{ __('City destination') }}</label>
            <input type="text" name="city_destination" id="city_destination" class="form-control" value="{{ old('city_destination') ?? $dispatch->city_destination }}">
        </div>
        <div class="form-group">
            <label for="price">{{ __('Price') }}</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ old('price') ?? $dispatch->price }}">
        </div>
        <button type="submit" class="btn btn-primary">{{ __('Edit dispatch') }}</button>
    </form>
@endsection
