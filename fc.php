<?php
 session_start();
    
    $accno = $_SESSION['u_accountno'];
    if(isset($_POST['one'])) { 
        $with=500; 
    } 
    if(isset($_POST['two'])) { 
        $with=1000;  
    } 
    if(isset($_POST['three'])) { 
        $with=1500; 
    } 
    if(isset($_POST['four'])) { 
        $with=2000; 
    }
    

   
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
                

                if($bal3>=$with){
                		$UPDATE="UPDATE $ba SET balance=($bal3-$with) WHERE accountno='$accno'";
               			mysqli_query($conn,$UPDATE);
                        //echo '<script type="text/javascript"> alert("Withdraw Transaction Successfully!")
                            //</script>';
                        
                        $INSERTtran="INSERT INTO transactions(`sender`, `receiver`, `amount`,`type`) VALUES ('$first3','--',$with,'ATMF')";
                        mysqli_query($conn,$INSERTtran);
                        $line="SELECT MAX(transid) AS 'transidmax' FROM transactions";
                        $line1=mysqli_query($conn,$line);
                        $line2=mysqli_fetch_array($line1,MYSQLI_ASSOC);
                        $maxtrans=$line2['transidmax'];
                        $INSERT="INSERT INTO $first3(`description`, `balance`, `type`, `amount`,`transid`) VALUES ('ATMF',($bal3-$with),'debit',$with,$maxtrans)";
                        mysqli_query($conn,$INSERT); 
                        window.header("Location:transsuccess.php?withdraw=success");
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
	
	

    
?>