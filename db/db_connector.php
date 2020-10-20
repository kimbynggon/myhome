<?php
//1. 테이터 베이스 시간설정
date_default_timezone_set("Asia/Seoul");

$servername = "localhost";
$username = "root";
$password = "enqkfwkdb7&";

//2.데이터 베이스에 접속한다. 데이터베이스 생성기능 부여및 오류처리
$con = mysqli_connect($servername, $username, $password);
if (!$con) {
    die("connet faild" . mysqli_connect_error());
}

//데이터 베이스 확인하기
$database_flag = false;
$sql = "show databases";
$result = mysqli_query($con, $sql) or die("에러" . mysqli_error($con));
while ($row = mysqli_fetch_array($result)) {
    if ($row["Database"] == "sample") {
        $database_flag = true;
        break;
    }
}

//4. 데이터베이스가 없으면 만들기
if ($database_flag === false) {
    $sql = "create database sample";
    $value = mysqli_query($con, $sql);
    if ($value === true) {
        echo "<script> alert('sample 데이터베이스가 생성되었습니다.');</script>";
    }
}

//5. 데이터베이스 접속하기
$dbcon = mysqli_select_db($con, 'sample') or die("에러" . mysqli_error($con));
if (!$dbcon) {
    echo "<script> alert('sample 데이터베이스가 선택되었습니다.');</script>";
}
function alert_back($message)
{
    echo("<script>alert('$message'); history.go(-1)</script>");
}
//trim : 공백을 없애준다
// striplashes : 슬래시를 없애준다.
// htmlspecialchars : 특수문자를 아스키코드처럼 변경해준다.
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>