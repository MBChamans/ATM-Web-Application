<?php  

session_start();

?><html>
    <head>
        <title>Bank Of Mokujit</title>
        <link rel="icon" href="icon.png">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="first">
            <nav class="navbar navbar-light">
                <a class="navbar-brand" href="#" style="color: white; font-size: 30px;">
                    <img src="icon.png" width="60" height="60" alt="" loading="lazy" style="margin-left: 10px; margin-right: 20px;">
                    BANK OF MOKUJIT
                </a>
                <div class="right">
                    <a class="nav-link" href="about.html">ABOUT</a>
                </div>
            </nav>
        </div>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="column one"></div>
            <div class="column two"><br>
                <h1>LOGIN</h1>
                <p>ENTER YOUR CREDENTIALS</p>
                <br>
                <form action="login.php" method="POST">
                    <div class="container">
                        <label for="cardno">CARD NUMBER</label><br>
                        <input type="text" placeholder="ENTER CARD NUMBER" name="cardno" required>
                      <br><br>
                        <label for="pin">PIN</label><br>
                        <input type="password" placeholder="ENTER PIN" name="pin" required>
                        <br><br>
                        <div class="buttons">
                            <button type="submit">LOGIN</button>
                            <button type="button" id="forgot"><a href=mailto:sheffinshajit@gmail.com?subject=Forgot%20PIN&body=Enter%20your%20Email-ID%20and%20Account%20No:>FORGOT PIN?</a></button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="column three"></div>
        </div>
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
                <a href=mailto:sheffinshajit@gmail.com style="color:  #ffad33;">sheffinshajit@gmail.com</a></p>
       
            <br>
            <br>

        </div>
    </body>
</html>