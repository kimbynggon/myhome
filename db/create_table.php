<?php
function create_table($con, $table_name)
{
    $flag = false;
    $sql = "show tables from sample";
    $result = mysqli_query($con, $sql) or die('Error' . mysqli_error($con));

    //반복문을 통해서 레코드셋엣 한 레코드씩 가져와서 첫번째 필드내용을 조사해서 해당된 테이블명이 있는지 확인한다.
    while ($row = mysqli_fetch_row($result)) {
        if ($row[0] === "$table_name") {
            $flag = true;
            break;
        }
    }
//    해당된 테이블이 없으면 해당 테이블을 찿아서 테이블 쿼리문을 작성한다.
    if ($flag === false) {
        switch ($table_name) {
            case 'message':
                $sql = "create table message ( num int not null auto_increment, 
                        `num` int(11) NOT NULL AUTO_INCREMENT,
                      `send_id` char(20) NOT NULL,
                      `rv_id` char(20) NOT NULL,
                      `subject` char(200) NOT NULL,
                      `content` text NOT NULL,
                      `regist_day` char(20) DEFAULT NULL,
                      PRIMARY KEY (`num`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;";
                break;
            case 'imsitable':
                $sql = "";
                break;
            case 'board':
                $sql = "create table board(
                    `num` int(11) NOT NULL AUTO_INCREMENT,
                      `id` char(15) NOT NULL,
                      `name` char(10) NOT NULL,
                      `subject` char(200) NOT NULL,
                      `content` text NOT NULL,
                      `regist_day` char(20) NOT NULL,
                      `hit` int(11) NOT NULL,
                      `file_name` char(40) DEFAULT NULL,
                      `file_type` char(40) DEFAULT NULL,
                      `file_copied` char(40) DEFAULT NULL,
                      PRIMARY KEY (`num`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
                break;
            case 'notice':
                $sql = "create table notice(
                    `num` int(11) NOT NULL AUTO_INCREMENT,
                      `id` char(15) NOT NULL,
                      `name` char(10) NOT NULL,
                      `title` char(200) NOT NULL,
                      `text` text NOT NULL,
                      `regist_day` char(20) NOT NULL,
                      `hit` int(11) NOT NULL,
                      `file_name` char(40) DEFAULT NULL,
                      `file_type` char(40) DEFAULT NULL,
                      `file_copied` char(40) DEFAULT NULL,
                      PRIMARY KEY (`num`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
                break;
            case 'free' :
                $sql = "CREATE TABLE `free` (
                        `num` int(11) NOT NULL AUTO_INCREMENT,
                        `id` char(15) NOT NULL,
                        `name` char(10) NOT NULL,
                        `nick` char(10) NOT NULL,
                        `subject` varchar(100) NOT NULL,
                        `content` text NOT NULL,
                        `regist_day` char(20) DEFAULT NULL,
                        `hit` int(11) DEFAULT NULL,
                        `is_html` char(1) DEFAULT NULL,
                        `file_name_0` char(40) DEFAULT NULL,
                        `file_copied_0` char(30) DEFAULT NULL,
                        `file_type_0` char(30) DEFAULT NULL,
                        PRIMARY KEY (`num`)
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                break;
            case 'free_ripple' :
                $sql = "CREATE TABLE `free_ripple` (
                        `num` int(11) NOT NULL AUTO_INCREMENT,
                        `parent` int(11) NOT NULL,
                        `id` char(15) NOT NULL,
                        `name` char(10) NOT NULL,
                        `nick` char(10) NOT NULL,
                        `content` text NOT NULL,
                        `regist_day` char(20) DEFAULT NULL,
                        PRIMARY KEY (`num`)
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
                break;

            default :
                echo "<scritp>alert('해당테이블명이 없습니다.')</scritp>";
                break;
        }//switch
    }//if(flag)
    if (mysqli_query($con, $sql)) {
        echo "<scritp>alert('[$table_name] 해당테이블명이 생성되었습니다.')</scritp>";
    } else {
        echo "테이블 생성원인" . mysqli_error($con);
    }

}

?>