<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP 프로그래밍 입문</title>
    <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST']; ?>/myhome/css/common.css">
    <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST']; ?>/myhome/member/css/member.css">
    <link rel="stylesheet" type="text/css" href="./css/message.css">
    <script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/myhome/js/vendor/modernizr.custom.min.js"></script>
    <script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/myhome/js/vendor/jquery-1.10.2.min.js"></script>
    <script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/myhome/js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/myhome/js/imgslide.js"></script>
    <script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/myhome/message/js/message.js"></script>
    <script>
        function check_input() {
            if (!document.message_form.subject.value) {
                alert("제목을 입력하세요!");
                document.message_form.subject.focus();
                return;
            }
            if (!document.message_form.content.value) {
                alert("내용을 입력하세요!");
                document.message_form.content.focus();
                return;
            }
            document.message_form.submit();
        }
    </script>
</head>
<body>
    <header>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/header.php"; ?>
    </header>


    <section>
        <div id="message_box">
            <h3 id="write_title">
               수정
            </h3>
            <?php
            include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/db/db_connector.php";
            $num = $_GET["num"];

            $sql = "select * from message where num=$num";
            $result = mysqli_query($con, $sql);

            $row = mysqli_fetch_array($result);

            $send_id = $row["send_id"];
            $rv_id = $row["rv_id"];
            $subject = $row["subject"];
            $content = $row["content"];


            $result2 = mysqli_query($con, "select name from members where id='$send_id'");
            $record = mysqli_fetch_array($result2);
            $send_name = $record["name"];
            ?>
            <form name="message_form" method="post" action="message_update.php">
                <input type="hidden" name="send_id" value="<?= $userid ?>">
                <input type="hidden" name="rv_id" value="<?= $rv_id ?>">
                <input type="hidden" name="num" value="<?= $num?>">
                <div id="write_msg">
                    <ul>
                        <li>
                            <span class="col1">보내는 사람 : </span>
                            <span class="col2"><?= $userid ?></span>
                        </li>
                        <li>
                            <span class="col1">수신 아이디 : </span>
                            <span class="col2"><?= $send_id ?>(<?= $userid ?>)</span>
                        </li>
                        <li>
                            <span class="col1">제목 : </span>
                            <span class="col2"><input name="subject" type="text" value="<?= $subject ?>"></span>
                        </li>
                        <li id="text_area">
                            <span class="col1">글 내용 : </span>
                            <span class="col2">
	    				<textarea name="content"><?= $content ?></textarea>
	    			</span>
                        </li>
                    </ul>
                    <button type="button" onclick="check_input()">보내기</button>
                </div>
            </form>
        </div> <!-- message_box -->
    </section>
    <footer>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/footer.php"; ?>
    </footer>
</body>
</html>
