<div>
    <div class="form-group">
        <label for="search_dispatch_all">Search dispatch</label>
        <input wire:model="search_dispatch_all" type="text" class="form-control col-6" id="search_dispatch_all" placeholder="Search dispatch...">
    </div>
    <div class="form-group">
        <label for="filter">Filter by price dispatch</label>
        <select class="form-control col-3" id="filter_price" wire:change="edit_filter('{{ $filter_price }}')">
            <option @if ($filter_price == "asc") selected @endif >По возрастанию</option>
            <option @if ($filter_price == "desc") selected @endif>По убыванию</option>
        </select>
        <br>
        <a href="{{ route('profile.create') }}" class="btn btn-primary">Create new dispatch</a>
    </div>
    <table class="table table-bordered">
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
                <td><a href="{{ route('office.list_dispatch_info', ['dispatch_id' => $item->id]) }}">{{ $item->track_code }}</a></td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->city_dispatch }}</td>
                <td>{{ $item->city_destination }}</td>
                <td>{{ $item->price }}</td>
            </tr>
        @endforeach
    </table>
</div>
