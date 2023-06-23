<?php
session_start();

// Check if the user is logged in as an analyst
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'analyst') {
  header('Location: index.php');
  exit();
}

// Connect to the database
$servername = "localhost";
$username = "analyst"; // Replace with the correct username
$password = "password"; // Replace with the correct password
$dbname = "medical_records_db";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Update record if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $recordID = $_POST['recordID'];
  $clientNo = $_POST['clientNo'];
  $deptNo = $_POST['deptNo'];
  $allocationDate = $_POST['allocationDate'];
  $lastUpdate = $_POST['lastUpdate'];
  $medicalHistory = $_POST['medicalHistory'];
  $riskFactor = $_POST['riskFactor'];

  // Prepare and execute the update statement
  $stmt = $conn->prepare("UPDATE records SET ClientNo = ?, DeptNo = ?, Allocation_Date = ?, Last_Update = ?, Medical_History = ?, Risk_Factor = ? WHERE RecordID = ?");
  $stmt->bind_param("ssssssi", $clientNo, $deptNo, $allocationDate, $lastUpdate, $medicalHistory, $riskFactor, $recordID);
  $stmt->execute();

  // Redirect to the same page to avoid resubmission of the form
  header("Location: analyst.php");
  exit();
}

// Fetch all records from the table
$sql = "SELECT * FROM records";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Medical Records (Analyst)</title>
</head>
<body>
  <h1>Welcome, Medical Record Analyst!</h1>
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
      <th>Update</th>
    </tr>
    <?php
    // Loop through the result set and display the records
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['RecordID'] . "</td>";
        echo "<td>";
        echo "<form method='post' action='analyst.php'>";
        echo "<input type='hidden' name='recordID' value='" . $row['RecordID'] . "'>";
        echo "<input type='text' name='clientNo' value='" . $row['ClientNo'] . "'>";
        echo "</td>";
        echo "<td>";
        echo "<input type='text' name='deptNo' value='" . $row['DeptNo'] . "'>";
        echo "</td>";
        echo "<td>";
        echo "<input type='text' name='allocationDate' value='" . $row['Allocation_Date'] . "'>";
        echo "</td>";
        echo "<td>";
        echo "<input type='text' name='lastUpdate' value='" . $row['Last_Update'] . "'>";
        echo "</td>";
        echo "<td>";
        echo "<input type='text' name='medicalHistory' value='" . $row['Medical_history'] . "'>";
        echo "</td>";
        echo "<td>";
        echo "<input type='text' name='riskFactor' value='" . $row['Risk_Factor'] . "'>";
        echo "</td>";
        echo "<td><button type='submit'>Update</button></td>";
        echo "</form>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='8'>No records found.</td></tr>";
    }
    ?>
  </table>
  <br>
  <a href="logout.php">Logout</a>
</body>
</html>
