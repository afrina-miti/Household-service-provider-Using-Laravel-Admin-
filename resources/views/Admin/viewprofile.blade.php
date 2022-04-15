<title>Admin|viewprofile</title>
@extends('Admin.layout')
@section('admin')
 
 <div class="lBorder" >
 <div class="academics"> {{Session()->get('username')}} profile</div>
</div>
 






<center><i class="fa fa-user" aria-hidden="true"> <b>Profile</b></i><br><table><tr><td>Username </td><td>{{$admin->username}}</td></tr><br>
<tr><td>Email </td><td>{{$admin->email}}</td></tr> 
<tr><td>Phone </td><td>{{$admin->phone}}</td></tr>  
<tr><td>Date Of Birth </td><td>{{$admin->dob}}</td></tr>   
<tr><td>Gender </td><td>{{$admin->gender}}</td></tr>
<tr><td>User Type</td><td>{{$admin->usertype}}</td></tr></table></center>
       
    








@endsection
    
    


