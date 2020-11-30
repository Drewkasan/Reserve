<?php
    session_start();
    require_once "server.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=".css">
    <title>CRUD</title>
</head>
<body>
<div class="container">
    <div class="inserts">
        <h1>Reservation Form</h1>
        <form action="" method="post">
            <label for="username"></label>
            <input type="text" name="username"  placeholder=" Input Username " required=""><br>
            <input type="email" name="email"  placeholder=" Input email "   required=""><br>
            <input type="text" name="party"  placeholder=" Input Party Size "   required=""><br>
            <input type="text" name="location"  placeholder=" Input Location "  required=""><br>

            <textarea name="detail"  placeholder="Add A description" rows="10"  required="">

                </textarea><br>
            <input type="submit" name="submit" value="SendNow">
        </form>
    </div>
    <div class="views">
        <h1>Administration View</h1>
        <h2>
            All Reservations Made Today <?php echo date('D, d M Y');?>
        </h2>
        <div class="links">

            <?php
            $query = "SELECT * FROM users";
            $return = mysqli_query($link, $query);

            if($return){
                if (mysqli_num_rows($return) > 0) {
                    $new_reserve = mysqli_fetch_all($return, MYSQLI_ASSOC);

                    foreach ($new_reserve as $value) {
                        ?>
                        <div class="body">
                            <h4><?php echo $value['user'] ?></h4>
                            <a href="view.php?detail=<?php echo $value['id'] ?>">
                                <?php
                                if(strlen($value['detail']) >= 50) {
                                    echo substr($value['detail'], 0, 50) . "...";
                                    echo "<p class='view_more'>View More</p>";
                                } else {
                                    echo $value['detail'];
                                }
                                ?>
                            </a>
                        </div>
                    <?php } } } ?>

        </div>
        <p style="color: white;"> <strong>NOTE:</strong> THIS SECTION WILL BE VISIBLE ONLY TO ADMINISTRATORS</p>
    </div>
</div>
</body>
</html>