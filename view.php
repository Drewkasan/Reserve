<?php
session_start();
include "server.php";
if (isset($_GET['detail'])) {
$detail_id = $_GET['detail'];

$query = "SELECT * FROM users WHERE id = $detail_id ";
$return_value = mysqli_query($db, $query);

$details = mysqli_fetch_all($return_value, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Read more</title>
</head>
<body>
<?php
foreach ($details as $detail) {
    $username = $detail['user'];
    $email = $detail['email'];
    $party = $detail['party'];
    $location = $detail['location'];
    $detail_info = $detail['detail'];
    ?>
    <h3>
        <?php echo  $username . " <b>From</b> " . $location; ?>
    </h3>
    <br>
    <?php echo date('D, d M Y h:s:i'); ?>
    <div class="container">
        <p>
            <?php echo $detail_info; ?>
        </p><br>
        <small><?php echo $party; ?></small>
    </div>

<?php } } ?>
</body>
</html>