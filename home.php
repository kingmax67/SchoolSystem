
<?php
	if(!isset($_REQUEST['school'])){
		session_start();
		include('index.php');
		}
	else{
		$i = $_REQUEST['school'];
		switch($i){
			case 'edit_ad': include('registration_form.php'); break;
			case 'edit_sd': include('edit_student.php'); break;
			case 'edit_de': include('1_Admin_panel_interface_after_login.php'); break;
			default:
			echo "<br /><br /><br /><br /><br /><br /><center><font face='' size='5' color='red'><strong>404<br /><br />THE PAGE ".strtoupper($i)." IS NOT FOUND</font>";
			break;
		}
	}
?>

