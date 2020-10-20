<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/db/db_connector.php";
$rv = $_POST['rv_id'];
$subject = $_POST['subject'];
$content = $_POST['content'];
$num = $_POST['num'];

$mode = $_GET['mode'];

$sql = "select * from members where id='$rv'";
$result = mysqli_query($con, $sql);
$row = mysqli_num_rows($result);

if ($row) {
    $sql = "update message set  subject='$subject',content='$content' where num='$num'";
    mysqli_query($con, $sql);
} else {
    alert_back("수신아이디가 없습니다.");
}
echo "
    <script>
    location = 'message_box.php?mode=send';
    </script>";

?>