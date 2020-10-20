<?php
$num = $_GET["num"];
$page = $_GET["page"];

$title = $_POST["title"];
$text = $_POST["text"];
include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/db/db_connector.php";
//    $con = mysqli_connect("localhost", "user1", "12345", "sample");
$sql = "update notice set title='$title', text='$text' ";
$sql .= " where num=$num";
mysqli_query($con, $sql);

mysqli_close($con);

echo "
	      <script>
	          location.href = 'notice_list.php?page=$page';
	      </script>
	  ";
?>

   
