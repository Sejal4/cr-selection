<?php
session_start();
if(!isset($_SESSION['adminLoggedin'])) {
    header("location: adminLogin.php");
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "studentVote") or die(mysqli_error($conn));

if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $deleteQuery = "DELETE FROM candidate WHERE id='$id'";
    mysqli_query($conn, $deleteQuery) or die(mysqli_error($conn));
    header("location: result.php"); // Redirect back to the dashboard
}

if (isset($_POST['edit'])) {
    $id = $_POST['edit'];
    // Redirect to an edit form page (you need to create this page)
    header("location: editCandidate.php?id=$id");
}

mysqli_close($conn);
?>
