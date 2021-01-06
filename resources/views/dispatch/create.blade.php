@extends('layouts.app')

@section('content')
    <a href="{{ route('home') }}">Вернуться на главную</a>
    <br><br>
    <h1>Create dispatch</h1>
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
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        <input type="hidden" name="track_code" value="{{ \Faker\Provider\Miscellaneous::md5() }}">
        <input type="hidden" name="status" value="expects">
        <div class="form-group">
            <label for="city_dispatch">City dispatch</label>
            <input type="text" name="city_dispatch" id="city_dispatch" class="form-control" value="{{ old('city_dispatch')}}">
        </div>
        <div class="form-group">
            <label for="city_destination">City destination</label>
            <input type="text" name="city_destination" id="city_destination" class="form-control" value="{{ old('city_destination') }}">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}">
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
