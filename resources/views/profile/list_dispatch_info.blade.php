@extends('layouts.app')

@section('content')
    <a href="{{ route('profile.list_dispatch') }}">Вернуться к списку отправлений</a><br><br>
    <p>История отправлений трек-кода {{ $dispatch->track_code }}:</p>
    <table class="table table-bordered ">
        <tr>
            <th>№</th>
            <th>Дата создания</th>
            <th>Статус</th>
            <th>Город отправления</th>
            <th>Город назначения</th>
        </tr>
        @foreach($dispatch->history as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->city_dispatch }}</td>
                <td>{{ $item->city_destination }}</td>
            </tr>
        @endforeach
    </table>
@endsection
