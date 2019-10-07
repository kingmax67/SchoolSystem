<?php 
     include("db_con.php");
       $sql = "select * from department ";
			$qry = $con->prepare($sql);
			$qry->execute();
			
			$fetch = $qry->fetchAll();
			
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
<?php
			foreach($fetch as $get)
			{?>

			 <a href="register_student.php?flag=<?php echo $get["DEPT_ID"]; ?>"><button type="submit" class="b btn btn-default"><?php echo $get["DEPT_NAME"];?></button ></a>
				
	<?php		}
?>
			

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