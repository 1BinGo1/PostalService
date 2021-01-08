<div>
    <div class="form-group">
        <label for="search_dispatch_history">{{ __('Search dispatch') }}</label>
        <input wire:model="search_dispatch_history" type="text" class="form-control col-6" id="search_dispatch_history" placeholder="{{ __('Search dispatch') }}...">
    </div>
    <table class="table table-bordered ">
        <tr>
            <th>№</th>
            <th>{{ __('Date created') }}</th>
            <th>{{ __('Status') }}</th>
            <th>{{ __('City dispatch') }}</th>
            <th>{{ __('City destination') }}</th>
        </tr>
        @foreach($dispatch_history as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ __($item->status) }}</td>
                <td>{{ $item->city_dispatch }}</td>
                <td>{{ $item->city_destination }}</td>
            </tr>
        @endforeach
    </table>
    {{ $dispatch_history->onEachSide(1)->links() }}
</div>
