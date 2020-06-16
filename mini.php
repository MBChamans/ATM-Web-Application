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
                $bal ="SELECT balance from customers where accountno='$accno'";
                $bal1=mysqli_query($conn,$bal);
                $bal2=mysqli_fetch_array($bal1,MYSQLI_ASSOC);
                $_SESSION['fbalance']=$bal2['balance'];

                $bank = "SELECT bank from customers where accountno='$accno'";
                $b=mysqli_query($conn,$bank);
                $ban=mysqli_fetch_array($b,MYSQLI_ASSOC);
                $ba=$ban['bank'];


                $first="SELECT fn from $ba where accountno='$accno'";
                $first1=mysqli_query($conn,$first);
                $first2=mysqli_fetch_array($first1,MYSQLI_ASSOC);
                $_SESSION['frstname']=$first2['fn'];


                
            

                    
                    window.header("Location:ministatement.php?statement=exist");
        }
        $conn->close();

}
?>