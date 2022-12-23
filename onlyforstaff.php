<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Staff Use | Tracking Record Page</title>
  <link rel="stylesheet" href="onlyforstaff.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <h2>Sign Up Record</h2>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>First_name</th>
            <th>Last_name</th>
            <th>Gender</th>
            <th>Year of Study</th>
            <th>Username</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Password</th>
            <th>Interest</th>
          </tr>
        </thead>
        <tbody>
          <?php
                include_once('connect.php');
                $a=1;
                $stmt = $file_db->query(
                  "SELECT * FROM member");
                $stmt->execute();
                $users = $stmt->fetchAll();
                foreach($users as $user)
              {
            ?>
          <tr>
            <td>
              <?php echo $user['firstname']; ?>
            </td>
            <td>
              <?php echo $user['lastname']; ?>
            </td>
            <td>
              <?php echo $user['gender']; ?>
            </td>
            <td>
              <?php echo $user['year']; ?>
            </td>
            <td>
              <?php echo $user['username']; ?>
            </td>
            <td>
              <?php echo $user['email']; ?>
            </td>
            <td>
              <?php echo $user['contact']; ?>
            </td>
            <td>
              <?php echo $user['password']; ?>
            </td>
            <td>
              <?php echo $user['interest']; ?>
            </td>
            <?php
                }
                ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>
