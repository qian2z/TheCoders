<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>The Coders | Member Profile</title>
  <link rel="stylesheet" href="default.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="memberprofile.css">
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
  if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    include_once('connect.php');
    $a = 1;
    $stmt = $file_db->prepare(
    "SELECT firstname, lastname, gender, email, contact, username, year, interest FROM member WHERE
    username = '$username' AND password = '$password'");
    $stmt->execute();

    if ($stmt->fetchColumn() == 0) {
      ?>
    <?php
      echo '<script type="text/javascript">';
      echo 'alert("Invalid username and/or password")';
      echo '</script>';
    ?>
    <p id="click">Click <a class="here" href="loginpage.html">here</a> to try logging in again.</p><br>
    <?php
    }

    else {
      $stmt = $file_db->prepare(
      "SELECT firstname, lastname, gender, email, contact, username, year, interest FROM member WHERE
      username = '$username' AND password = '$password'");
      $stmt->execute();
?>
    <h1>MEMBER PROFILE</h1>
    <div class="profilepic">
      <img class="user" src="user.png" alt="Profile Picture" width="100px" height="100px">
    </div>
    <div class="profileinfo">
      <?php
              $stmt = $file_db->prepare(
                "SELECT firstname, lastname, gender, email, contact, username, year, interest FROM member
                WHERE username='$username' AND password='$password' ");
              $stmt->execute();
            $users = $stmt->fetchAll();
            foreach($users as $user)
          {
            ?>

      <div class="username-bar">
        <input type="text" name="username" value="<?php echo $user['username']; ?>" readonly id="username-box">
        </p><br>
      </div>
      <br><br>
      <div class="info-box">
        <form>
          <label class="info">FIRST NAME: <input type="text" name="firstname" value="<?php echo $user['firstname']; ?>" readonly></label><br><br>
          <label class="info">LAST NAME: <input type="text" name="lastname" value="<?php echo $user['lastname']; ?>" readonly></label><br><br>
          <label class="info">GENDER: <input type="text" name="gender" value="<?php echo $user['gender']; ?>" readonly></label><br><br>
          <label class="info">EMAIL: <input type="text" name="email" value="<?php echo $user['email']; ?>" readonly></label><br><br>
          <label class="info">CONTACT: <input type="text" name="contact" value="<?php echo $user['contact']; ?>" readonly></label><br><br>
          <label class="info">YEAR OF STUDY: <input type="text" name="year" value="<?php echo $user['year']; ?>" readonly></label><br><br>
          <label class="info">INTEREST TOPIC: <input type="text" name="interest" value="<?php echo $user['interest']; ?>" readonly></label><br><br>
        </form>
      </div>

      <?php
    }
    ?>
      <?php
  }
  ?>
      <?php
}
  ?>
    </div>
</div>
</body>
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
