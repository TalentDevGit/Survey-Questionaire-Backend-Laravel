@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="row">
            Venue Name : {{$user->venue_name}}</div>
        <div class="row">
            Inclusive of suites and designated hospitality areas, how many total seats are in the venue? : {{$user->seat_cnt}}</div>
        <div class="row">
            <table style="border:1px solid lightgrey" width="50%">
                <tr style="background-color:#ddd;" align="center">
                    <td width="20%" style="border:1px solid #aaa">Type of seat</td>
                    <td width="20%" style="border:1px solid #aaa">Plastic</td>
                    <td width="20%" style="border:1px solid #aaa">Metal</td>
                    <td width="20%" style="border:1px solid #aaa">Wood</td>
                    <td width="20%" style="border:1px solid #aaa">Other</td>
                </tr>
                <tr align="center">
                    <td style="background-color:#ddd;border:1px solid #aaa">Bleachers</td>
                    <td style="border:1px solid #aaa">{{$user->val1_1}}</td>
                    <td style="border:1px solid #aaa">{{$user->val1_2}}</td>
                    <td style="border:1px solid #aaa">{{$user->val1_3}}</td>
                    <td style="border:1px solid #aaa">{{$user->val1_4}}</td>
                </tr>
                <tr align="center">
                    <td style="background-color:#ddd;border:1px solid #aaa">Stadium chairbacks</td>
                    <td style="border:1px solid #aaa">{{$user->val2_1}}</td>
                    <td style="border:1px solid #aaa">{{$user->val2_2}}</td>
                    <td style="border:1px solid #aaa">{{$user->val2_3}}</td>
                    <td style="border:1px solid #aaa">{{$user->val2_4}}</td>
                </tr>
                <tr align="center">
                    <td style="background-color:#ddd;border:1px solid #aaa">Folding Chairs</td>
                    <td style="border:1px solid #aaa">{{$user->val3_1}}</td>
                    <td style="border:1px solid #aaa">{{$user->val3_2}}</td>
                    <td style="border:1px solid #aaa">{{$user->val3_3}}</td>
                    <td style="border:1px solid #aaa">{{$user->val3_4}}</td>
                </tr>
                <tr align="center">
                    <td style="background-color:#ddd;border:1px solid #aaa">Other</td>
                    <td style="border:1px solid #aaa">{{$user->val4_1}}</td>
                    <td style="border:1px solid #aaa">{{$user->val4_2}}</td>
                    <td style="border:1px solid #aaa">{{$user->val4_3}}</td>
                    <td style="border:1px solid #aaa">{{$user->val4_4}}</td>
                </tr>
            </table>
        </div>
        <div class="row">
            How many sections are in the venue? {{$user->section_cnt}}</div>
        <div class="row">
            How many seats are in the student section? {{$user->stu_seat_cnt}}
        </div>
        <div class="row">
            Does the venue have cup holders? @if($user->is_holder == 1) Yes @else No @endif &nbsp;&nbsp;&nbsp;&nbsp; If yes, how many? {{$user->holder_cnt}}
        </div>
        <div class="row">
            Where are the cup holders? (on the arm rest, back of the chair, etc.) {{$user->holder_pos}}
        </div>
        <div class="row">
            What is the width of the armrests? {{$user->arm_width}}
        </div>
        <div class="row">
            Are the armrests padded, or plastic? {{$user->arm_kind}}
        </div>
        <div class="row">
            Does your venue have fan accessible WiFi? @if($user->is_wifi == 1) Yes @else No @endif
        </div>
        <div class="row">
            During an event how would you rate your WiFi performance? @if($user->performance == 1) Very Poor @elseif($user->performance == 2) Poor @elseif($user->performance == 3) Average @elseif($user->performance == 4) Great @elseif($user->performance == 5) Excellent @endif
        </div>
        <div class="row">
            Rate your cellular service in your venue during events, 1-10. (1 being no service – 10 being able to send pictures). {{$user->rate}}
        </div>
        <div class="row">
            Anything else about the venue you would like us to be aware of? {{$user->others}}
        </div>
        <div class="row">
            Name: {{$user->name1}}, Number: {{$user->number1}}, Email: {{$user->email1}} 
        </div>
        <div class="row">
            Name: {{$user->name2}}, Number: {{$user->number2}}, Email: {{$user->email2}} 
        </div> 
        <div class="row" style="margin-left: 30px">
            <a href="{{ url()->previous() }}" class="btn btn-primary btn-success">Back</a>
    </div><!-- /.row -->
</div>
@endsection