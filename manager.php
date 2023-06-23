<?php
session_start();

// Check if the user is logged in as a manager
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'manager') {
  header('Location: index.php');
  exit();
}

// Connect to the database
$servername = "localhost";
$username = "manager"; // Replace with the correct username
$password = "password"; // Replace with the correct password
$dbname = "medical_records_db";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve the manager's department number if it exists in the session
$managerDeptNo = isset($_SESSION['deptNo']) ? $_SESSION['deptNo'] : '';

// Fetch records for the manager's department from the view if the department number is set
if (!empty($managerDeptNo)) {
  $viewName = "records_view_dept_" . strtolower($managerDeptNo); // Modify the view name format here
  $sql = "SELECT RecordID, ClientNo, DeptNo, Allocation_Date, Last_Update, Risk_Factor FROM $viewName"; // Modify the SELECT statement to specify the columns you want to retrieve
  $result = $conn->query($sql);
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Medical Records (Manager)</title>
</head>
<body>
  <h1>Welcome, Manager!</h1>
  <h2>All Records:</h2>
  <table>
    <tr>
      <th>RecordID</th>
      <th>ClientNo</th>
      <th>DeptNo</th>
      <th>Allocation_Date</th>
      <th>Last_Update</th>
      <th>Risk_Factor</th>
    </tr>
    <?php
    // Display the records if the result set is not empty
    if (isset($result) && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['RecordID'] . "</td>";
        echo "<td>" . $row['ClientNo'] . "</td>";
        echo "<td>" . $row['DeptNo'] . "</td>";
        echo "<td>" . $row['Allocation_Date'] . "</td>";
        echo "<td>" . $row['Last_Update'] . "</td>";
        echo "<td>" . $row['Risk_Factor'] . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='6'>No records found.</td></tr>";
    }
    ?>
  </table>
  <br>
  <a href="logout.php">Logout</a>
</body>
</html>
