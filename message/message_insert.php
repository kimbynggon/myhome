<meta charset='utf-8'>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/db/db_connector.php";

if (!($_SERVER["REQUEST_METHOD"] === "POST")) {
    alert_back("메소드 방식이 올바르지 않습니다.");
}else {
    if (!isset($_POST['send_id'])) {
        alert_back("send_id 값을 불러올수 없습니다.");
    }
    if (!isset($_POST['rv_id'])) {
        alert_back("rv_id 값을 불러올수 업습니다.");
    }
    if (!isset($_POST['subject'])) {
        alert_back("subject 값을 불러올수 없습니다.");
    }
    if (!isset($_POST['content'])) {
        alert_back("content 값을 불러올수 없습니다.");
    }

    $send_id = $_POST["send_id"];//보내는사람
    $rv_id = $_POST['rv_id'];//빋는사람
    $subject = $_POST['subject'];//쪽지주제
    $content = $_POST['content'];//쪽지내용
}

test_input($subject);
test_input($content);

$subject = htmlspecialchars($subject, ENT_QUOTES);
$content = htmlspecialchars($content, ENT_QUOTES);
$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

//if (!$send_id) {
//    echo("
//			<script>
//			alert('로그인 후 이용해 주십시오! ');
//			history.go(-1)
//			</script>
//			");
//    exit;
//}

//$con = mysqli_connect("localhost", "user1", "12345", "sample");
//받는사람이 멤버테이블에 실제로 존재하는지 점검
$sql = "select * from members where id='$rv_id'";
$result = mysqli_query($con, $sql);
//레코드셋에 갯수를 체크해서 넘겨준다.
$num_record = mysqli_num_rows($result);

if ($num_record) {
    $sql = "insert into message (send_id, rv_id, subject, content,  regist_day) ";
    $sql .= "values('$send_id', '$rv_id', '$subject', '$content', '$regist_day')";
    mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
} else {
    //수신아이디가 잘못되었다는 처리문
    echo("
			<script>
			alert('받는 아이디가 잘못되었습니다.');
			history.go(-1)
			</script>
			");
    exit;
}

mysqli_close($con);                // DB 연결 끊기

echo "
	   <script>
	    location.href = './message_box.php?mode=send';
	   </script>
	";
?>

  
