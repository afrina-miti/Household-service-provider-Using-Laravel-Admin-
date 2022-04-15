<title>Admin|BanCustomer</title>
@extends('Admin.layout')
@section('admin')
<div class="lBorder" >
 <div class="academics">Ban Customer</div>

</div>

<div align="center">
Customers
    <table style="width: 20%">

        <tr style="background-color:black;">

        <th style="padding:10px">Username</th>
       
        <th>Email</th>
        <th>Phone</th>
        <th>Date Of Birth</th>
        <th>Gender</th>
        <th>Ban Customer</th>
        </tr>


        @foreach($customer as $c)
        <tr align="center">
        <td>{{$c->username}}</td>
        <td>{{$c->email}}</td>
        <td>{{$c->phone}}</td>
        <td>{{$c->dob}}</td>
        <td>{{$c->gender}}</td>
        <td><a class="btn btn-danger" href="{{route('admin.acceptbancustomer',$c->username)}}">Ban</a></td>
        </tr>
        @endforeach
        </table>
       
        <form action="{{ route('admin.bancustomersubmit') }}" method="POST">
        {{@csrf_field()}}
        <input type="text" size="28" placeholder="Enter the Customer Username" name="customer">
         <br>@error('customer')
         <span>{{$message}}</span>
         @enderror
         {{Session()->get('registration')}}
        <br><input type="submit" name="Create" class="btn btn-danger"value="Ban" >
         </form>  
        
</div>


@endsection
