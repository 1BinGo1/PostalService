@extends('layouts.app', ['title' => "Главная"])

@section('content')
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link active link_block" id="block_dispatch" href="#">Список отправлений</a>
                </li>
                @can('admin', \App\Models\User::class)
                    <li class="nav-item">
                        <a class="nav-link link_block" id="block_users" href="#">Пользователи</a>
                    </li>
                @endcan
            </ul>
        </div>
        <div class="card-body block_data" id="list_dispatch">
            @livewire('search-dispatch-all')
        </div>
        @can('admin', \App\Models\User::class)
            <div class="card-body hide-block block_data" id="list_users">
                @livewire('search-user')
            </div>
        @endcan
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/main.js') }}"></script>
@endpush
