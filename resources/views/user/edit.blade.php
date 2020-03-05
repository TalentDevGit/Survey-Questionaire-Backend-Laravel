@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    <form action="{{ route('user.update', $user->id) }}" method="post">
        @method('PATCH')
        @csrf
        <div class="row">
            <h5 class="title" id="exampleModalLabel">Edit User</h5>
        </div>
        <div class="row form-group">
            <div class="col-sm-6">
                UserName
                <input type="text" class="form-control" name="username" value="{{$user->username}}">
            </div>
            <div class="col-sm-6">
                Email Address
                <input type="text" class="form-control" name="email_address" value="{{$user->email}}">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-6">
                Passsword
                <input type="password" class="form-control" name="password" value="">
            </div>
            <div class="col-sm-6">
                Full Name
                <input type="text" class="form-control" name="fullname" value="{{$user->fullname}}">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-6">
                Phone Number
                <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
            </div>
            <div class="col-sm-6">
                Role ID
                <input type="text" class="form-control" name="role_id" value="{{$user->role_id}}">
            </div>
        </div>
        <div class="row footer" style="text-align: center">
            @if ($errors->any() === true)
                <a href="javascript: history.go(-2);" class="btn btn-primary btn-success">Back</a>
            @else
                <a href="{{ url()->previous() }}" class="btn btn-primary btn-success">Back</a>
            @endif
            <input type="button" class="btn btn-primary" id="update" value="Update">
        </div>
    </form>
</div>

<script>
    $('#update').click(function(){
        var error = 0;
        $(":text").each(function(){
            if ($(this).val() == "") {
                error = 1;
            }
        });
        if ($(":password").val() == ""){
            error = 1;
        }
        if (error == 0)
            $("form").submit();
        else
            alert('Input Datas!');
    });
</script>

@endsection