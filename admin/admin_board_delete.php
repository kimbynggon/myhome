<?php
    session_start();
if ($_SESSION["userlevel"] !== '1' && !isset($_SESSION["userlevel"])) {
    alert_back("삭제 권한이 없습니다.!");
    exit;
}

    if (isset($_POST["item"]))
        $num_item = count($_POST["item"]); 
    else
        alert_back("삭제할 게시물을 선택해주세요.!");
    include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/db/db_connector.php";
//    $con = mysqli_connect("localhost", "user1", "12345", "sample");

    for($i=0; $i<count($_POST["item"]); $i++){
        $num = $_POST["item"][$i];

        $sql = "select * from board where num = '$num'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result);

        $copied_name = $row["file_copied"];

        if ($copied_name)
        {
            $file_path = "./data/".$copied_name;
            unlink($file_path);
        }

        $sql = "delete from board where num = '$num'";
        mysqli_query($con, $sql);
    }       

    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'admin.php';
	     </script>
	   ";
?>

