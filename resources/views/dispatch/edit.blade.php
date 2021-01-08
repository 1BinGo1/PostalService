@extends('layouts.app', ['title' => "Редактирование отправления"])

@section('content')
    <a href="{{ route('office.main') }}">Вернуться к списку отправлений</a>
    <br><br>
    <h1>Edit dispatch</h1>
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
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status">
                <option value="expects" @if($dispatch->status === 'expects') selected @endif>Ожидает отправки</option>
                <option value="sent" @if($dispatch->status === 'sent') selected @endif>Отправлен</option>
                <option value="delivered" @if($dispatch->status === 'delivered') selected @endif>Доставлен</option>
                <option value="issued" @if($dispatch->status === 'issued') selected @endif>Выдан получателю</option>
            </select>
        </div>
        <div class="form-group">
            <label for="city_dispatch">City dispatch</label>
            <input type="text" name="city_dispatch" id="city_dispatch" class="form-control" value="{{ old('city_dispatch') ?? $dispatch->city_dispatch}}">
        </div>
        <div class="form-group">
            <label for="city_destination">City destination</label>
            <input type="text" name="city_destination" id="city_destination" class="form-control" value="{{ old('city_destination') ?? $dispatch->city_destination }}">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ old('price') ?? $dispatch->price }}">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection
