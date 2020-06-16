<?php 

session_start();
 
if(!isset($_SESSION['u_accountno']))
 
{
 
    echo "<p align='center'>Please Login again ";
 
    echo "<a href='home.php'>Click Here to Login</a></p>";
 
}
 
else

{

 
   /* $now = time();
 // checking the time now when page starts
 
    if($now > $_SESSION['expire'])
 
    {
 
        session_destroy();
        window.header("Location:home.html?s=expired");
        echo '<script type="text/javascript"> alert("Your session has expired.Please login agian to continue")'; 
    }

    else{
        //starts here
*/
 ?>
 <html>
    <head>
        <title>Bank Of Mokujit | Mini Statement</title>
        <link rel="icon" href="icon.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
       <div class="first">
            <nav class="navbar navbar-light">
                <a class="navbar-brand" href="index.php" style="color: white; font-size: 30px;">
                    <img src="icon.png" width="60" height="60" alt="" loading="lazy" style="margin-left: 10px; margin-right: 20px;">
                    BANK OF MOKUJIT
                </a>
                <div class="right">
                    <a class="nav-link" href="index.php">MENU</a><a class="nav-link" href="about.html">ABOUT</a><a class="nav-link" href="home.html">LOGOUT</a>
                    <div class="dropdown"><i class='fas fa-user-circle' style='font-size:48px;color:white'></i><div class="dropdown-content">NAME :<br><span><?php echo $_SESSION['u_fname'], $_SESSION['u_lname']; ?></span><br>ACCNO :<br><span><?php echo $_SESSION['u_accountno']; ?></span></div>
                </div>
            </nav>
        </div>
        <br>
        <div class="ms">
                <br>
                <div><span class="acno">ACCOUNT NUMBER: </span><span style="color: #228B22;"><?php echo $_SESSION['u_accountno']; ?></span>
                <span class="bal">BALANCE: </span><span style="color: #228B22">Rs.<?php echo $_SESSION['u_balance']; ?></span></div></div>
                <br>
                <p class="mshead">MINI STATEMENT</p>
                <br>
                <br>
                <div class="container">
                    <table class="table">
                    <thead>
                        <tr>
                            <th><b>TRANSACTION ID</b></th>
                            <th><b>DESCRIPTION</b></th>
                            <th><b>TYPE</b></th>
                            <th><b>AMOUNT</b></th>
                            <th><b>BALANCE</b></th>
                        </tr>
                    </thead>
                    
                    <?php
                    
                    $accno = $_SESSION['u_accountno'];
                    $host = "localhost";
                     $dbUsername = "root";
                    $dbPassword = "";
                    $dbname = "atmwebapp";
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
                $first3=$first2['fn'];

                $data="SELECT transid, description ,type ,amount ,balance FROM $first3 ORDER BY transid DESC LIMIT 5";
                    $result1 = mysqli_query($conn,$data);
                    $result2=mysqli_fetch_array($result1,MYSQLI_ASSOC);
                    $num_rows=mysqli_num_rows($result1);

                    $line="SELECT MAX(transid) AS 'transidmax' FROM $first3";
                    $line1=mysqli_query($conn,$line);
                    $line2=mysqli_fetch_array($line1,MYSQLI_ASSOC);
                    $maxtrans=$line2['transidmax'];

                    $data1="SELECT transid, description ,type ,amount ,balance FROM $first3 WHERE transid=$maxtrans";
                    $toprow = mysqli_query($conn,$data1);
                    $row1 = mysqli_fetch_assoc($toprow);
                    echo "<tr><td>" . $row1["transid"]. "</td><td>" . $row1["description"] . "</td><td>". $row1["type"]. "</td><td>". $row1["amount"]. "</td><td>". $row1["balance"]. "</td></tr>";

                    if ($num_rows >=0) {
                        $ctr=1;
                        do {
                            
                            $row = mysqli_fetch_assoc($result1);
                        echo "<tr><td>" . $row["transid"]. "</td><td>" . $row["description"] . "</td><td>". $row["type"]. "</td><td>". $row["amount"]. "</td><td>". $row["balance"]. "</td></tr>";
                        $ctr=$ctr+1;
                            
                            }while($ctr<=5);
                            echo "</table>";
                    } else { echo "0 results"; }
        }
        $conn->close();

}


?>
         </table>           
    </div>
                
            
        </div>
        <p>
 		<br>
 		<br>
        <br>
        <br>
        <div class="footer">
            <br>
            <a style="font-size: 20px;"><img src="icon.png" width="20" height="20" alt="" loading="lazy">BANK OF MOKUJIT</a>
            <br>
            <br>
                <p><i>"Your money is safe with us"</i></p>
            
                <p>CONTACT x MAIL US</p>
                <a href=mailto:mbchamans@gmail.com style="color:  #ffad33;">mbchamans@gmail.com</a></p>
       
            <br><br>

        </div>
<?php
 
 //}
 
}
 
?>
    </body>
</html>
