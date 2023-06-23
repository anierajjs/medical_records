<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Validate the user credentials
  if ($username === 'analyst' && $password === 'password') {
    $_SESSION['user_role'] = 'analyst';
    header('Location: analyst.php');
    exit();
  } elseif ($username === 'manager' && $password === 'password') {
    $_SESSION['user_role'] = 'manager';
    $_SESSION['deptNo'] = 'k01'; // Set the default department number for the manager here
    header('Location: manager.php');
    exit();
  } else {
    header('Location: index.php?error=1');
    exit();
  }
} else {
  header('Location: index.php');
  exit();
}

?>
