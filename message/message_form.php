<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP 프로그래밍 입문</title>
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST'];?>/myhome/css/common.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST'];?>/myhome/message/css/message.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST'];?>/myhome/member/css/member.css">
    <script src="http://<?php echo $_SERVER['HTTP_HOST'];?>/myhome/js/vendor/modernizr.custom.min.js"></script>
    <script src="http://<?php echo $_SERVER['HTTP_HOST'];?>/myhome/js/vendor/jquery-1.10.2.min.js"></script>
    <script src="http://<?php echo $_SERVER['HTTP_HOST'];?>/myhome/js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <script type="text/javascript" src="http://<?php echo $_SERVER['HTTP_HOST'];?>/myhome/js/imgslide.js"></script>
    <script src="http://<?php echo $_SERVER['HTTP_HOST'];?>/myhome/message/js/message.js"></script>
</head>
<body>
    <header>

        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/header.php"; ?>
    </header>
    <?php
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
        <div id="message_box">
            <h3 id="write_title">
                쪽지 보내기
            </h3>
            <ul class="top_buttons">
                <li><span><a href="message_box.php?mode=rv">수신 쪽지함 </a></span></li>
                <li><span><a href="message_box.php?mode=send">송신 쪽지함</a></span></li>
            </ul>
            <form name="message_form" method="post" action="./message_insert.php">
                <div id="write_msg">
                    <ul>
                        <li>
                            <span class="col1">보내는 사람 : </span>
                            <span class="col2"><?=$userid?><input type="hidden" name="send_id" value="<?=$userid?>"></span>
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
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/footer.php"; ?>
    </footer>
</body>
</html>
