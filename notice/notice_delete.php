<?php

$num = $_GET["num"];
$page = $_GET["page"];
include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/db/db_connector.php";
//    $con = mysqli_connect("localhost", "user1", "12345", "sample");
$sql = "select * from notice where num = $num";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

$copied_name = $row["file_copied"];

//$id = $row["id"];
//유저 아이디와 위에서 선언한 초기값을 비교해서 같은지 아닌지 비교한다.(관리자)
//if (!isset($_SESSION["userid"]) || $_SESSION["userid"]!==$id || $_SESSION["userid"]) {
//
//}

if ($copied_name) {
    $file_path = "./data/" . $copied_name;
    unlink($file_path);
}

$sql = "delete from notice where num = $num";
mysqli_query($con, $sql);
mysqli_close($con);

echo "
	     <script>
	         location.href = 'notice_list.php?page=$page';
	     </script>
	   ";
?>