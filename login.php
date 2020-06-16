<?php 

session_start();

$cardno = $_POST['cardno'];
$pin = $_POST['pin'];

if (!empty($cardno) || !empty($pin)){
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "atmwebapp";
    //create connection
    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbname);

		if(mysqli_connect_error()){
			die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
		}
		else{
			     $SELECT = "SELECT * From customers Where cardno='$cardno'";
                 $result = mysqli_query($conn,$SELECT);
                 $resultCheck= mysqli_num_rows($result);
				 if($resultCheck <1) {
                                echo '<script type="text/javascript"> alert("One or more login details are incorrect")
                        window.history.go(-1);
                        </script>';
                        exit();

            	}
            	else{
            	/*$result = $conn->query($SELECT);
      			if ($result->num_rows > 0) {
        		// output data of each row
        		while($row = $result->fetch_assoc()) {
          		$password_hash = $row['pwd'];
          		if (password_verify("$lpwd", "$password_hash")) {
          			echo "success";
           		 // echo statusMessage(200, "success");
           		 /*$res = [
              	'login' => TRUE
           		 ];
          		} else {
          			echo "false";
          		  /* echo statusMessage(203, "nikal");
           		 $res = [
              	'login' => FALSE
            	];
          		}
          		$row['password'];
        		}*/
            		$row = mysqli_fetch_assoc($result);
            		$verifypin=$row['pin'];
            		/*echo $passwordhash;
            		echo $lpwd;
            		echo password_verify($lpwd, $row["pwd"]);\
            		*/

            		/*if(password_verify($lpwd,$passwordhash)){
            			echo"success";
            		}
            		else
            		{
            			echo"fail";
            		}*/
            		

            		if (strcmp($pin ,$verifypin)==0){
            		$_SESSION['u_cardno']=$row['cardno'];
            		$_SESSION['u_pin']=$row['pin'];
            		$_SESSION['u_accountno']=$row['accountno'];
            		$_SESSION['u_fname']=$row['fn'];
            		$_SESSION['u_balance']=$row['balance'];
                $_SESSION['u_lname']=$row['ln'];

                $_SESSION['start'] = time();

                // taking now logged in time
                $_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ;

            	 	header("Location:index.php?login=success");

                


                    exit();
            	 	}
            	 else{
                window.header("Location:home.php?login=error");
            	 	echo '<script type="text/javascript"> alert("One or more login details are incorrect.Please login agian to continue")'; 
                    exit();
            	 	}
            	}
                
                }
			$conn->close();
			

}
else {
	echo"all fields required";
	die();
}
?>