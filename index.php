<?php require_once('db_con.php');
		  session_start();
	  
?>
<?php 
     include("db_con.php");
       //login
    if(isset($_POST['next']))
	{
				
		header('location: login.php');
			
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
			BCHS NKWEN <br>
			Baptist Comprehensive High School(BCHS) <br> Nkwen
		</strong></p>
		</div>
			<!-- main middle content -->
		
		<!-- right aside here -->
		<div class="col-sm-3 col-sm-offset-4">
			<img  class="img-responsive" src="../caleb/calebpic/cal.png">
		</div>
		<hr>
		<h2 class="grey text-center"><strong>WELCOME TO BCHS NKWEN</strong></h2>
	
			 <div class="col-sm-12">
				 <form method="POST" action=""><center>
			 	<button class=" btn btn-default" type="submit" name="next">Next</button></center>
			 </p>
				 </form>
			 </div>
			 
			  
		</div>
	</div>
	
	<div class="col-md-3"></div>
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>