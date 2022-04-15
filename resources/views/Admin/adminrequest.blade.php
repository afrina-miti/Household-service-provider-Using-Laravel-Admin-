<title>Admin|AdminRequest</title>
@extends('Admin.layout')
@section('admin')
<div class="lBorder" >
 <div class="academics">Admin Request</div>

</div>

<div align="center">
    Admins' Request
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


        @foreach($admin as $a)
        <tr align="center">

        <td>{{$a->username}}</td>
        <td>{{$a->email}}</td>
        <td>{{$a->phone}}</td>
        <td>{{$a->dob}}</td>
        <td>{{$a->gender}}</td>
        <td>{{$a->usertype}}</td>
        <td>{{$a->active_status}}</td>
        <td><a class="btn btn-success" href="{{route('admin.acceptadmin',$a->username)}}">Accept</a></td>
        <td><a class="btn btn-danger" href="{{route('admin.rejectadmin',$a->username)}}">Rejcect</a></td>
        </tr>
        @endforeach
        </table>
        {{Session()->get('registration')}}
</div>


@endsection