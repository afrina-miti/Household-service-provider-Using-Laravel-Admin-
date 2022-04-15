<title>Admin|ManagerRequest</title>
@extends('Admin.layout')
@section('admin')
<div class="lBorder" >
 <div class="academics">Manager Request</div>

</div>

<div align="center">
    Managers' Request
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


        @foreach($manager as $m)
        <tr align="center">

        <td>{{$m->username}}</td>
        <td>{{$m->email}}</td>
        <td>{{$m->phone}}</td>
        <td>{{$m->dob}}</td>
        <td>{{$m->gender}}</td>
        <td>{{$m->usertype}}</td>
        <td>{{$m->active_status}}</td>
        <td><a class="btn btn-success" href="{{route('admin.acceptmanager',$m->username)}}">Accept</a></td>
        <td><a class="btn btn-danger" href="{{route('admin.rejectmanager',$m->username)}}">Rejcect</a></td>
        </tr>
        @endforeach
        </table>
        {{Session()->get('registration')}}
</div>


@endsection