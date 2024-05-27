<?php
session_start();
if (!isset($_SESSION['adminLoggedin'])) {
    header("location: adminLogin.php");
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "studentVote") or die(mysqli_error($conn));

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM candidate WHERE id='$id'";
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    
    if (mysqli_num_rows($result) > 0) {
        $candidate = mysqli_fetch_assoc($result);
        $voteCount = $candidate['voteCount']; // Store the vote count in a variable
    } else {
        // If no candidate is found, redirect to result page
        header("location: result.php");
        exit;
    }
} else {
    header("location: result.php");
    exit;
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $voteCount = $_POST['voteCount'];

    $updateQuery = "UPDATE candidate SET name='$name', email='$email', voteCount='$voteCount' WHERE id='$id'";
    mysqli_query($conn, $updateQuery) or die(mysqli_error($conn));
    header("location: result.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Candidate</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Secular+One" rel="stylesheet"> 
</head>
<body>
    <div class="container">
        <h1>Edit Candidate</h1>
        <form action="editCandidate.php?id=<?php echo $candidate['id']; ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $candidate['id']; ?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="<?php echo $candidate['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" class="form-control" value="<?php echo $candidate['email']; ?>" required>
            </div>
            <button type="submit" name="update" class="btn btn-primary">Update</button>
            <a href="result.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <style>
        .hidden-input {
    display: none;
}

    </style>
</body>
</html>
