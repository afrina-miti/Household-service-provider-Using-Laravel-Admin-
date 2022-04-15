<title>Admin|TransferApplication</title>
@extends('Admin.layout')
@section('admin')
<div class="lBorder" >
 <div class="academics">Tranfer Applications</div>

</div>

<div align="center">
Transfer Applications
    <table style="width: 20%">

        <tr style="background-color:black;">

        <th style="padding:10px">Username</th>
       
        <th>Status</th>
        <th>Current Branch</th>
        <th>Desired Branch</th>
        <th>Accepted</th>
        <th>Rejecected</th>
        </tr>


        @foreach($manager as $m)
        <tr align="center">
        <td>{{$m->username}}</td>
        <td>{{$m->status}}</td>
        <td>{{$m->curr}}</td>
        <td>{{$m->desire}}</td>
        <td><a class="btn btn-success" href="{{route('admin.accepttransferapplication',$m->username)}}">Accept</a></td>
        <td><a class="btn btn-danger" href="{{route('admin.rejecttransferapplication',$m->username)}}">Rejcect</a></td>
        </tr>
        @endforeach
        </table>
        
        {{Session()->get('registration')}}
</div>


@endsection
