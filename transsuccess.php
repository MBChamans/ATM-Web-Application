<?php 

session_start();
 
if(!isset($_SESSION['u_accountno']))
 
{
 
    echo "<p align='center'>Please Login again ";
 
    echo "<a href='home.php'>Click Here to Login</a></p>";
 
}
 
else

{

 
  
 ?>
<html>
    <head>
        <title>Bank Of Mokujit | Transaction Successful</title>
        <link rel="icon" href="icon.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="style.css">
        <script type="text/javascript">
            setTimeout(function() {
            location.reload();
            "<?php 
             $now = time();
             // checking the time now when home page starts
             if($now > $_SESSION['expire'])
 
            {
 
            session_destroy();
 
            header("Location:index.php?session=expired");
 
             }//
 
            else
 
            {
            //starting this else one [else1]
            ?>"
    
  
            }, 60000);
  </script>
    </head>
    <body>
        <div class="first">
            <nav class="navbar navbar-light">
                <a class="navbar-brand" href="index.php" style="color: white; font-size: 30px;">
                    <img src="icon.png" width="60" height="60" alt="" loading="lazy" style="margin-left: 10px; margin-right: 20px;">
                    BANK OF MOKUJIT
                </a>
                <div class="right">
                    <a class="nav-link" href="index.php">MENU</a><a class="nav-link" href="about.html">ABOUT</a><a class="nav-link" href="logout.php">LOGOUT</a>
                    <div class="dropdown"><i class='fas fa-user-circle' style='font-size:48px;color:white'></i><div class="dropdown-content">NAME :<br><span><?php echo $_SESSION['u_fname'], $_SESSION['u_lname']; ?></span><br>ACCNO :<br><span><?php echo $_SESSION['u_accountno']; ?></span></div>
                    
                </div>
            </nav>
        </div>

        <br>
        <br>
        <br>
        <div class="row">
            <div class="column oneone"></div>
            <div class="column twotwo"><br><br><br><br><br><br><br>
                <h1 style="color:green">TRANSACTION SUCCESSFUL!</h1>
                <br>
                <a href="index.php" style="color: black;">CLICK HERE TO GO BACK TO THE MENU</a>
                <br><br>
                
            </div>
            <div class="column threethree"></div>
        </div>
        <br>
       <br>
        <p style="font-size: 9px;text-align: center;">FOR SECURITY REASONS, YOU WILL BE LOGGED OUT OF THIS SERVICE IN 1 MINUTE</p>
        <br>
        <br>
        
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
 
 }
 
}
 
?>
    </body>
</html>