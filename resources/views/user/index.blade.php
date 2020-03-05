@extends('layouts.app')

@section('content')
<div class="container">
    @php
        {{ $isAdmin = /*Auth::user()->role_id == 1 ? true : false*/true; }}
    @endphp
    <!-- Small boxes (Stat box) -->
    @if($isAdmin === true)
        <!-- admin panel -->
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>
                            Digital Seat Media
                        </h3>
                        <p>
                            <h4>Total <b>{{$users_count}}</b> of Venue Questionaires<h4>
                        </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="/" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div><!-- ./col -->
        </div><!-- /.row -->
    @endif
    
    @if (isset($users))
        <div class="row" style="height: 90px; text-align:center">
            <h1>
                Venue Questionaire Management
                <!-- <a href="{{ route('user.create') }}" class="btn btn-primary" style="float: right">Add +</a> -->
            </h1>
        </div>
        <!-- top row -->
        <div class="row">
            <div class="col-xs-12 connectedSortable">
                <div class="box">
                    <div class="box-body table-responsive">
                        <table id="DataTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Venue Name</th>
                                    <th>Seat count</th>
                                    <th>Name1</th>
                                    <th>Phone1</th>
                                    <th>Email1</th>
                                    <th>Name2</th>
                                    <th>Phone2</th>
                                    <th>Email2</th>
                                    <th>View</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    {{ $i=0; }}
                                @endphp
                                @foreach($users as $row)
                                @php  {{$i++;}} @endphp
                                <tr id="Row-{{$i}}">
                                    <td>{{$i}}</td>
                                    <td>{{$row['venue_name']}}</td>
                                    <td>{{$row['seat_cnt']}}</td>
                                    <td>{{$row['name1']}}</td>
                                    <td>{{$row['number1']}}</td>
                                    <td>{{$row['email1']}}</td>
                                    <td>{{$row['name2']}}</td>
                                    <td>{{$row['number2']}}</td>
                                    <td>{{$row['email2']}}</td>
                                    <td style="text-align: center">
                                        <a href="{{ route('user.show', $row['id']) }}" class="btn btn-warning"><i class="fa fa-eye"></i></a></td>
                                    <td style="text-align: center"><a href="{{ route('user.edit', $row['id']) }}" class="btn btn-success"><i class="fa fa-edit"></i></a></td>
                                    <td style="text-align: center"><form action="{{ route('user.destroy', $row['id']) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"><i class="fa fa-times"></i></button>
                                        </form></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div>
        <!-- /.row -->
    @endif
</div>

<script>
    $("#DataTable").dataTable();
</script>

@endsection