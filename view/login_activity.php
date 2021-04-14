<!DOCTYPE html>
<html>

<head>
    <title>Login Activity</title>
    <link rel="stylesheet" href="../styles/login_activity_Page.css">
</head>

<body>


<?php

session_start();

require "../controller/seller_profile_controller.php";
include "../view/header.php";

$loginData = file_get_contents('../storage/loginInfo.json');
$loginData = json_decode($loginData, true)

?>

<div class="flex-container">
    <div id="player-list" class="player-list">
        <h2 style="text-align: center;">Login Activity</h2><br><br>
        <?php foreach ($loginData as $key => $data):
            if ($data['userId'] != $_SESSION['userId']) continue  ?>
            <div class="column">
                <div class="card">
                    <h5><?php echo $data['time'] ?></h5>
                    <h4 class="price-text">IP Address: <?php echo $data['ipAddress']?> </h4>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include "../view/footer.php"; ?>
</body>

</html>