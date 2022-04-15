<title>Admin|StaffRequest</title>
@extends('Admin.layout')
@section('admin')
<div class="lBorder" >
 <div class="academics">Staff Request</div>

</div>

<div align="center">
    Staff Requests
    <table>
        <tr style="background-color:black;">
        <th style="padding:10px">Username</th>
        <th>email</th>
        <th>Phone Number</th>
        <th>Date Of Birth</th>
        <th>Gender</th>
        <th>User Type</th>
        <th>Active Status</th>
        <th>Accetped</th>
        <th>Rejcected</th>
        </tr>


        @foreach($staff as $s)
        <tr align="center">

        <td>{{$s->username}}</td>
        <td>{{$s->email}}</td>
        <td>{{$s->phone}}</td>
        <td>{{$s->dob}}</td>
        <td>{{$s->gender}}</td>
        <td>{{$s->usertype}}</td>
        <td>{{$s->active_status}}</td>
        <td><a class="btn btn-success" href="{{route('admin.acceptstaff',$s->username)}}">Accept</a></td>
        <td><a class="btn btn-danger" href="{{route('admin.rejectstaff',$s->username)}}">Rejcect</a></td>
        </tr>
        @endforeach
        </table>
        {{Session()->get('registration')}}
</div>


@endsection