<div>
    <div class="form-group">
        <label for="search">Search dispatch</label>
        <input wire:model="search_dispatch_history" type="text" class="form-control col-6" id="search" placeholder="Search dispatch...">
    </div>
    <table class="table table-bordered ">
        <tr>
            <th>№</th>
            <th>Дата создания</th>
            <th>Статус</th>
            <th>Город отправления</th>
            <th>Город назначения</th>
        </tr>
        @foreach($dispatch_history as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->city_dispatch }}</td>
                <td>{{ $item->city_destination }}</td>
            </tr>
        @endforeach
    </table>
</div>
