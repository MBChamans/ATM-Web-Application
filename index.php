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
        <title>Bank Of Mokujit | Menu</title>
        <link rel="icon" href="icon.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="indexstyle.css">
    
        
    </head>


    <body>
        <div class="first">
            <nav class="navbar navbar-light">
                <a class="navbar-brand" href="#" style="color: white; font-size: 30px;">
                    <img src="icon.png" width="60" height="60" alt="" loading="lazy" style="margin-left: 10px; margin-right: 20px;">
                    BANK OF MOKUJIT
                </a>
                <div class="right ">
                    <a class="nav-link active" href="#">MENU</a><a class="nav-link" href="about.html">ABOUT</a><a class="nav-link" href="logout.php">LOGOUT</a>
                    <div class="dropdown"><i class='fas fa-user-circle' style='font-size:48px;color:white'></i><div class="dropdown-content">NAME :<br><span><?php echo $_SESSION['u_name']; ?></span><br>ACCNO :<br><span><?php echo $_SESSION['u_accountno']; ?></span></div>
                </div>
            </nav>
        </div>
        <br><br>
        <div id="main-content" class="container">
<br>
            <h1 id="index" class="text-center">MENU</h1>
            <br>
            <section class="row">
                <div id="bclass" class="col-lg-6 col-md-6">
                    <a href="balance.html"><button id="buttons" class="btn">BALANCE QUERY</button></a>
                </div>
                
                <div id="bclass" class="col-lg-6 col-md-6">
                    <a href="withdraw.html"><button id="buttons" class="btn">WITHDRAW</button></a>
                </div>
                
                <div id="bclass" class="col-lg-6 col-md-6">
                    <a href="ministatement.html"><button id="buttons"class="btn">MINI STATEMENT</button></a>
                </div>
                
                <div id="bclass" class="col-lg-6 col-md-6">
                    <a href="fastcash.html"><button id="buttons" class="btn">FAST CASH</button></a>
                </div>
                
                <div id="bclass" class="col-lg-6 col-md-6">
                    <a href="changepin.html"><button id="buttons" class="btn">CHANGE PIN</button></a>
                </div>

                <div id="bclass" class="col-lg-6 col-md-6">
                    <a href="cashtransfer.html"><button id="buttons"class="btn">CASH TRANSFER</button></a>
                </div>
                
                
    </section><!-- End of row containing buttons -->
    <br>
        </div><!-- End of #main-content -->
        <br><br>
        <div class="footer">
            <br>
            <a style="font-size: 20px;"><img src="icon.png" width="20" height="20" alt="" loading="lazy">BANK OF MOKUJIT</a>
            <br>
            <br>
                <p><i>"Your money is safe with us"</i></p>
            
                <p>CONTACT x MAIL US</p>
                <a href=mailto:sheffinshajit@gmail.com style="color:  #ffad33;">sheffinshajit@gmail.com</a></p>
       
            <br><br>

        </div>
<?php
 
 //}
 
}
 
?>

    </body>
</html>