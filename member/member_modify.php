<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/db/db_connector.php";
$id = $_POST["id"];

$pass = $_POST["pass"];
$name = $_POST["name"];
$email1 = $_POST["email1"];
$email2 = $_POST["email2"];

$email = $email1 . "@" . $email2;

//$con = mysqli_connect("localhost", "root", "enqkfwkdb7&", "sample");
$sql = "update members set pass='$pass', name='$name' , email='$email'";
$sql .= " where id='$id'";
$value = mysqli_query($con, $sql) or die('Error' . mysqli_error($con));
if ($value) {
    session_start();
    $_SESSION["username"] = $name;
} else {
    echo "<script>alert('수정중 오류발생!'); history . go(-1);</script>";

}
mysqli_close($con);

include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/index.php";
?>

   
