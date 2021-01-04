<div>

    <div class="form-group">
        <label for="search">Search</label>
        <input wire:model="search" type="text" class="form-control col-6" id="search" placeholder="Search...">
    </div>

<!--    <div class="card">
        <ul class="list-group list-group-flush">
            @foreach($dispatch as $item)
                <li class="list-group-item">{{ $item->track_code }}</li>
            @endforeach
        </ul>
    </div>-->

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
                <td><a href="{{ route('office.list_dispatch_info', ['id' => $item->id]) }}">{{ $item->track_code }}</a></td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->city_dispatch }}</td>
                <td>{{ $item->city_destination }}</td>
                <td>{{ $item->price }}</td>
            </tr>
        @endforeach
    </table>

</div>
