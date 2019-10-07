<!DOCTYPE html>
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
			Baptist Comprehensive High School (BCHS) <br> Nkwen
		</strong></p>
		</div>
			<!-- main middle content -->
		
		<!-- right aside here -->
		<div class="col-sm-3 col-sm-offset-4">
			<img  class="img-responsive" src="images/logo.png">
		</div>
		<hr>
		<h2 class="grey text-center"><strong>student Record</strong></h2>
		<hr>
		
			<!--********* YOU CAN US THIS id="records" TO INJECT THE STUDENT RECORDS FROM THE DB INTO THE PAGE******** -->
			  <div class="col-sm-12 col-sm-offset " id="records" > 
				<p>
				<div class="table">
		<table class="datatable" align="center" style="font-family:time new roman">
			<thead class="table">
				<tr>
					<th class="table-bordered" >No</th>
					<th class="table-bordered">MATRICULE</th>
					<th class="table-bordered" align="center">NAME</th>
					<th class="table-bordered" align="center">PICTURE</th>
				</tr>
			</thead>
			<tbody>
					<?php
                        include("db_con.php");
       //login
							try{
								$sql = "select * from student";
								$qry = $con->prepare($sql);
								$qry->execute();
								
								$fetch = $qry->fetchAll();
								if(!$fetch){ echo "no student fount.";}
								$i = 0;
								foreach($fetch as $get)
								{
									$i++;
									/* echo $_SESSION['mat'] = $get['MATRICULE'];
									echo $_SESSION['adname'] = $get['STUD_NAME']; */
									?>
									<tr><td class="table-bordered"><?php  echo $i; ?></td>
									<td class="table-bordered"><?php echo  $get['MATRICULE']; ?> </td>
									<td class="table-bordered"><?php echo  $get['STUD_NAME']; ?></td>
									<td class="table-bordered"><img src="photos/<?php echo $get['IMAGE']; ?> " height="40" width="50"></td>
									<?php
							    }
							}catch(Exeception $e){
								echo $e->getMessage();
							}
						
						      
										?>
										</tr>
										</tbody>
									</table>
					<hr>
					<?php 
					session_start();
					          if(isset($_POST['validate'])){
                               $_SESSION['dept'] = $_POST['dept'];
							   $_SESSION['opt'] = $_POST['opt'];
							   $_SESSION['lev'] = $_POST['lev'];
							   if($_SESSION['dept'] == "" && $_SESSION['opt'] == "" and $_SESSION['lev'] == ""){
								   echo "<center><font color='red'><i>make your selection before validating.</i></font></center>";
							   }
							   else{
								   $sle = "select STUD_NAME, MATRICULE from option, department, student where student.OPT_ID = option.OPT_ID and option.DEPT_ID = department.DEPT_ID and student.LEVEL = '$lev' and department.DEPT_NAME = '$dept' and option.OPT_NAME = '$opt'";
								 $so = $con->prepare($sle);
								 $so->execute();
								 $fetch = $so->fetchAll();
								 $i = 0;
								 foreach($fetch as $do)
								 {
									$_SESSION['name'] = $do['STUD_NAME']; 
									$_SESSION['mat'] = $do['MATRICULE']; 
								 }
									 header('location: printstudentlist.php');
							   }
							   
					          }
							  if(isset($_POST['back'])){ header('location: index1.php'); }
					?>
					
						<form action="" method="POST"><center>
	</p>
				<select id="op" name="dept" class="form-control">
				<option value="">Select the department</option>
			 <?php
			$sql = "select * from department";
			$qry = $con->prepare($sql);
			$qry->execute();
			
			$fetch = $qry->fetchAll();
			if(!$fetch){ echo "user not found.";}
			foreach($fetch as $get)
			{ 
			
			?>
			<p>  
			<option value="<?php echo $get['DEPT_NAME']; ?>"><?php echo $get['DEPT_NAME']; ?></option>
			<?php 
			} ?>
			</select></p> 
	<p>
				<select id="op" name="opt" class="form-control">
				<option value="">Select the option</option>
			 <?php
			// $id = $_SESSION['id'];
			$sq = "SELECT * FROM `option`";
			$qry = $con->prepare($sq);
			$qry->execute();
			
			$fetch = $qry->fetchAll();
			if(!$fetch){ echo "user not found.";}
			foreach($fetch as $get)
			{ 
			
			?>
			<p>  
			<option value="<?php echo $get['OPT_NAME']; ?>"><?php echo $get['OPT_NAME']; ?></option>
			<?php 
			} ?>
			</select></p><p>
	
	<select id="op" name="lev" class="form-control">
	<option value="">Select the level</option>
	<option value="100">100</option>
	<option value="200">200</option>
	<option value="300">300</option>
	<option value="400">400</option>
	<option value="500">500</option>
	</select><br><center>
	<button type="submit" class="b btn btn-default" name="back" >Back</button>
	<button type="submit" class="b btn btn-default" name="validate" >Validate</button></center></center></form>
				</p>

			 </div>
			 
			  
		</div>
	</div>

	<div class="col-md-3"></div>
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>