<?php
require 'security.php';

if (isset($_POST['crime'])) {
    require 'db.php';
    extract($_POST);
    $today = date('Y-m-d H:i:s');
    $left = "0000-00-00";
    $sql = "INSERT INTO `suspects`(`id`, `names`, `identity`, `gender`, `date`, `crime`, `type`, `date_left`) VALUES 
                                (null ,'$names','$identity','$gender','$today','$crime','$type','$left')";

    mysqli_query($conn, $sql) or die(mysqli_error($conn));

    $message = "suspect added";
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="bootstrap-4.2/css/bootstrap.css">
    <script src="bootstrap-4.2/js/jquery.min.js"></script>
    <script src="bootstrap-4.2/js/popper.min.js.min.js"></script>
    <script src="bootstrap-4.2/js/bootstrap.min.js"></script>

</head>
<body>
<?php require 'navbar.php';
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6">
            <div class="card " style="margin-top: 60px">
                <div class="card-header text-dark text-center">
                    ADD SUSPECT
                </div>
                <div class="card-body">
                    <?php
                    if (isset($message))
                        echo $message;
                    ?>
                    <form action="home.php" method="post">
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="text" name="names" required class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="text" name="identity" required class="form-control" id="pwd">
                        </div>
                        <div class="radio">
                            <label><input type="radio" checked value="Male" name="gender">Male</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" value="Female" name="gender">Female</label>
                        </div>
                        <div class="form_group">
                            <label> Type of Crime</label>
                            <select name="type"  class="form-control">
                                <option value="Traffic">Traffic</option>
                                <option value="Murder">Murder</option>
                                <option value="Stealing">Stealing</option>
                                <option value="Robbery">Robbery</option>
                                <option value="Other">Other</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <label> Describe The Crime</label>
                            <textarea name="crime" rows="5" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">ADD SUSPECT</button>
                        <p class="text-danger">
</body>
</html>
