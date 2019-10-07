<?php 
 include('db_con.php');
  $flag=$_GET['flag'];
 session_start();
    
 if(isset($_REQUEST['update'])){
	 $name = ucfirst($_POST['name']);
	 $dob = $_POST['dob'];
	 $pob = $_POST['pob'];
	 $mat = strtoupper($_POST['mat']);
	 $sex = $_POST['sex'];
	 $ro = $_POST['roo'];
	 $opt = $_POST['opt'];
	 $lev = $_POST['level'];
	 //$date = $_POST['date'];
	 $addr = $_POST['addr'];
	 $tel = $_POST['tel'];
	 $email = strtolower($_POST['email']);
	 
	 try{
			$sql = "INSERT INTO student (MATRICULE, STUD_NAME, GENDER, DATE_OF_BIRTH, PLACE_OF_BIRTH, REGION_OF_ORIGIN, LEVEL, DATE_OF_ADMISSION, ADDRESS, PHONE, EMAIL) VALUES('$mat','$name','$sex','$dob','$pob','$ro','$lev',current_timestamp,'$addr','$tel','$email')";
			$q = $con->prepare($sql);
			$q->execute();
			if($q){ echo "<div class='valid_box' ><center><h2>Updated successfully.</h2></center></div>"; }
			if(!$q){ echo "<div class='error_box' ><center><h2>unable to update.</h2></center></div>"; }
		}catch(PDOException $e){
		  echo $e->getMessage();
		}
 }
if(isset($_POST['back'])){
		 header('location: 1_Admin_panel_interface_after_login.php');
	 }

?>
<script type="text/javascript">
 setTimeout(function(){
	  $('.valid_box').hide(200); 
 },5000);
 setTimeout(function(){
	  $('.error_box').hide(200); 
 },5000);
</script>
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
		<h2 class="grey text-center"><strong>Register New Student</strong></h2>
		
			 <div class="col-sm-12">
				 <form method="POST" action="">
			 <p><label>Full name :</label><input type="text" name="name" value="" class="form-control">
			 </p>
			 <p><label>Date Of Birth :</label><input type="text" value="" name="dob" class="form-control">
			 </p>
			 <p><label>Place of Birth :</label><input type="text" value="" name="pob" class="form-control">
			 </p>
			 <p><label>Matricule :</label><input type="text" name="mat" value="" class="form-control">
			 </p>
			 <p><label>Sex :</label><input type="text" name="sex" value="" class="form-control">
			 </p>
			 <p><label>Region of Origin:</label><input type="text" name="roo" value="" class="form-control">
			
			 </p><font face="Time new roman" color="green">Select the option</font>
				<select id="op" name="opt" class="form-control">
			 <?php
			 
			$sq = "select OPT_NAME from option where DEPT_ID = '$flag'";
			$qry = $con->prepare($sq);
			$qry->execute();
			
			$fetch = $qry->fetchAll();
			
			foreach($fetch as $get)
			{ 
			
			?>
			<p>  
			<option value="<?php echo $get['OPT_NAME']; ?>"><?php echo $get['OPT_NAME']; ?></option>
			<?php 
			} ?>
			</select>
			 <p><label>Level:</label><input type="text" value="" name="level" class="form-control" >
			 </p>
			 <p><label>Address :</label><input type="text" value="" name="addr" class="form-control" >
			 </p>
			 <p><label>Phone Number :</label><input type="tel" value="" name="tel" class="form-control" >
			 </p>
			 <p><label>Email :</label><input type="email" name="email" value="" class="form-control">
			 </p>
			 <p><label>Image :</label><input type="file" name="image" class="form-control">
			 </p>
			 <center>
			 <p >
			 	<button class="btn btn-default" type="submit" name="back">Back</button>
			 	<button class=" btn btn-default" type="submit" name="update">Save</button>
			 </p> </center>
				 </form>
			 </div>
			 
			  
		</div>
	</div>
	
	
	<div class="col-md-3"></div>
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>