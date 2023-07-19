<?php
require('config.php');
// Fetch all data from the feedback_table
$sql = "SELECT *
FROM trainee_info
LEFT JOIN feedback ON trainee_info.Email_id = feedback.Email_id

UNION

SELECT *
FROM trainee_info
RIGHT JOIN feedback ON trainee_info.Email_id = feedback.Email_id;
";
$result = $con->query($sql);

// Close the connection
$con->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2; /* Adding a background color to the body */
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-x: auto; /* Adding a horizontal scrollbar when table overflows */
        }

        h1 {
            text-align: center;
            margin-bottom: 20px; /* Adding some margin below the heading */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px; /* Increasing padding for better readability */
            text-align: left;
            border-bottom: 1px solid #ccc;
            white-space: nowrap; /* Prevent table cells from wrapping */
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Adding alternate row background color */
        }

        /* Adding some space between columns on larger screens */
        @media (min-width: 600px) {
            td {
                padding: 16px;
            }
        }

        /* Adding responsive styles for smaller screens */
        @media (max-width: 600px) {
            th, td {
                padding: 8px;
                font-size: 14px; /* Reducing font size for smaller screens */
                word-break: break-word; /* Allow table cells to wrap content */
            }

            h1 {
                font-size: 24px; /* Reducing font size for smaller screens */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>
        <a href="logout.php" style="float: right; margin-top: -40px;">Logout</a>
        <table>
            <tr>
                <th>Name</th>
                <th>College</th>
                <th>Course</th>
                <th>Department</th>
                <th>Guide Name</th>
                <th>Project Details</th>
                <th>Project Submission Date</th>
                <th>Clarity of Lectures</th>
                <th>Well Structured Training</th>
                <th>Queries Addressed Promptly</th>
                <th>Course Materials Organization</th>
                <th>Recommendation</th>
            </tr>
            <?php
            // Loop through the fetched data and display it in the table
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["name"]) . "</td>"; // Adding htmlspecialchars to prevent XSS attacks
                    echo "<td>" . htmlspecialchars($row["college"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["course"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["dept"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["guide_name"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["project_title"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["project_submit"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["q1"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["q2"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["q3"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["q4"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["q5"]) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='12'>No feedback data available.</td></tr>"; // Spanning all columns in case of no data
            }
            ?>
        </table>
    </div>
</body>
</html>


