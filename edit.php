<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css">
    <title>sttabale</title>
</head>

<body>


    <?PHP
require_once("cone.php");
$edtingid = $_GET["IDno"];
$red = "SELECT * FROM stdname WHERE id ='$edtingid '";
$quary = mysqli_query($conn, $red);
$row = mysqli_fetch_assoc($quary);



if (isset($_POST["sub"])) {
    $fname = $_POST["st_name"];
    $lname = $_POST["st_roll"];
    $email = $_POST["st_email"];

    $img = $_FILES["st_img"]["name"];
    $tmp_name = $_FILES["st_img"]["tmp_name"];
    $upload = move_uploaded_file($tmp_name, 'upload/' . $img);
    if ($upload) {
        $update = "UPDATE stdname SET st_name='$fname',st_roll='$lname',st_email='$email',st_img='$img' WHERE id =$edtingid ";
        $runQuery = mysqli_query($conn, $update);
        if ($runQuery) {
            echo '<script>alert("data edit")</script>';
            header("location:index.php");

        }
        else {
            echo "<script>alert('data no edit')</script>";
        }
    }
    else {
        echo '<script>alert("data not edit")</script>';
    }
}

?>
    <div class="container my-4 p-4 shadow">
        <form class="from" action="" method="post" enctype="multipart/form-data">
            <input type="text" class="form-control mb-2" placeholder="Inter your name" name="st_name"
                value="<?php echo $row["st_name"]; ?>">
            <input type="text" class="form-control mb-2" placeholder="Inter your roll" name="st_roll"
                value="<?php echo $row["st_roll"]; ?>">
            <input type="email" class="from-control mb-2" placeholder="Inter your email" name="st_email"
                value="<?php echo $row["st_email"]; ?>">
            <label for="img">upload your img</label> <br />
            <input class="from-control mb-2" type="file" name="st_img" value="<?php echo $row["st_img"]; ?>">

            <input type="submit" value="update informetion" name="sub" class="form-control bg-warning" />
            </br>

        </form>
        <!--  -->
        <div class="container my-4 p-4 shadow">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Roll</th>
                        <th>email</th>
                        <th>img</th>

                    </tr>
                </thead>
                <?php
$red = "SELECT * FROM stdname";
$quary = mysqli_query($conn, $red);
while ($row = mysqli_fetch_array($quary)) { ?>
                <tbody>
                    <tr>

                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["st_name"]; ?></td>
                        <td><?php echo $row["st_roll"]; ?></td>
                        <td><?php echo $row["st_email"]; ?></td>
                        <td><img style="width: 50px; height: 50px;" src="upload/<?php echo $row["st_img"]; ?>"></td>
                    </tr>
                </tbody>

                <?php
}


?>
                <tbody>

                </tbody>

            </table>
        </div>
</body>

</html>