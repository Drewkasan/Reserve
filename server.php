<?php
// CREATE DATABASE CONNECTION
$link = mysqli_connect('localhost', 'root', '', 'reservation') or die("connection failed" . mysqli_error());
// SELECT FORM FIELD DATA
if(isset($_POST['submit'])){
    $user = mysqli_real_escape_string($link, $_POST['user']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $party = mysqli_real_escape_string($link, $_POST['party']);
    $location = mysqli_real_escape_string($link, $_POST['location']);
    $detail = mysqli_real_escape_string($link, $_POST['detail']);

    // QUERY
    $query = mysqli_query($link, "INSERT INTO users(user,email,party,location,detail) VALUES('$user','$email','$party','$location','$detail') ");
    if ($query) {
        $_SESSION['success'] = "Your Reservation has been Submitted";
        $_SESSION['id'] = $link->insert_id;
        header('location: index.php');
        exit();
    } else {
        $_SESSION['error'] = "Sorry, check your inputs for errors";
    }
}


//INSERT DATA TO DATABASE TO SAVE AS A RECORD