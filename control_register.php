<?php 
 include('db_con.php');
 session_start();
    
	
	 
 //sending sms via gsm modem
	  function sendSMS( $tel, $sms )
    {
        $port = "COM8";	
		@exec('mode '.$port.': baud=19200 data=8 stop=1 parity=n xon=on');
        if (@$fh=fopen($port,"r+"))
        {
            fputs($fh,"AT\n\r");
            sleep(1);
            fputs($fh,"AT+CMGF=1\r");
            sleep(1);
            fputs($fh,"AT+CMGS=\"$tel\"\r"); 	
            sleep(1);
            fputs($fh,"$sms\032");
            sleep(1);
            fclose($fh);
           // echo "ok";
            return true;
        
            @fclose($modem);
        }
        else 
        {
            echo "Port error  ";
        }
        return false;
    }
 //collecting data from the interface
 if(isset($_REQUEST['save'])){
	 $name = ucfirst($_POST['name']);
	 $dob = $_POST['dob'];
	 $pob = $_POST['pob'];
	 $mat = $_POST['mat'];
	 $sex = $_POST['sex'];
	 $ro = $_POST['roo'];
	 $opt = $_POST['opt'];
	 $lev = $_POST['level'];
	 //$date = $_POST['date'];
	 $addr = $_POST['addr'];
	 $tel = $_POST['tel'];
	 $email = strtolower($_POST['email']);
	 $image = $_POST['image'];
	 
	 try{
			$sql = "INSERT into student values('$mat','$name',,'$sex','$dob','$pob','$ro','$lev',current_timestamp,'$addr','$tel','$email','$image')";
			$q = $con->prepare($sql);
			$q->execute();
			if($q){ echo "<div class='valid_box' ><center><h2>inserted successfully and </h2></center></div>"."  "; 
	           if($tel != "")
				{
					try{
						if(sendSMS($tel,$ms)){
							echo "<div class='valid_box' ><center><h2>SMS has been sent</h2></center></div>"; 
						}
					}catch(Exception $e){
						echo $e->getMessage();
					}
			    }
			}
			if(!$sql){ echo "<div class='error_box' ><center><h2>unable to insert.</h2></center></div>"; }
		}catch(PDOException $e){
		  echo $e->getMessage();
		}
 }
?>