
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('admin.css')}}">

</head>

<body>

<div class="sticky">
<div class="topnav">
<center><h1 id="bb"> Amader Sheba</h1> </center>
  <a href="#"> <td><a href="{{route('admin.home')}}"><i class="fa fa-home" aria-hidden="true"> Home</i></a></td></a>
  <a href="#"><a href="{{route('admin.viewprofile')}}"><i class="fa fa-user" aria-hidden="true"> View Profile</i></a>
  <a href="#"><a href="{{route('admin.changepassword')}}"><i class="fa fa-key" aria-hidden="true"> Change Password</i></a>
  <b><a href="{{route('logout')}}"><i class="fa fa-sign-out "><b>Logout</i></b></a><b>

 </div> </div>
<div class="header">
<h2>Welcome {{Session()->get('username')}}</h2>

  </div>
  

 

</body>


</html>



      
  

@yield('admin')

<center>Copy Right @copy amader.sheba </center>