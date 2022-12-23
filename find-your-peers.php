<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>The Coders | Find Your Peers</title>
  <link rel="stylesheet" href="default.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="find-your-peers.css">
</head>
<header>
  <div class="header">
    <ul class="horinavi">
      <li><img src="logo_remove.png" alt="The Coders" width="60px" height="60px" id="coders_logo"></li>
      <li><a href="Homepage.html" id="home">Home</a></li>
      <li><a href="Aboutpage.html">About Us</a></li>
      <li><a href="Eventpage.html">Events</a></li>
      <li><a href="contactpage.html">Contact Us</a></li>
      <li><a href="find-your-peers.html">FIND YOUR PEERS!</a></li>
      <li id="login"><a href="loginpage.html">Login</a></li>
      <li id="signup"><a href="signuppage.html">Sign Up</a></li>
    </ul>
  </div>
</header>

<body>
  <h1 id="topic">Find Your Peers Here!</h1>
  <br><br>
  <form class="" action="find-your-peers.php" method="post">
    <div class="filterbar">
      <div class="sort">
        <select id="dbsort" class="db-sort" name="sort">
          <option value="sort">Sort by Default</option>
          <option value="asc">Ascending Order</option>
          <option value="desc">Descending Order</option>
        </select>
      </div>
      <div class="f-year">
        <select id="dbyear" class="db-year" name="filter-year">
          <option value="default1">Filter by Year-Of-Study</option>
          <option value="Foundation">Foundation</option>
          <option value="Year 1">Year 1</option>
          <option value="Year 2">Year 2</option>
          <option value="Year 3">Year 3</option>
          <option value="Year 4">Year 4</option>
        </select>
      </div>
      <div class="f-gender">
        <select id="dbgender" class="db-gender" name="filter-gender">
          <option value="default2">Filter by Gender</option>
          <option value="Female">Female</option>
          <option value="Male">Male</option>
        </select>
      </div>
      <div class="f-interest">
        <select id="dbinterest" class="db-interest" name="filter-interest">
          <option value="default3">Filter by Interest Topic</option>
          <option value="Java">Java</option>
          <option value="Python">Python</option>
          <option value="C#">C#</option>
          <option value="C++">C++</option>
          <option value="JavaScript">JavaScript</option>
          <option value="R">R</option>
        </select>
      </div>
      <div class="find">
        <input class="findbtn" type="submit" name="find" value="Find">
      </div>
    </div>
  </form>
  <?php
if (!empty($_POST['sort']) && !empty($_POST['filter-year']) && !empty($_POST['filter-gender']) && !empty($_POST['filter-interest'])){
  ?>
  <div class="table">
    <div class="table-header">
      <table>
        <thead>
          <tr>
            <th>Username</th>
            <th>Gender</th>
            <th>Year of Study</th>
            <th>Interest</th>
            <th>Email</th>
          </tr>
        </thead>
    </div>
  </div>
  <div class="table-body">
    <tbody>
      <?php
        $sorting = $_POST['sort'];
        $yofstudy = $_POST['filter-year'];
        $gender = $_POST['filter-gender'];
        $interest = $_POST['filter-interest'];

        if($sorting == 'sort'){

          if($yofstudy == 'default1' && $gender == 'default2' && $interest == 'default3'){
            include_once('connect.php');
            $i = 0;
            $stmt = $file_db -> prepare("SELECT firstname, lastname, username, gender, year, interest, email, contact FROM member");
            $stmt->execute();
            $result = $stmt -> fetchAll();
          }

          if($yofstudy != 'default1' && $gender != 'default2' && $interest != 'default3'){
            include_once('connect.php');
            $i = 0;
            $stmt = $file_db -> prepare("SELECT firstname, lastname, username, gender, year, interest, email, contact FROM member
            WHERE year='$yofstudy' AND gender='$gender' AND interest='$interest'");
            $stmt->execute();
            $result = $stmt -> fetchAll();
          }

          if($yofstudy == 'default1' && $gender != 'default2' && $interest != 'default3'){
            include_once('connect.php');
            $i = 0;
            $stmt = $file_db -> prepare("SELECT firstname, lastname, username, gender, year, interest, email, contact FROM member
            WHERE gender='$gender' AND interest='$interest'");
            $stmt->execute();
            $result = $stmt -> fetchAll();
          }

          if($yofstudy != 'default1' && $gender == 'default2' && $interest != 'default3'){
            include_once('connect.php');
            $i = 0;
            $stmt = $file_db -> prepare("SELECT firstname, lastname, username, gender, year, interest, email, contact FROM member
            WHERE year='$yofstudy' AND interest='$interest'");
            $stmt->execute();
            $result = $stmt -> fetchAll();
          }

          if($yofstudy != 'default1' && $gender != 'default2' && $interest == 'default3'){
            include_once('connect.php');
            $i = 0;
            $stmt = $file_db -> prepare("SELECT firstname, lastname, username, gender, year, interest, email, contact FROM member
            WHERE year='$yofstudy' AND gender='$gender'");
            $stmt->execute();
            $result = $stmt -> fetchAll();
          }

          if($yofstudy != 'default1' && $gender == 'default2' && $interest == 'default3'){
            include_once('connect.php');
            $i = 0;
            $stmt = $file_db -> prepare("SELECT firstname, lastname, username, gender, year, interest, email, contact FROM member
            WHERE year='$yofstudy'");
            $stmt->execute();
            $result = $stmt -> fetchAll();
          }

          if($yofstudy == 'default1' && $gender != 'default2' && $interest == 'default3'){
            include_once('connect.php');
            $i = 0;
            $stmt = $file_db -> prepare("SELECT firstname, lastname, username, gender, year, interest, email, contact FROM member
            WHERE gender='$gender'");
            $stmt->execute();
            $result = $stmt -> fetchAll();
          }

          if($yofstudy == 'default1' && $gender == 'default2' && $interest != 'default3'){
            include_once('connect.php');
            $i = 0;
            $stmt = $file_db -> prepare("SELECT firstname, lastname, username, gender, year, interest, email, contact FROM member
            WHERE interest='$interest'");
            $stmt->execute();
            $result = $stmt -> fetchAll();
          }
        }

        if($sorting == 'asc') {
          if($yofstudy == 'default1' && $gender == 'default2' && $interest == 'default3'){
            include_once('connect.php');
            $i = 0;
            $stmt = $file_db -> prepare("SELECT firstname, lastname, username, gender, year, interest, email, contact FROM member
            ORDER BY LOWER(username) ASC");
            $stmt->execute();
            $result = $stmt -> fetchAll();
          }

          if($yofstudy != 'default1' && $gender != 'default2' && $interest != 'default3'){
            include_once('connect.php');
            $i = 0;
            $stmt = $file_db -> prepare("SELECT firstname, lastname, username, gender, year, interest, email, contact FROM member
            WHERE year='$yofstudy' AND gender='$gender' AND interest='$interest' ORDER BY LOWER(username) ASC");
            $stmt->execute();
            $result = $stmt -> fetchAll();
          }

          if($yofstudy == 'default1' && $gender != 'default2' && $interest != 'default3'){
            include_once('connect.php');
            $i = 0;
            $stmt = $file_db -> prepare("SELECT firstname, lastname, username, gender, year, interest, email, contact FROM member
            WHERE gender='$gender' AND interest='$interest' ORDER BY LOWER(username) ASC");
            $stmt->execute();
            $result = $stmt -> fetchAll();
          }

          if($yofstudy != 'default1' && $gender == 'default2' && $interest != 'default3'){
            include_once('connect.php');
            $i = 0;
            $stmt = $file_db -> prepare("SELECT firstname, lastname, username, gender, year, interest, email, contact FROM member
            WHERE year='$yofstudy' AND interest='$interest' ORDER BY LOWER(username) ASC");
            $stmt->execute();
            $result = $stmt -> fetchAll();
          }

          if($yofstudy != 'default1' && $gender != 'default2' && $interest == 'default3'){
            include_once('connect.php');
            $i = 0;
            $stmt = $file_db -> prepare("SELECT firstname, lastname, username, gender, year, interest, email, contact FROM member
            WHERE year='$yofstudy' AND gender='$gender' ORDER BY LOWER(username) ASC");
            $stmt->execute();
            $result = $stmt -> fetchAll();
          }

          if($yofstudy != 'default1' && $gender == 'default2' && $interest == 'default3'){
            include_once('connect.php');
            $i = 0;
            $stmt = $file_db -> prepare("SELECT firstname, lastname, username, gender, year, interest, email, contact FROM member
            WHERE year='$yofstudy' ORDER BY LOWER(username) ASC");
            $stmt->execute();
            $result = $stmt -> fetchAll();
          }

          if($yofstudy == 'default1' && $gender != 'default2' && $interest == 'default3'){
            include_once('connect.php');
            $i = 0;
            $stmt = $file_db -> prepare("SELECT firstname, lastname, username, gender, year, interest, email, contact FROM member
            WHERE gender='$gender' ORDER BY LOWER(username) ASC");
            $stmt->execute();
            $result = $stmt -> fetchAll();
          }

          if($yofstudy == 'default1' && $gender == 'default2' && $interest != 'default3'){
            include_once('connect.php');
            $i = 0;
            $stmt = $file_db -> prepare("SELECT firstname, lastname, username, gender, year, interest, email, contact FROM member
            WHERE interest='$interest' ORDER BY LOWER(username) ASC");
            $stmt->execute();
            $result = $stmt -> fetchAll();
          }
        }

        if($sorting == 'desc') {
          if($yofstudy == 'default1' && $gender == 'default2' && $interest == 'default3'){
            include_once('connect.php');
            $i = 0;
            $stmt = $file_db -> prepare("SELECT firstname, lastname, username, gender, year, interest, email, contact FROM member
            ORDER BY LOWER(username) DESC");
            $stmt->execute();
            $result = $stmt -> fetchAll();
          }

          if($yofstudy != 'default1' && $gender != 'default2' && $interest != 'default3'){
            include_once('connect.php');
            $i = 0;
            $stmt = $file_db -> prepare("SELECT firstname, lastname, username, gender, year, interest, email, contact FROM member
            WHERE year='$yofstudy' AND gender='$gender' AND interest='$interest' ORDER BY LOWER(username) DESC");
            $stmt->execute();
            $result = $stmt -> fetchAll();
          }

          if($yofstudy == 'default1' && $gender != 'default2' && $interest != 'default3'){
            include_once('connect.php');
            $i = 0;
            $stmt = $file_db -> prepare("SELECT firstname, lastname, username, gender, year, interest, email, contact FROM member
            WHERE gender='$gender' AND interest='$interest' ORDER BY LOWER(username) DESC");
            $stmt->execute();
            $result = $stmt -> fetchAll();
          }

          if($yofstudy != 'default1' && $gender == 'default2' && $interest != 'default3'){
            include_once('connect.php');
            $i = 0;
            $stmt = $file_db -> prepare("SELECT firstname, lastname, username, gender, year, interest, email, contact FROM member
            WHERE year='$yofstudy' AND interest='$interest' ORDER BY LOWER(username) DESC");
            $stmt->execute();
            $result = $stmt -> fetchAll();
          }

          if($yofstudy != 'default1' && $gender != 'default2' && $interest == 'default3'){
            include_once('connect.php');
            $i = 0;
            $stmt = $file_db -> prepare("SELECT firstname, lastname, username, gender, year, interest, email, contact FROM member
            WHERE year='$yofstudy' AND gender='$gender' ORDER BY LOWER(username) DESC");
            $stmt->execute();
            $result = $stmt -> fetchAll();
          }

          if($yofstudy != 'default1' && $gender == 'default2' && $interest == 'default3'){
            include_once('connect.php');
            $i = 0;
            $stmt = $file_db -> prepare("SELECT firstname, lastname, username, gender, year, interest, email, contact FROM member
            WHERE year='$yofstudy' ORDER BY LOWER(username) DESC");
            $stmt->execute();
            $result = $stmt -> fetchAll();
          }

          if($yofstudy == 'default1' && $gender != 'default2' && $interest == 'default3'){
            include_once('connect.php');
            $i = 0;
            $stmt = $file_db -> prepare("SELECT firstname, lastname, username, gender, year, interest, email, contact FROM member
            WHERE gender='$gender' ORDER BY LOWER(username) DESC");
            $stmt->execute();
            $result = $stmt -> fetchAll();
          }

          if($yofstudy == 'default1' && $gender == 'default2' && $interest != 'default3'){
            include_once('connect.php');
            $i = 0;
            $stmt = $file_db -> prepare("SELECT firstname, lastname, username, gender, year, interest, email, contact FROM member
            WHERE interest='$interest' ORDER BY LOWER(username) DESC");
            $stmt->execute();
            $result = $stmt -> fetchAll();
          }
        }

        if(!empty($result)) {
          foreach ($result as $key) {
            ?>
      <tr class="body-row">
        <td>@<?php echo $key['username']; ?></td>
        <td><?php echo $key['gender']; ?></td>
        <td><?php echo $key['year']; ?></td>
        <td><?php echo $key['interest']; ?></td>
        <td><?php echo $key['email']; ?></td>
      </tr>
      <?php
          }
          ?>
      <?php
        }
        ?>
    </tbody>
    </table>
  </div>
  <?php
}
?>
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
