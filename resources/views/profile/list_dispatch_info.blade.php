@extends('layouts.app')

@section('content')
    <a href="{{ route('profile.list_dispatch') }}">Вернуться к списку отправлений</a><br><br>


    <p>{{ $dispatch->track_code }}</p>
    <p>{{ $dispatch->created_at }}</p>
    <p>{{ $dispatch->status }}</p>
    <p>{{ $dispatch->city_dispatch }}</p>
    <p>{{ $dispatch->city_destination }}</p>
    <p>{{ $dispatch->price }}</p>
@endsection
