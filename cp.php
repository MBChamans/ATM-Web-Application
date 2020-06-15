<?php
 session_start();
    $accno = $_SESSION['u_accountno'];
    $newpin = $_POST['NEW'];
    $currentpin = $_POST['CURRENT'];
    $confirmpin = $_POST['CONFIRM'];
    $verify=$_SESSION['u_pin'];

    if (!empty($newpin) || !empty($currentpin) || !empty($confirmpin)){
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
			$SELECT = "SELECT * From customers Where accountno='$accno'";
            $result =mysqli_query($conn,$SELECT);
            $resultCheck= mysqli_num_rows($result);
            if($resultCheck<1) {
                                echo '<script type="text/javascript"> alert("Unexpected Error")
                                window.history.go(-1);
                                </script>';
                                exit();
            }
            else{
                $row = mysqli_fetch_assoc($result);
                $bank = "SELECT bank from customers where accountno='$accno'";
                if($currentpin==$verify){
                    if($newpin==$confirmpin){
                        $UPDATE = "UPDATE $bank SET pin='$confirmpin' WHERE accountno='$accno'";
                    
                        mysqli_query($conn,$UPDATE);
                        echo '<script type="text/javascript"> alert("PIN Changed Successfully!")
                            
                            </script>';
                            window.header("Location:pinsuccess.php?changepin=success");
                            exit();
                    }
                    else{
                        echo '<script type="text/javascript"> alert("New PIN and Confirm PIN do not match!")</script>';
                            window.header("Location:changepin.php?changepin=error");
                            exit();
                    }                
                }
                else{
                    echo '<script type="text/javascript"> alert("Current PIN does not match!")</script>';
                        window.header("Location:changepin.php?changepin=error");
                        exit();
            
                }
			$conn->close();
			}
        }
    }
else {
	echo '<script type="text/javascript"> alert("All Fields are required")</script>';
	die();
}
    
?>