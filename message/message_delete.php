﻿<meta charset='utf-8'>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/db/db_connector.php";

$num = $_GET["num"];

$mode = $_GET["mode"];


//	$con = mysqli_connect("localhost", "user1", "12345", "sample");


$sql = "delete from message where num=$num";

mysqli_query($con, $sql);

mysqli_close($con);                // DB 연결 끊기


if ($mode == "send")

    $url = "./message_box.php?mode=send";

else

    $url = "./message_box.php?mode=rv";


echo "

	<script>
//message_box.php?mode=$mode 도 가능하다
		location.href = '$url';
	</script>

	";

?>

  
