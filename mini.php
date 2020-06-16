<?php
 session_start();
    	$accno = $_SESSION['u_accountno'];
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
                $first ="SELECT fn from customers where accountno='$accno'";
                $first1=mysqli_query($conn,$first);
                $first2=mysqli_fetch_array($first1,MYSQLI_ASSOC);
                $first3=$first2['fn'];

                $bal ="SELECT * from $first3";
                $result=mysqli_query($conn,$bal);
                $resultCheck2=mysqli_fetch_array($result,MYSQLI_ASSOC);
                
                $resultCheck2= mysqli_num_rows($result);
                $a=$resultCheck2;

                for ($x = $a; $x >=$a-5; $x--) {
                    $r="SELECT * from $first3 where transid='$x'";
                    $_SESSION['row']=$r;
                    //echo '$r';
                    
                  }
                
                window.header("Location:ministatement.php?balance=exist");
            }
        $conn->close();

}
?>