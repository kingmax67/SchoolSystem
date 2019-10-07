<?php require_once('db_con.php');
		  session_start();
	  
?>
<?php 
     include("db_con.php");
       //login
    if(isset($_POST['login']))
	{
		$user = $_POST['uname'];
		$passw = $_POST['pass'];
		
		if($user =="" && $passw == ""){ echo " Fill all the fields please.";}
		else{
			$sql = "select * from hod where HOD_NAME='$user' AND ADDRESS='$passw'";
			$qry = $con->prepare($sql);
			$qry->execute();
			
			$fetch = $qry->fetchAll();
			if(!$fetch){ echo "user not found.";}
			foreach($fetch as $get)
			{
				$_SESSION['login'] = "";
				$_SESSION['adname'] = $get['HOD_NAME'];
				$_SESSION['user'] = $get['ADDRESS'];
				
				
				session_write_close();
			    header('location: 1_Admin_panel_interface_after_login.php');
				}
			if(isset($_SESSION['login'])){ echo $_SESSION['adname']." you have successfully logs in."; }
		}
	} 
?>
<html>
<head>
	<title>student_registration</title>
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
	
	<link rel="stylesheet" type="text/css" href="student_registration.css">
</head>
<body>

<div class="col-md-3"></div>
<!-- middle content here -->
	<div class="container col-md-6 ">
	<!-- task bars -->
		<div class="row purpleBg" >
			<p class="title text-center">Database management System</p>
		</div>
		
		<div class="row">
		<!-- left aside -->
		<div class="col-sm-5">
		<p id="heading" class="text-center"><strong>
			BCHS NKWEN<br>
			Baptist Comprehensive High School (BCHS) <br> Nkwen
		</strong></p>
		</div>
			<!-- main middle content -->
		
		<!-- right aside here -->
		<div class="col-sm-3 col-sm-offset-4">
			<img  class="img-responsive" src="images/logo.png">
		</div>
		<hr>
		<h2 class="grey text-center"><strong>HOD Login Form</strong></h2>
		<!-- <div class=" text-center"> -->
			<!-- <a href="adminlogin.html">> --><!-- button type="submit" class="b btn btn-default" onclick="attack()">Admin Panel</button > --><!-- </a> -->
			<!-- <button type="submit" class="b btn btn-default">Register new Student</button>
			<button type="submit" class="b btn btn-default">database</button>

		</div>
		<br>
			<div  id="formwrapper">
				
			</div>
			
			 -->
			 <div class="col-sm-12">
				 <form method="POST" action="">
			 
			 </p><center><font face="Time new roman" color="green">Provide the correct information to login.</font></center>
			 <p><input type="text" name="uname" class="form-control" placeholder="Enetr your username"></p>
			 <p><input type="password" name="pass" class="form-control" placeholder="Enetr your password"></p>	
			<center> <p >
			 	<button class="btn btn-default" type="submit" name="back">Back</button>
			 	<button class=" btn btn-default" type="submit" name="login">Login</button></center>
			 </p>
				 </form>
			 </div>
			 
			  
		</div>
	</div>
	
	
	<div class="col-md-3"></div>
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>
<?php
      
	   if(isset($_POST['back'])){
		  $_SESSION['dep'] = $_POST['dept'];
		 header('location: index1.php');
		//echo $_SESSION['dep'];
	  }
?>