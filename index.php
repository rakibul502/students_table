<?php

require_once("cone.php");

if (isset($_POST['sub'])) {
    $name = $_POST['st_name'];
    $roll = $_POST['st_roll'];
    $email = $_POST['st_email'];

    $img = $_FILES["st_img"]["name"];
    $tmp_name = $_FILES["st_img"]["tmp_name"];
    move_uploaded_file($tmp_name, 'upload/' . $img);
    $quary = "INSERT INTO stdname (st_name, st_roll, st_email,st_img) VALUES ('$name', '$roll', '$email','$img')";
    $cun = mysqli_query($conn, $quary);

}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.rtl.min.css">
    <title>insart data</title>
</head>

<body>
    <div class="container my-4 p-4 shadow">

        <h2><a style="text-decoration: none;" href="">Darunit students</a></h2>
        <form class="from" action="" method="post" enctype="multipart/form-data">
            <input type="text" class="form-control mb-2" placeholder="Inter your name" name="st_name">
            <input type="text" class="form-control mb-2" placeholder="Inter your roll" name="st_roll">
            <input type="email" class="from-control mb-2" placeholder="Inter your email" name="st_email">
            <label for="img">upload your img</label> <br />
            <input class="from-control mb-2" type="file" name="st_img">
            <input type="hidden" name="st_id" value="">
            <input type="submit" value="update informetion" name="sub" class="form-control bg-warning" />
            </br>

        </form>
        <!-- //earch// -->
        <div class="input-group">
            <div class="form-outline">
                <form method="POST">
                    <input name="Search" class="from-control mb-2" type="search" placeholder="search" />
            </div>
            <button name="B_Search" class="btn btn-danger">Search</button>
            </form>
        </div>
    </div>


    <!-- tabale -->
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
//serch
$serch_name = "";
if (isset($_POST["B_Search"])) {
    $serch_name = $_POST["Search"];

}



$red = "SELECT * FROM stdname WHERE st_name LIKE '%$serch_name%'  ORDER BY id DESC";
$quary = mysqli_query($conn, $red);
$i=1;
while ($row = mysqli_fetch_array($quary)) { ?>
            <tbody>
                <tr>

                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["st_name"]; ?></td>
                    <td><del><?php echo $row["st_roll"]; ?></del></td>
                    <td><?php echo $row["st_email"]; ?></td>
                    <td><img style="width: 50px; height: 50px;" src="upload/<?php echo $row["st_img"]; ?>"></td>

                    <td>
                        <a onclick=" " style="text-decoration: none;" href="edit.php?IDno=<?php echo $row["id"]; ?>"
                            class="btn btn-primary">Edit</a>
                        <a onclick="" style="text-decoration: none;"
                            href="dil.php?id=<?php echo $row["id"]; ?>&img<?php echo $row["st_img"]; ?>"
                            class="btn btn-danger">Delit</a>
                    </td>
                </tr>
            </tbody>

            <?php
            $i++;
}


?>
            <tbody>

            </tbody>

        </table>









</body>

</html>