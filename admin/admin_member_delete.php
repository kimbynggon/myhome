<?php
session_start();
if ($_SESSION['userlevel'] !== '1' && !isset($_SESSION['userlevel'])) {
    echo("
            <script>
            alert('관리자가 아닙니다! 회원 삭제는 관리자만 가능합니다!');
            history.go(-1)
            </script>
        ");
    exit;
}

$num = $_GET["num"];
include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/db/db_connector.php";
//    $con = mysqli_connect("localhost", "user1", "12345", "sample");
$sql = "delete from members where num = '$num'";
mysqli_query($con, $sql);

mysqli_close($con);

echo "
	     <script>
	         location.href = 'admin.php';
	     </script>
	   ";
?>

