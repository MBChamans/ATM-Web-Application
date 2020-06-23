<?php
 session_start();
    $cardno = $_SESSION['u_cardno'];
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
			$SELECT = "SELECT * From customers Where cardno='$cardno'";
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
                $bank = "SELECT bank from customers where cardno='$cardno'";
                $b=mysqli_query($conn,$bank);
                $ban=mysqli_fetch_array($b,MYSQLI_ASSOC);
                $ba=$ban['bank'];
                //$row1 = mysqli_fetch_assoc($b);
                //echo "<script>console.log('Debug Objects: " . $b . "' );</script>";
                //echo '<script>alert('.$bank.')</script>'; 
                //echo "<p>{$b}</p>";
                //console.log('Done');

                if($currentpin==$verify){
                    if($newpin==$confirmpin){

                        $UPDATE = "UPDATE $ba SET pin='$confirmpin' WHERE cardno='$cardno'";

                        //$query="UPDATE '".$bank."' SET pin='$confirmpin' WHERE accountno='$accno'";
                        //$conn ->query("$query");
                    
                        mysqli_query($conn,$UPDATE);
                        echo '<script type="text/javascript"> alert("PIN Changed Successfully!")
                            
                            </script>';
                            window.header("Location:pinsuccess.php?changepin=success");
                            exit();
                    }
                    else{
                        echo '<script type="text/javascript"> alert("New PIN and Confirm PIN do not match!")</script>';
                            window.header("Location:pinfail.php?changepin=error(New PIN and Confirm PIN do not match!)");
                            exit();
                    }                
                }
                else{
                    echo '<script type="text/javascript"> alert("Current PIN does not match!")</script>';
                        window.header("Location:pinfail.php?changepin=error(Current PIN does not match!)");
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