@extends('admin.dashboard')


@section('content')
<div class="container">
<h1>Danh sách người dùng</h1>

<form action="{{route('user.searchUser')}}" method="GET">
    <input type="text" name="search" placeholder="Search..." class="input-search">
    <button type="submit" class="btn btn-warning">Search</button>
</form>
<table class="table table-hover">
    <thead>
        <tr>
             <th>Mã người dùng</th>
            <th>Tên người dùng</th>
            <th>Email</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <th>{{$user->id_user}}</th>
            <th>{{$user->name}}</th>
            <th>{{$user->email}}</th>
            <th>{{$user->phone}}</th>
            <th>{{$user->address}}</th>
            <th>
            <a href="{{route('user.updateUser',['id' => $user->id_user]) }}" class="btn btn-primary">Update</a>
            </th>
            <th>
                <a href="{{route('user.deleteUser',['id' => $user->id_user]) }}" class="btn btn-danger">Delete</a>
            </th>
        </tr>
        
        @endforeach
    </tbody>
</table>
</div>
<style>
    .input-search{
        width: 30%;
        height: 40px;
        border-radius: 15px;
        padding-left: 15px;
    }
    .btn-warning{
        color: white;
        font-weight: bold;
    }
    .btn-warning:hover{
        color: white;
    }
    table th, table td{
        border: 1px solid black;
    }
    table{
        margin-top: 50px;
    }
</style>
@endsection('content')