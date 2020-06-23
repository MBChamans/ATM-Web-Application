<?php
 session_start();
    $accno = $_SESSION['u_accountno'];
    $amount = $_POST['amount'];
    $baccno = $_POST['accno'];

    if (!empty($baccno) || !empty($amount)){
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
                $bankcust = "SELECT bank from customers where accountno='$accno'";
                $bankcust1=mysqli_query($conn,$bankcust);
                $bankcust2=mysqli_fetch_array($bankcust1,MYSQLI_ASSOC);
                $bankcust3=$bankcust2['bank'];

                $bankbenf = "SELECT bank from customers where accountno='$baccno'";
                $bankbenf1=mysqli_query($conn,$bankbenf);
                $bankbenf2=mysqli_fetch_array($bankbenf1,MYSQLI_ASSOC);
                $bankbenf3=$bankbenf2['bank'];

                
                $balbenf ="SELECT balance from customers where accountno='$baccno'";
                $balbenf1=mysqli_query($conn,$balbenf);
                $balbenf2=mysqli_fetch_array($balbenf1,MYSQLI_ASSOC);
                $balbenf3=$balbenf2['balance'];


				$firstcust="SELECT fn from $bankcust3 where accountno='$accno'";
                $firstcust1=mysqli_query($conn,$firstcust);
                $firstcust2=mysqli_fetch_array($firstcust1,MYSQLI_ASSOC);
                $firstcust3=$firstcust2['fn'];



                $firstbenf="SELECT fn from $bankbenf3 where accountno='$baccno'";
                $firstbenf1=mysqli_query($conn,$firstbenf);
                $firstbenf2=mysqli_fetch_array($firstbenf1,MYSQLI_ASSOC);
                $firstbenf3=$firstbenf2['fn'];
                
                $balcust ="SELECT balance from customers where accountno='$accno'";
                $balcust1=mysqli_query($conn,$balcust);
                $balcust2=mysqli_fetch_array($balcust1,MYSQLI_ASSOC);
                $balcust3=$balcust2['balance'];

                
                

                
                

                //$to='Cash Transfer to ';
                //$from='Cash Transfer from ';
                //$a=$to.$firstbenf3;
                //$b=$from.$firstcust3;
                if($firstbenf3!=''){
                if($balcust3>=$amount){
                		$UPDATE1="UPDATE $bankcust3 SET balance=($balcust3-$amount) WHERE accountno='$accno'";
               			mysqli_query($conn,$UPDATE1);
                        $UPDATE2="UPDATE $bankbenf3 SET balance=($balbenf3+$amount) WHERE accountno='$baccno'";
                        mysqli_query($conn,$UPDATE2);
                        
                        $INSERTtran="INSERT INTO transactions(`sender`, `receiver`, `amount`,`type`) VALUES ('$firstcust3','$firstbenf3',$amount,'Transfer from $firstcust3 to $firstbenf3')";
                        mysqli_query($conn,$INSERTtran);
                        $line="SELECT MAX(transid) AS 'transidmax' FROM transactions";
                        $line1=mysqli_query($conn,$line);
                        $line2=mysqli_fetch_array($line1,MYSQLI_ASSOC);
                        $maxtrans=$line2['transidmax'];
                        $INSERT1="INSERT INTO $firstcust3 (`description`, `balance`, `type`, `amount`,`transid`) VALUES ('Transfer to $firstbenf3',($balcust3-$amount),'debit',$amount,$maxtrans)";
                        mysqli_query($conn,$INSERT1);
                        $INSERT2="INSERT INTO $firstbenf3 (`description`, `balance`, `type`, `amount`,`transid`) VALUES ('Transfer from $firstcust3',($balbenf3+$amount),'credit',$amount,$maxtrans)";
                        mysqli_query($conn,$INSERT2);
                        echo '<script type="text/javascript"> alert("Transfer Transaction Successfully!")
                            </script>';
                        window.header("Location:transsuccess.php?withdraw=success");
                         
                            exit();
                }
                else{
                        echo '<script>alert("Insufficient_Balance!")</script>';
                            window.header("Location:transfail.php?withdraw=error(Insufficient Balance!)");
                            exit();
                }}
                else{
                    echo '<script> alert("Account_Number_Not_Found!")</script>';
                            window.header("Location:transfail.php?withdraw=error(Account Number Not Found!)");
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