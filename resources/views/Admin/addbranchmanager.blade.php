<title>Admin|AddBranchManagers</title>
@extends('Admin.layout')
@section('admin')
<div class="lBorder" >
 <div class="academics">Add Branch Manager</div>

</div>

<div align="center">
    Branches
    <table>
        <tr style="background-color:black;">
        <th style="padding:10px">Branch name</th>
        <th>Branch Manager</th>
        </tr>


        @foreach($manager as $m)
        <tr align="center">

        <td>{{$m->name}}</td>
        <td>{{$m->branch_manager}}</td>
        
       
        </tr>
        @endforeach
        </table>

</div>

{{Session()->get('registration')}}
<form action="{{ route('admin.addbranchmanagersubmit') }}" method="POST">
{{@csrf_field()}}
    <input type="text" size="28" placeholder="Enter the Branch Name" name="branch">
    @error('branch')
    <span>{{$message}}</span>
    @enderror
    <br>
    <input type="text" size="28" placeholder="Enter the Branch Manager's Name" name="bmanager">
    @error('bmanager')
    <span>{{$message}}</span>
    @enderror
    <br><input type="submit" name="Create" class="create" >
</form>  


@endsection