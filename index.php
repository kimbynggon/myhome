<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>KBG 사이트</title>
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/myhome/css/common.css">
    <link rel="stylesheet" type="text/css" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/myhome/css/main.css">
    <script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/myhome/js/vendor/modernizr.custom.min.js"></script>
    <script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/myhome/js/vendor/jquery-1.10.2.min.js"></script>
    <script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/myhome/js/vendor/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/myhome/js/imgslide.js"></script>
    <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/myhome/member/css/member.css">
</head>
<body>
    <header>
<!--        --><?//=$_SERVER['DOCUMENT_ROOT']?>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/header.php"; ?>
    </header>
    <section>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/main.php"; ?>
    </section>
    <footer>
        <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/myhome/footer.php"; ?>
    </footer>
</body>
</html>
