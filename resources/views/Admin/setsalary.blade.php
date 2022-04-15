<title>Admin|SetSalary</title>
@extends('Admin.layout')
@section('admin')
<div class="lBorder" >
 <div class="academics">Set Salary</div>

</div>

<div align="center">
Manager's Salary
    <table style="width: 20%">
        <tr style="background-color:black;">
         <th style="padding:10px">Username</th>
        <th>Salary</th>
        </tr>


        @foreach($manager as $m)
        <tr align="center">

       
        <td>{{$m->username}}</td>
        <td>{{$m->salary}}</td>
        </tr>
        @endforeach
        </table>

</div>
{{Session()->get('registration')}}
<form action="{{ route('admin.submitsalary') }}" method="POST">
{{@csrf_field()}}

    <input type="text" placeholder="Salary" name="salary">
    @error('salary')
    <span>{{$message}}</span>
    @enderror
    <br>
    <input type="text" placeholder="Manger's Name" name="mname">
    @error('mname')
    <span>{{$message}}</span>
    @enderror
    <br><input type="submit" name="Create" class="create" >
</form> 

@endsection
