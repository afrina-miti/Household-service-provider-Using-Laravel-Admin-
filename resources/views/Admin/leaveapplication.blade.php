<title>Admin|LeaveApplication</title>
@extends('Admin.layout')
@section('admin')
<div class="lBorder" >
 <div class="academics">Leave Applications</div>

</div>

<div align="center">
    Leave Applications
    <table>
        <tr style="background-color:black;">
        <th style="padding:10px">Username</th>
        <th>Status</th>
        <th>Accepted</th>
        <th>Rejecected</th>
        </tr>


        @foreach($manager as $m)
        <tr align="center">

        <td>{{$m->username}}</td>
        <td>{{$m->status}}</td>
        <td><a class="btn btn-success" href="{{route('admin.acceptleaveapplication',$m->username)}}">Accept</a></td>
        <td><a class="btn btn-danger" href="{{route('admin.rejectleaveapplication',$m->username)}}">Rejcect</a></td>
        </tr>
        @endforeach
        </table>
        {{Session()->get('registration')}}
</div>


@endsection