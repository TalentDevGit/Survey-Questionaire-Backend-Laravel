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
    <form action="{{ route('user.store')}}" method="post">
        @csrf
        <div class="row">
            <h5 class="title" id="exampleModalLabel">Add User</h5>
        </div>
        <div class="row form-group">
            <div class="col-sm-6">
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="email" placeholder="Email Address">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-6">
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-6">
                <input type="text" class="form-control" name="phone" placeholder="Phone">
            </div>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="role_id" placeholder="Role ID">
            </div>
        </div>
        <div class="row footer" style="text-align: center">
            @if ($errors->any() === true)
                <a href="javascript: history.go(-2);" class="btn btn-primary btn-success">Back</a>
            @else
                <a href="{{ url()->previous() }}" class="btn btn-primary btn-success">Back</a>
            @endif
            <input type="button" class="btn btn-primary" id="add" value="Add">
        </div>
    </form>
</div>

<script>
    $('#add').click(function(){
        var error = 0;
        $(":text").each(function(){
            if ($(this).val() == "") {
                error = 1;
            }
        });
        if ($(":password") == ""){
            error = 1;
        }
        if (error == 0)
            $("form").submit();
        else
            alert('Input Datas!');
    });
</script>
@endsection