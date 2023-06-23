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



// Fetch all records from the table
$sql = "SELECT * FROM Records";
$result = $conn->query($sql);
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
      <th>Medical_History</th>
      <th>Risk_Factor</th>
    </tr>
    <?php
    // Loop through the result set and display the records
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['RecordID'] . "</td>";
        echo "<td>" . $row['ClientNo'] . "</td>";
        echo "<td>" . $row['DeptNo'] . "</td>";
        echo "<td>" . $row['Allocation_Date'] . "</td>";
        echo "<td>" . $row['Last_Update'] . "</td>";
        echo "<td>" . $row['Medical_history'] . "</td>";
        echo "<td>" . $row['Risk_Factor'] . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='7'>No records found.</td></tr>";
    }
    ?>
  </table>
  <br>
  <a href="logout.php">Logout</a>
</body>
</html>
