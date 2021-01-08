<div>
    <div class="form-group">
        <label for="search_dispatch_all">{{ __('Search dispatch') }}</label>
        <input wire:model="search_dispatch_all" type="text" class="form-control col-6" id="search_dispatch_all" placeholder="{{ __('Search dispatch') }}...">
    </div>
    <div class="form-group">
        <label for="filter">{{ __('Filter by price dispatch') }}</label>
        <select class="form-control col-3" id="filter_price" wire:change="edit_filter('{{ $filter_price }}')">
            <option @if ($filter_price == "asc") selected @endif >{{ __('By desc') }}</option>
            <option @if ($filter_price == "desc") selected @endif>{{ __('By asc') }}</option>
        </select>
        <br>
        <a href="{{ route('dispatch.create') }}" class="btn btn-primary">{{ __('Create new dispatch') }}</a>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>№</th>
            <th>{{ __('Track code') }}</th>
            <th>{{ __('Date created') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('City dispatch') }}</th>
            <th>{{ __('City destination') }}</th>
            <th>{{ __('Cost of delivery') }}</th>
        </tr>
        @foreach($dispatch as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a href="{{ route('office.list_dispatch_info', ['dispatch_id' => $item->id]) }}">{{ $item->track_code }}</a></td>
                <td>{{ $item->created_at }}</td>
                <td>{{ __($item->status) }}</td>
                <td>{{ $item->city_dispatch }}</td>
                <td>{{ $item->city_destination }}</td>
                <td>{{ $item->price }}</td>
                <td>
                    <a href="{{ route('dispatch.edit', ['dispatch' => $item->id]) }}" class="btn btn-primary">{{ __('Edit') }}</a><br><br>
                    <form action="{{ route('dispatch.destroy', ['dispatch' => $item->id]) }}"
                          method="post" onsubmit="return confirm({{ __('Remove this record?') }})"
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="{{ __('Remove') }}">
                    </form>
                </td>

            </tr>
        @endforeach
    </table>
    {{ $dispatch->onEachSide(1)->links() }}
</div>
