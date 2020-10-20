<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP 프로그래밍 입문</title>
    <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'];?>/myhome/common.css">
    <link rel="stylesheet" type="text/css" href="http://<?= $_SERVER['HTTP_HOST'];?>/myhome/message.css">
    <script src=<?php echo $_SERVER['HTTP_HOST'];?>/myhome/js/message.js"></script>
    <script>
        function check_input() {
            if (!document.message_form.rv_id.value) {
                alert("수신 아이디를 입력하세요!");
                document.message_form.rv_id.focus();
                return;
            }
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
        <?php include $_SERVER['DOCUMENT_ROOT'] ."/myhome/header.php"; ?>
    </header>
    <?php
    //테이블명을 불러온다.
    include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/db/db_connector.php";
    include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/db/create_table.php";

    create_table($con, 'message');

    if (!$userid) {
        echo("<script>
				alert('로그인 후 이용해주세요!');
				history.go(-1);
				</script>
			");
        exit;
    }
    ?>
    <section>
        <div id="main_img_bar">
            <img src="http://<?= $_SERVER['HTTP_HOST'];?>/myhome/image/main_img.png">
        </div>
        <div id="message_box">
            <h3 id="write_title">
                쪽지 보내기
            </h3>
            <ul class="top_buttons">
                <li><span><a href="http://<?= $_SERVER['HTTP_HOST'];?>/myhome/message/message_box.php?mode=rv">수신 쪽지함 </a></span></li>
                <li><span><a href="http://<?= $_SERVER['HTTP_HOST'];?>/myhome/message/message_box.php?mode=send">송신 쪽지함</a></span></li>
            </ul>
            <form name="message_form" method="post" action="http://<?= $_SERVER['HTTP_HOST'];?>/myhome/message/message_insert.php?send_id=<?= $userid ?>">
                <div id="write_msg">
                    <ul>
                        <li>
                            <span class="col1">보내는 사람 : </span>
                            <span class="col2"><?= $userid ?></span>
                            <input name="rv_id" type="hidden" value="<?=$userid?>">
                        </li>
                        <li>
                            <span class="col1">수신 아이디 : </span>
                            <span class="col2"><input name="rv_id" type="text"></span>
                        </li>
                        <li>
                            <span class="col1">제목 : </span>
                            <span class="col2"><input name="subject" type="text"></span>
                        </li>
                        <li id="text_area">
                            <span class="col1">내용 : </span>
                            <span class="col2">
	    				<textarea name="content"></textarea>
	    			</span>
                        </li>
                    </ul>
                    <button type="button" onclick="check_input()">보내기</button>
                </div>
            </form>
        </div> <!-- message_box -->
    </section>
    <footer>
        <?php include  $_SERVER['DOCUMENT_ROOT']."myhome/footer.php"; ?>
    </footer>
</body>
</html>
