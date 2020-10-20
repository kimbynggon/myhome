<?php
include_once "./db/db_connector.php";
session_start();
$userid = $_SESSION["userid"];
$sql = "delete from members where id = '$userid'";
$value = mysqli_query($con, $sql) or die("Error" . mysqli_error($con));
if ($value) {
    unset($_SESSION["userid"]);
    unset($_SESSION["username"]);
    unset($_SESSION["userlevel"]);
    unset($_SESSION["userpoint"]);
    echo "<script>alert('삭제되었습니다.!'); location.href = 'index.php'; </script>";

}
?>
