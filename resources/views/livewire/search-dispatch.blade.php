<div>
    <div class="form-group">
        <label for="search_dispatch">Search dispatch</label>
        <input wire:model="search_dispatch" type="text" class="form-control col-6" id="search_dispatch" placeholder="Search dispatch...">
    </div>
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
                <td><a href="{{ route('office.list_dispatch_info', ['dispatch_id' => $item->id]) }}">{{ $item->track_code }}</a></td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->city_dispatch }}</td>
                <td>{{ $item->city_destination }}</td>
                <td>{{ $item->price }}</td>
                <td>
                    <a href="{{ route('dispatch.edit', ['dispatch' => $item->id]) }}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form action="{{ route('dispatch.destroy', ['dispatch' => $item->id]) }}"
                          method="post" onsubmit="return confirm('Удалить эту запись?')"
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Remove">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $dispatch->onEachSide(1)->links() }}
</div>
