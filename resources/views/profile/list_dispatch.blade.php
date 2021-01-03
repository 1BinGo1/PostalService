@extends('layouts.app')

@section('content')
    <a href="{{ route('profile.main') }}">Вернуться на главную</a><br><br>
    <table class="table table-bordered ">
        <tr>
            <th>№</th>
            <th>Трек-код</th>
            <th>Дата создания</th>
            <th>Статус</th>
            <th>Город отправления</th>
            <th>Город назначения</th>
            <th>Стоимость доставки</th>
        </tr>
        @foreach($dispatch as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a href="{{ route('profile.list_dispatch_info', ['id' => $item->id]) }}">{{ $item->track_code }}</a></td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->city_dispatch }}</td>
                <td>{{ $item->city_destination }}</td>
                <td>{{ $item->price }}</td>
            </tr>
        @endforeach
    </table>
@endsection
