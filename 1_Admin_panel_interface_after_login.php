<?php
   include("db_con.php");
   session_start();
	// Check if delete button active, start this 

	if(isset($_POST['delete']))
	{
		 $checkbox = $_POST['check'];

	   $sql = "DELETE FROM student WHERE MATRICULE='$checkbox'";
	   
	$q = $con->prepare($sql);
	$result = $q->execute();
	$_SESSION['re'] = $result;
	
	// if successful redirect to delete_multiple.php 
	if(isset($_SESSION['re'])){
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=1_Admin_panel_interface_after_login.php\">";
	}
	 }
	 if(isset($_POST['add'])){
		 header('location: registration_formed.php');
	 }
     else   if(isset($_POST['edit']))
	{
		$_SESSION['box'] = $_POST['check'];
		$mat = $_SESSION['box'];
		$sql = "select * from student where MATRICULE ='$mat'";	
		$qry = $con->prepare($sql);
		$qry->execute();
		
		$fett = $qry->fetchAll();
		if(!$fett){ $_SESSION['err'] = "matricule not found.";  }else{
		foreach($fett as $fet)
		{
			$_SESSION['ma'] = $fet['MATRICULE'];
			$_SESSION['sn'] = $fet['STUD_NAME'];
			$_SESSION['ge'] = $fet['GENDER'];
			$_SESSION['do'] = $fet['DATE_OF_BIRTH'];
			$_SESSION['po'] = $fet['PLACE_OF_BIRTH'];
			$_SESSION['ro'] = $fet['REGION_OF_ORIGIN'];
			$_SESSION['le'] = $fet['LEVEL'];
			$_SESSION['ad'] = $fet['ADDRESS'];
			$_SESSION['ph'] = $fet['PHONE'];
			$_SESSION['em'] = $fet['EMAIL'];
			$_SESSION['id'] = $fet['OPT_ID'];
		}
		header('location: edit_student.php');
		}
	} 
	if(isset($_POST['back'])){
		 header('location: login_hod.php');
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
	<div class="container col-md-7 ">
	<!-- task bars -->
		<div class="row purpleBg" >
			<p class="title text-center">Database management System</p>
		</div>
		
		<div class="row">
		<!-- left aside -->
		<div class="col-sm-4">
		<p id="heading" class="text-center"><strong>
			BCHS NKWEN <br>
			Baptist Comprehensive High School (BCHS)<br> Nkwen
		</strong></p>
		</div>
			<!-- main middle content -->
		
		<!-- right aside here -->
		<div class="col-sm-3 col-sm-offset-4">
			<img  class="img-responsive" src="images/logo.png">
		</div>
		<hr>
		<h2 class="grey text-center"><strong>Student Records</strong></h2>
		<hr>
		<form action="" method="POST">
           <table class="table-condensed" align="center">
			<thead>
				<tr style="font-family: serif">
					<th>Check</th>
					<th>Name</th>
					<th>Matricule</th>
					<th>Edit</th>
					<th>Add</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
        <?php 
		    
			 
			 try{
								
             $sle = "select OPT_NAME, DEPT_NAME, STUD_NAME, MATRICULE from option, department, student where student.OPT_ID = option.OPT_ID and option.OPT_ID = department.DEPT_ID";
			 $so = $con->prepare($sle);
			 $so->execute();
			 $fetch = $so->fetchAll();
			 
	         foreach($fetch as $do)
			 {
        ?>
		<tr style="font-family: Time New Roman"><td align="center"><input type="checkbox" value="<?php echo $do['MATRICULE']; ?>" name="check" ></td>
			<td><?php echo ucwords($do['STUD_NAME']); ?></td>
			<td align="center"><?php echo $do['MATRICULE']; ?></td>
			    
				<p>
					<td><button class="btn btn-success" type="submit" name="edit" >Edit</button></td>
					<td><button class="btn btn-primary" type="submit" name="add">Add</button></td>
					<td><button class="btn btn-danger" type="submit" name="delete">Delete</button></td></tr>
					<?php 
		}}
		catch(Exeception $e){
								echo $e->getMessage();
							}
		?>	
					<hr>
				</p>
				</tbody>
                </table></form><br><br>
			  
		</div>
		<form action="" method="POST">
	       <center>
			 <p >
			 	<button class="btn btn-default" type="submit" name="back">Back</button>
			 </p> </center>
			 </form>
	</div>
	<div class="col-md-3"></div>
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>
<?php


?>