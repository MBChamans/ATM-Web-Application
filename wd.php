<?php
 session_start();
    $accno = $_SESSION['u_accountno'];
    $amount = $_POST['amount'];

    if (!empty($amount)){
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
                $bal ="SELECT balance from customers where accountno='$accno'";
                $b=mysqli_query($conn,$bank);
                $ban=mysqli_fetch_array($b,MYSQLI_ASSOC);
                $ba=$ban['bank'];
                $bal1=mysqli_query($conn,$bal);
                $bal2=mysqli_fetch_array($bal1,MYSQLI_ASSOC);
                $bal3=$bal2['balance'];
                $first="SELECT fn from $ba where accountno='$accno'";
                $first1=mysqli_query($conn,$first);
                $first2=mysqli_fetch_array($first1,MYSQLI_ASSOC);
                $first3=$first2['fn'];
                if($bal3>=$amount){
                		$UPDATE="UPDATE $ba SET balance=($bal3-$amount) WHERE accountno='$accno'";
               			mysqli_query($conn,$UPDATE);
                        echo '<script type="text/javascript"> alert("Withdraw Transaction Successfully!")
                            </script>';
                        window.header("Location:transsuccess.php?withdraw=success");
                        $INSERT="INSERT INTO $first3(`description`, `balance`, `type`, `amount`) VALUES ('ATMW',($bal3-$amount),'debit',$amount)";
                        mysqli_query($conn,$INSERT); 
                            exit();
                }
                else{
                        echo '<script type="text/javascript"> alert("Insufficient Balance")</script>';
                            window.header("Location:transfail.php?withdraw=error");
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