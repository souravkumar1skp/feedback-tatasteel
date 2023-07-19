<?php
require("config.php");
require("validate.php");
$email = $_SESSION['user'];
$sql = "SELECT name from sign_user WHERE Email_id= '$email'";
$tbl = mysqli_query($con, $sql);
$name = mysqli_fetch_object($tbl)->name;
$_SESSION['user_name']=$name;
$sql = "SELECT * from trainee_info WHERE Email_id= '$email'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result)>0) {
    $data = mysqli_fetch_assoc($result);

    // Free the result set.
    mysqli_free_result($result);

    // Serialize the data into JSON format.
    // $json_data = json_encode($data);
    $_SESSION['user_data']= $data;
    header("location: info.php");
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Trainee Dashboard</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: column;
      min-height: 100vh; /* Set the minimum height of the body to fill the viewport */
    }
    .header {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }
    .container {
      margin: 20px;
      flex-grow: 1; /* Allow the container to grow and fill the remaining space */
    }
    .dashboard {
      display: flex;
      justify-content: space-between;
    }
    .sidebar {
      width: 200px;
      background-color: #f1f1f1;
      padding: 10px;
    }
    .main-content {
      flex-grow: 1;
      padding: 10px;
      background-color: #fff;
    }
    .footer {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }
    .form-container {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .form-group input[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      cursor: pointer;
    }

    .form-group input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>

<body>
  <div class="header">
    <h1>Trainee Dashboard</h1>
  </div>

  <div class="container">
    <div class="dashboard">
      <div class="sidebar">
        <h3>Navigation</h3>
        <ul>
          <li><a href="#">Feedback</a></li>
          <li><a href="validate.php?action=logout">Logout</a></li> <!-- Logout link -->
        </ul>
      </div>

      <div class="main-content">
        <?php echo "<h2>Welcome, $name!</h2>" ?>
        <div class="form-container">
          <h2>Project Information Form</h2>
          <form action="info.php" method="post">
            <div class="form-group">
              <label for="email_id">Email ID:</label>
              <input type="email" id="email_id" name="email_id" required>
            </div>
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
              <label for="contact">Contact:</label>
              <input type="tel" id="contact" name="contact" required>
            </div>
            <div class="form-group">
              <label for="college">College:</label>
              <input type="text" id="college" name="college" required>
            </div>
            <div class="form-group">
              <label for="course">Course:</label>
              <input type="text" id="course" name="course" required>
            </div>
            <div class="form-group">
              <label for="dept">Department:</label>
              <input type="text" id="dept" name="dept" required>
            </div>
            <div class="form-group">
              <label for="guide_name">Guide Name:</label>
              <input type="text" id="guide_name" name="guide_name" required>
            </div>
            <div class="form-group">
              <label for="project_title">Project Title:</label>
              <input type="text" id="project_title" name="project_title" required>
            </div>
            <div class="form-group">
              <label for="project_submit">Project Submission Date:</label>
              <input type="date" id="project_submit" name="project_submit" required>
            </div>
            <div class="form-group">
              <input type="submit" value="Submit">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="footer">
    <p>&copy; 2023 Trainee Dashboard. All rights reserved.</p>
  </div>

</body>

</html>