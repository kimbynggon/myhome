<?php
//
//$num = $_GET["num"];
//$page = $_GET["page"];
//
//session_start();
//
//include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/db/db_connector.php";
////    $con = mysqli_connect("localhost", "user1", "12345", "sample");
//$sql = "select * from board where num = $num";
//$result = mysqli_query($con, $sql);
//$row = mysqli_fetch_array($result);
//
//$copied_name = $row["file_copied"];
//$id = $row["id"];
//if (!isset($_SESSION["userid"]) || $_SESSION["userlevel"] !== '1' && $_SESSION["userid"] !== $id){
//    alert_back("접근 권한이 없습니다");
//    mysqli_close($con);
//}
//$copied_name = $row["file_copied"];
////해당된 파일을 찾아서 삭제처리해준다
//if ($copied_name) {
//    $file_path = "./data/" . $copied_name;
//    unlink($file_path);
//}
//
//$sql = "delete from board where num = $num";
//mysqli_query($con, $sql);
//mysqli_close($con);
//
//echo "
//	     <script>
//	         location.href = 'board_list.php?page=$page';
//	     </script>
//	   ";
//?>
<!---->
