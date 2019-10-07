<?php 
     include("db_con.php");
       //login
    if(isset($_POST['submit']))
	{
		$user = $_POST['name'];
		$passw = $_POST['pass'];
		
		if($user =="" && $passw ==""){ echo " Fill all the fields please.";}
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
				if($_SESSION['adname'] != 'atangana'){ echo "you don't have right to access"; header('location:index1.php'); }
				else{
			        echo $_SESSION['adname']." you have successfully logs in.";  //header('location:index1.php');
				}
			//if(isset($_SESSION['login'])){ echo $_SESSION['adname']." you have successfully logs in."; }
		}
	}
	}	
?>
<html>
<head>
	<title>dataInterface</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/landing.css">
	<link rel="stylesheet" type="text/css" href="css/default.css">
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
			BCHS NKWEN <br>
			Baptist Comprehensive High School (BCHS) <br> Nkwen
		</strong></p>
		</div>
			<!-- main middle content -->
		
		<!-- right aside here -->
		<div class="col-sm-3 col-sm-offset-4">
			<img  class="img-responsive" src="images/logo.png">
		</div>
		<hr>
		<h2 class="grey text-center"><strong>DataBase Management <br> System for The <br>Registraiton of Students</strong></h2>
		<div class=" text-center">
			<a href="login_hod.php"><button type="submit" class="b btn btn-default">Admin Panel</button ></a>
			<a href="selectdept.php"><button type="submit" class="b btn btn-default">register new student</button></a>
			<a href="2_viewdatabaseInterface.php"><button type="submit" class="b btn btn-default" name="stat">statistics</button></a>

		</div>
		<br>
			<div  id="formwrapper">
				
			</div>
			<br>
			<br>
			<div class="col-sm-12 whitebar"> this is jus for space below</div>
		</div>
	</div>
	
	
	<div class="col-md-3"></div>
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>