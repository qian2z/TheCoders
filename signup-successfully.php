<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>The Coders | Sign Up Successfully</title>
    <link rel="stylesheet" href="default.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="signup-successfully.css">
</head>
<header>
    <div class="header">
        <ul class="horinavi">
            <li><img src="logo_remove.png" alt="The Coders" width="60px" height="60px" id="coders_logo"></li>
            <li><a href="Homepage.html" id="home">Home</a></li>
            <li><a href="Aboutpage.html">About Us</a></li>
            <li><a href="Eventpage.html">Events</a></li>
            <li><a href="contactpage.html">Contact Us</a></li>
            <li><a href="find-your-peers.php">FIND YOUR PEERS!</a></li>
            <li id="login"><a href="loginpage2.html">Login</a></li>
            <li id="signup"><a href="signuppage.html">Sign Up</a></li>
        </ul>
    </div>
</header>
<div class="frame">
    <br>

    <body>
        <?php
      function getDB() {
            $dbConnection = new PDO("sqlite:humembers.db");
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConnection;
      }

      if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['username'])
      && isset($_POST['email']) && isset($_POST['phoneNum']) && isset($_POST['password'])
      && isset($_POST['gender']) && isset($_POST['year']) && isset($_POST['interest']))
      {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phoneNum'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $year = $_POST['year'];
        $interest = $_POST['interest'];

        include_once('connect.php');
        $a = 1;
        $stmt= $file_db->prepare(
        "SELECT firstname, lastname, gender, email, contact, username, year, interest FROM member WHERE username = '$username'");
        $stmt->execute();

        if($stmt->fetchColumn() != 0) {
          ?>
            <?php
          echo '<script type="text/javascript">';
          echo 'alert("Sorry... this username has already been taken")';
          echo '</script>';
          ?>
                <p id="click">Click <a class="here" href="signuppage.html">here</a> to sign up again.</p><br>
                <?php
        }

        else {
          try{
            $DB = getDB();
            $DB->exec("INSERT INTO 'member' ('firstname', 'lastname', 'gender','year','username', 'email', 'contact', 'password','interest')
                  VALUES ('$fname', '$lname', '$gender','$year','$username','$email','$phone','$password','$interest')");
            $DB = NULL;
          }

          catch (PDOException $e)
          {
            echo 'Exception: '.$e->getMessage();
          }
          ?>
                    <div class="content">
                        <h1>Sign Up Successfully!</h1>
                        <img src="success.gif" alt="Success" width="200px" height="200px">
                    </div>
                    <?php
        }
        ?>

                        <?php
      }
      ?>
    </body>
</div>

<footer>
    <div class="footer">
        <div class="icons">
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-google"></a>
            <a href="#" class="fa fa-youtube"></a>
            <a href="#" class="fa fa-instagram"></a>
        </div>
        <div class="address">
            <p>HappyU University</p>
            <p>1, Jalan Venna P5/2, Precinct 5,</p>
            <p>62200 Putrajaya, Wilayah Persekutuan Putrajaya</p>
        </div>
        <div class="copyright">
            <p id="copyright">Copyright @ 2021 The Coders</p>
        </div>
    </div>
</footer>

</html>