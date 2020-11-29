<?php
// CREATE DATABASE CONNECTION
$db = mysqli_connect('localhost', 'root', '', 'reservation') or die("connection failed" . mysqli_error());
// SELECT FORM FIELD DATA
if(isset($_POST['submit'])){
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $party = mysqli_real_escape_string($db, $_POST['party']);
    $location = mysqli_real_escape_string($db, $_POST['location']);
    $detail = mysqli_real_escape_string($db, $_POST['detail']);

    // QUERY
    $query = mysqli_query($db, "INSERT INTO users(user,email,party,location,detail) VALUES('$username','$email','$party','$location','$detail') ");
    if ($query) {
        $_SESSION['success'] = "Your Reservation has been Submitted";
        $_SESSION['id'] = $db->insert_id;
        header('location: index.php');
        exit();
    } else {
        $_SESSION['error'] = "Sorry, check your inputs for errors";
    }
}


//INSERT DATA TO DATABASE TO SAVE AS A RECORD