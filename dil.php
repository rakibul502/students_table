<?PHP
//Database Connection start
require_once("cone.php");

$getD = $_GET["id"];
//dlfulder img
$dlimg = $_GET["img"];

$deleted = " DELETE FROM stdname WHERE id=$getD";
$run = mysqli_query($conn, $deleted);
if ($run) {
    unlink("upload/$dlimg");
    header("location: index.php");
}
?>