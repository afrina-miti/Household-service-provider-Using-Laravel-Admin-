
<title>Admin|Home</title>
@extends('Admin.layout')

@section('admin')


<div class="lBorder" >
 <div class="academics">Home Page<div class="right" >
  
  <span class="fa-stack fa-1x bl" data-count={{json_encode($counts[0])+json_encode($counts[1])+json_encode($counts[2])+json_encode($counts[3])+json_encode($counts[4])}}><i class="fa fa-circle fa-stack-2x"></i> <i class="fa fa-bell fa-stack-1x fa-inverse"></i></i></span></div></div>
</div>

<div id="element1">
<div class="cen" >

<p class="solid"><a href="#"> <td> <a href="{{route('admin.adminrequest')}}"><i class="fa fa-check" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></i> Admin Requests</a></p>
  <p class="solid"><a href="#"> <td> <a href="{{route('admin.managerrequest')}}"><i class="fa fa-check" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></i> Manager Requests</a></p>
  <p class="solid"><a href="#"> <td> <a href="{{route('admin.staffrequest')}}"><i class="fa fa-check" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></i> Staff Requests</a></p>
  <p class="solid"><a href="#"> <td> <a href="{{route('admin.leaveapplication')}}"><i class="fa fa-envelope" aria-hidden="true"></i> Leave Applications</a></p>
  <p class="solid"><a href="#"> <td> <a href="{{route('admin.branches')}}"><i class="fa fa-building-o" aria-hidden="true"></i> Create Branches</a></p>
  <p class="solid"><a href="#"> <td> <a href="{{route('admin.setsalary')}}"><i class="fa fa-money" aria-hidden="true"></i> Set Salary</a></p>
  <p class="solid"><a href="#"> <td> <a href="{{route('admin.addbranchmanager')}}"><i class="fa fa-group" aria-hidden="true"></i> Add Branch Managers</a></p>
  <p class="solid"><a href="#"> <td> <a href="{{route('admin.transferapplications')}}"><i class="fa fa-envelope" aria-hidden="true"></i> Transfer Applications</a></p>
  <p class="solid"><a href="#"> <td> <a href="{{route('admin.bancustomer')}}"><i class="fa fa-ban" aria-hidden="true"></i> Ban Customer</a></p>
  </div>
  </div>
 <br><br><br><br><br><br><br><br>
  <div class="map_canvas">
  <canvas id="myChart" style="width:100%;max-width:700px "></canvas>

<script>
var xValues = ["Managers' Requests", "Admins' Requests", "Staffs' Requests", "Leave Applications", "Transfer Applications"];
var yValues = {{json_encode($counts);}}
var barColors = ["red", "green","blue","orange","brown"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "All Pending Requests"
    }
  }
});
</script> 
@endsection

      

