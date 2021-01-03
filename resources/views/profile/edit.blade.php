@extends('layouts.app')

@section('content')
    <p>Edit profile</p>
    <form action="" method="post">
        <div class="form-group">
            <label for="first_name">First name</label>
            <input type="text" name="first_name" id="first_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="last_name">Last name</label>
            <input type="text" name="last_name" id="last_name" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="old_password">Old password</label>
            <input type="password" name="old_password" id="old_password" class="form-control">
        </div>
        <div class="form-group">
            <label for="new_password">New password</label>
            <input type="password" name="new_password" id="new_password" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection
