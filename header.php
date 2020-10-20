<script>
    function delete_member(){
        var result = confirm("탈퇴하시겠습니까?");
        if (result){
            location.href = 'delete.php';
        }
    }
</script>

<?php
session_start();
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";
if (isset($_SESSION["username"])) $username = $_SESSION["username"];
else $username = "";
if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
else $userlevel = "";
if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
else $userpoint = "";

?>

<div id="top">
    <h3>
        <a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/myhome/index.php">KBG 사이트</a>
    </h3>
    <ul id="top_menu">
        <?php
        if (!$userid) {
            ?>
            <li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/myhome/member/signup.php">회원 가입</a></li>
            <li> |</li>
            <li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/myhome/login/login_form.php">로그인</a></li>
            <?php
        } else {
            $logged = $username . "(" . $userid . ")님[Level:" . $userlevel . ", Point:" . $userpoint . "]";

            ?>
            <li><?= $logged ?> </li>
            <li> |</li>
            <li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/myhome/login/logout.php">로그아웃</a></li>
            <li> |</li>
            <li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/myhome/member/member_modify_form.php">정보 수정</a></li>
            <li> |</li>
            <li><a href="#" onclick="delete_member()">회원탈퇴</a></li>
            <?php
        }
        ?>
        <?php
        if ($userlevel == 1) {
            ?>
            <li> |</li>
            <li><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/myhome/admin/admin.php">관리자 모드</a></li>
            <?php
        }
        ?>
    </ul>

</div>
<div id="menu_bar">
    <ul>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/myhome/index.php">HOME</a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/myhome/message/message_form.php">커뮤니티</a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/myhome/board/board_list.php">게시판</a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/myhome/notice/notice_list.php">공지사항</a></li>
        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>/myhome/free/list.php">QnA</a></li>
    </ul>
</div>
<div class="slideshow">
    <div class="slideshow_img">
        <a class="slide_a"><img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/myhome/image/main_img1.png"></a>
        <a class="slide_a"><img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/myhome/image/main_img2.png"></a>
        <a class="slide_a"><img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/myhome/image/main_img3.png"></a>
        <a class="slide_a"><img src="http://<?php echo $_SERVER['HTTP_HOST'];?>/myhome/image/main_img4.png"></a>
    </div>
    <div class="slideshow_nav">
        <a href="#" class="prev"></a>
        <a href="#" class="next"></a>
    </div>
    <div class="slideshow_indicator">
        <a href="#" class="active"></a>
        <a href="#"></a>
        <a href="#"></a>
        <a href="#"></a>
    </div>
</div>