<?php
require("config.php");
require("validate.php");
$name= $_SESSION['user_name'];
if (isset($_SESSION['user_data'])) {
    // Decode the JSON data into an associative array
    $dataArray = $_SESSION['user_data'];
} else {
    $email = $_POST['email_id'];
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $college = $_POST['college'];
    $course = $_POST['course'];
    $dept = $_POST['dept'];
    $guide = $_POST['guide_name'];
    $project = $_POST['project_title'];
    $Sdate = $_POST['project_submit'];

    $sql = "insert into trainee_info(Email_id, name, contact, college, course, dept, guide_name, project_title, project_submit) values('$email','$name','$contact','$college','$course','$dept','$guide','$project','$Sdate')";
    $tbl=mysqli_query($con, $sql);
    if($tbl){
    $dataElement1 = array(
        "Email_id" => $email,
        "name" => $name,
        "contact" => $contact,
        "college" => $college,
        "course" => $course,
        "dept" => $dept,
        "guide_name" => $guide,
        "project_title" => $project,
        "project_submit" => $Sdate
    );

    $dataArray = $dataElement1;

    // Store the data array in the session (no need to JSON encode it)
    $_SESSION['user_data'] = $dataArray;
    }
    else
    {
        echo "alert('wrong credentials!!!')";
    }

}

// Now, $dataArray should be an associative array, and you can access its elements directly.
// echo $dataArray['college'];
?>

<!DOCTYPE html>
<html>
<head>
  <title>Trainee Dashboard</title>
  <style>
    /* CSS Styles */
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
    .trainee-info h3 {
      margin: 0;
      color: #333;
    }

    .trainee-info ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .trainee-info li {
      margin-bottom: 5px;
    }

    .trainee-info li strong {
      display: inline-block;
      width: 150px;
      font-weight: bold;
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
                <li><a href="./feedback_form.html">Feedback</a></li>
                <li><a href="validate.php?action=logout">Logout</a></li> <!-- Logout link -->
            </ul>
        </div>

        <div class="main-content">
            <?php echo "<h2>Welcome, $name!</h2>" ?>
            <p>This is your trainee dashboard. You can access various features and information from the navigation menu on the left.</p>
            
            <!-- Display Trainee Information -->
            <?php if (isset($dataArray)) : ?>
      <div class="trainee-info">
        <h3>Trainee Information:</h3>
        <ul>
          <li><strong>Email:</strong> <?php echo $dataArray['Email_id']; ?></li>
          <li><strong>Name:</strong> <?php echo $dataArray['name']; ?></li>
          <li><strong>Contact:</strong> <?php echo $dataArray['contact']; ?></li>
          <li><strong>College:</strong> <?php echo $dataArray['college']; ?></li>
          <li><strong>Course:</strong> <?php echo $dataArray['course']; ?></li>
          <li><strong>Department:</strong> <?php echo $dataArray['dept']; ?></li>
          <li><strong>Guide Name:</strong> <?php echo $dataArray['guide_name']; ?></li>
          <li><strong>Project Title:</strong> <?php echo $dataArray['project_title']; ?></li>
          <li><strong>Project Submission Date:</strong> <?php echo $dataArray['project_submit']; ?></li>
        </ul>
      </div>
    <?php endif; ?>
            <!-- End of Trainee Information -->

            <!-- Add more content and components here -->
        </div>
    </div>
</div>
  
  <div class="footer">
    <p>&copy; 2023 Trainee Dashboard. All rights reserved.</p>
  </div>
</body>
</html>

