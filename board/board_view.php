<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP 프로그래밍 입문</title>
    <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST']; ?>/myhome/css/common.css">
    <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST']; ?>/myhome/board/css/board.css">
    <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST']; ?>/myhome/member/css/member.css">
    <script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/myhome/js/vendor/modernizr.custom.min.js"></script>
    <script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/myhome/js/vendor/jquery-1.10.2.min.js"></script>
    <script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/myhome/js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <script type="text/javascript" src="./js/board.js"></script>
</head>
<body>
    <header>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/header.php"; ?>
    </header>
    <section>
        <div id="board_box">
            <h3 class="title">
                게시판 > 내용보기
            </h3>
            <?php
            include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/db/db_connector.php";
            $num = $_GET["num"];
            $page = $_GET["page"];

            //	$con = mysqli_connect("localhost", "user1", "12345", "sample");
            $sql = "select * from board where num='$num'";
            $result = mysqli_query($con, $sql);

            $row = mysqli_fetch_array($result);
            $id = $row["id"];
            $name = $row["name"];
            $regist_day = $row["regist_day"];
            $subject = $row["subject"];
            $content = $row["content"];
            $file_name = $row["file_name"];
            $file_type = $row["file_type"];
            $file_copied = $row["file_copied"];//데이터에 저장되어 있는 이름
            $hit = $row["hit"];

            $content = str_replace(" ", "&nbsp;", $content);
            $content = str_replace("\n", "<br>", $content);

            $new_hit = $hit + 1;
            $sql = "update board set hit=$new_hit where num='$num'";
            mysqli_query($con, $sql);
            ?>
            <ul id="view_content">
                <li>
                    <span class="col1"><b>제목 :</b> <?= $subject ?></span>
                    <span class="col2"><?= $name ?> | <?= $regist_day ?></span>
                </li>
                <li>
                    <?php
                    if (isset($_SESSION["date"]) || $file_name) {
                        $real_name = $file_copied;
                        $file_path = "./data/" . $real_name;
                        $file_size = filesize($file_path);//filesize php 라이브러리 함수

                        echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
			       		<a href='board_download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
                    }
                    ?>
                    <?= $content ?>
                </li>
            </ul>
            <ul class="buttons">
                <li>
                    <button onclick="location.href='board_list.php?page=<?= $page ?>'">목록</button>
                </li>
                    <li>
                        <button onclick="location.href='board_modify_form.php?num=<?= $num ?>&page=<?= $page ?>'">수정
                        </button>
                    </li>
                <form name="board_form" method="post" action="dml_board.php?num=<?= $num ?>&page=<?= $page ?>"
                      enctype="multipart/form-data">
                    <li>
                        <button >삭제</button>
                        <input type="hidden" name="mode" value="delete">
                    </li>
                </form>
                <li>
                    <button onclick="location.href='board_form.php'">글쓰기</button>
                </li>
            </ul>
        </div> <!-- board_box -->
    </section>
    <footer>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/footer.php"; ?>
    </footer>
</body>
</html>
