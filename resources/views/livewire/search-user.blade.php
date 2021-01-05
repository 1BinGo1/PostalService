<div>
    <div class="form-group">
        <label for="search">Search users</label>
        <input wire:model="search_user" type="text" class="form-control col-6" id="search" placeholder="Search users...">
    </div>
    <a href="{{ route('profile.create') }}" class="btn btn-primary">Create new user</a><br><br>
    <table class="table table-bordered ">
        <tr>
            <th>№</th>
            <th>Фамилия Имя</th>
            <th>Email</th>
            <th>Количество отправлений</th>
            <th>Сумма стоимости всех отправлений</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a href="{{ route('office.list_dispatch', ['user_id' => $user->id]) }}">{{ $user->last_name }} {{ $user->first_name }}</a></td>
                <td>{{ $user->email }}</td>
                @php
                    $dispatch = $user->dispatch;
                @endphp
                <td>{{ count($dispatch) }}</td>
                @php
                    $all_price = 0;
                    foreach ($dispatch as $item){
                        $all_price += $item->price;
                    }
                @endphp
                <td>{{ $all_price }}</td>
                @can('admin', \App\Models\User::class)
                    <td>
                        <form action="{{ route('profile.destroy', ['id' => $user->id]) }}"
                              method="post" onsubmit="return confirm('Удалить этого пользователя?')"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger" value="Удалить">
                        </form>
                    </td>
                @endcan
            </tr>
        @endforeach
    </table>
</div>
