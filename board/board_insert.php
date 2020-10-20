<!--<meta charset="utf-8">-->
<?php
//include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/db/db_connector.php";
//include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/db/create_table.php";
////게시판 테이블 생성하기
//create_table($con, 'board');
//session_start();
//if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
//else $userid = "";
//if (isset($_SESSION["username"])) $username = $_SESSION["username"];
//else $username = "";
//
//if (!$userid) {
//    echo("
//                    <script>
//                    alert('게시판 글쓰기는 로그인 후 이용해 주세요!');
//                    history.go(-1)
//                    </script>
//        ");
//    exit;
//}
//
//$subject = $_POST["subject"];
//$content = $_POST["content"];
//
//$subject = test_input($subject);
//$content = test_input($content);
//
//$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
//
//$upload_dir = './data/';
//
////파일을 임시로 저장해놓는다.
//$upfile_name = $_FILES["upfile"]["name"];
//$upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
//$upfile_type = $_FILES["upfile"]["type"];
//$upfile_size = $_FILES["upfile"]["size"];
//$upfile_error = $_FILES["upfile"]["error"];
////echo "upfile_tmp_name = {$upfile_tmp_name}";
//
//if ($upfile_name && !$upfile_error) {
//    $file = explode(".", $upfile_name);
//    $file_name = $file[0];//파일명
//    $file_ext = $file[1];//파일확장자
//
//    //더 정확하게 하는법 랜덤?을붙힌다 /이름을 붙힌다.
//    $new_file_name = date("Y_m_d_H_i_s");
//
//    $new_file_name = $new_file_name . "_" . $file_name;
//    $copied_file_name = $new_file_name . "." . $file_ext;
//    $uploaded_file = $upload_dir . $copied_file_name;
//
////    $uploaded_file <- ./data/2020_09_23_11_10_20_message.sql
//    if ($upfile_size > 1000000) {
//        echo("
//				<script>
//				alert('업로드 파일 크기가 지정된 용량(1MB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
//				history.go(-1)
//				</script>
//				");
//        exit;
//    }
//
//    //버퍼에있는 파일을 덮어준다.
//    if (!move_uploaded_file($upfile_tmp_name, $uploaded_file)) {
//        echo("
//					<script>
//					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
//					history.go(-1)
//					</script>
//				");
//        exit;
//    }
//} else {
//    $upfile_name = "";
//    $upfile_type = "";
//    $copied_file_name = "";
//}
//
////	$con = mysqli_connect("localhost", "user1", "12345", "sample");
//
//$sql = "insert into board (id, name, subject, content, regist_day, hit, file_name, file_type, file_copied) ";
//$sql .= "values('$userid', '$username', '$subject', '$content', '$regist_day', 0, ";
//$sql .= "'$upfile_name', '$upfile_type', '$copied_file_name')";
//mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
//
//// 포인트 부여하기
//$point_up = 100;
//
//$sql = "select point from members where id='$userid'";
//$result = mysqli_query($con, $sql);
//$row = mysqli_fetch_array($result);
//$new_point = $row["point"] + $point_up;
//
//$sql = "update members set point=$new_point where id='$userid'";
//mysqli_query($con, $sql);
//
//mysqli_close($con);                // DB 연결 끊기
//
//echo "
//	   <script>
//	    location.href = 'board_list.php';
//	   </script>
//	";
//?>
<!---->
<!--  -->
