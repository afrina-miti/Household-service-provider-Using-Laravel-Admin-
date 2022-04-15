<title>Admin|changepassword</title>
@extends('Admin.layout')
@section('admin')



<div class="lBorder" >
 <div class="academics">Change Password</div>
</div>
{{Session()->get('registration')}}
<center>
<form action="{{route('admin.changepasswordsubmit')}}" method="post">
{{@csrf_field()}}

<br><input type="password" placeholder="Current Password" name="cpass">
 @error('cpass')
 <span>{{$message}}</span>
 @enderror      
       
       
<br><input type="password" placeholder="New Password" name="npass">
@error('npass')
<span>{{$message}}</span>
@enderror      
            
       
       

<br><input type="password" placeholder="Confirm New Password" name="conpass">
@error('conpass')
<span>{{$message}}</span>
@enderror      
   
       


<br><input type="submit" class=" change" value="Change Password">
                         
                           
</form>
<center>
</body>
<html>

@endsection
