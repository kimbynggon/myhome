<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP 프로그래밍 입문</title>
    <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST']; ?>/myhome/css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/notice.css">
    <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST']; ?>/myhome/member/css/member.css">
    <script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/myhome/js/vendor/modernizr.custom.min.js"></script>
    <script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/myhome/js/vendor/jquery-1.10.2.min.js"></script>
    <script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/myhome/js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <script type="text/javascript" src="./js/notice.js"></script>
</head>
<body>
    <header>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/header.php"; ?>
    </header>
    <section>
        <div id="board_box">
            <h3 id="board_title">
                게시판 > 글 쓰기
            </h3>
            <?php
            $num = $_GET["num"];
            $page = $_GET["page"];
            include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/db/db_connector.php";
            //	$con = mysqli_connect("localhost", "user1", "12345", "sample");
            $sql = "select * from notice where num=$num";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);
            $name = $row["name"];
            $title = $row["title"];
            $text = $row["text"];
            $file_name = $row["file_name"];
            ?>
            <form name="board_form" method="post" action="notice_modify.php?num=<?= $num ?>&page=<?= $page ?>"
                  enctype="multipart/form-data">
                <ul id="board_form">
                    <li>
                        <span class="col1">이름 : </span>
                        <span class="col2"><?= $name ?></span>
                    </li>
                    <li>
                        <span class="col1">제목 : </span>
                        <span class="col2"><input name="title" type="text" value="<?= $title ?>"></span>
                    </li>
                    <li id="text_area">
                        <span class="col1">내용 : </span>
                        <span class="col2">
	    				<textarea name="text"><?= $text ?></textarea>
	    			</span>
                    </li>
                    <li>
                        <span class="col1"> 첨부 파일 : </span>
                        <span class="col2"><?= $file_name ?></span>
                    </li>
                </ul>
                <ul class="buttons">
                    <li>
                        <button type="button" onclick="check_input()">수정하기</button>
                    </li>
                    <li>
                        <button type="button" onclick="location.href='notice_list.php'">목록</button>
                    </li>
                </ul>
            </form>
        </div> <!-- board_box -->
    </section>
    <footer>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/footer.php"; ?>
    </footer>
</body>
</html>
