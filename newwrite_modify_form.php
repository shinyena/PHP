<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8">
    <title>CHATTING</title>
    <style>
    * { padding: 0; margin: 0;}
    a { text-decoration: none; color: black;}
    #box { width: 600px; margin: 0 auto;}
    #top { padding: 10px; text-align: right; font-size: 12px;}
    #menu { width: 80%; height: 48px; margin: 0 auto;
        background-color: #ffbe10; font-weight: bold;
        border-radius: 10px; margin-bottom: 10px;}
    #menu ul {text-align: center; padding-top: 13px;}
    #menu li { display: inline; margin: 10px; color: white; font-size: 14px;}

    #write { width: 75%; height: 470px; margin: 0 auto;
        border: 1px solid #ccc; padding: 20px;}
    #write textarea {width: 95%; height: 300px; margin: 0 auto; 
        margin: 20px 0 0 0; font-size: 18px; padding: 10px;}
    #write #confirm {text-align: right;}
    #write #confirm img { width: 90px; height: 30px;}
    </style>

    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script>
    function check_input() {
        if (! $("#content").val()) {
            alert("내용을 입력하세요!");    
            $("#content").focus();
            return;
        }
        $("#write").submit();
    }
    </script>
</head>
<body>
    <?php
        include_once "db_con.php";
        include_once "config.php";
        $logged = $username."(".$userid.")";
    ?>
    <div id="box">
        <div id="top">
            <a href="member_modify_form.php"><?=$logged?>님</a>
            &nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="logout.php">로그아웃</a>
        </div>
        <div id="menu">
            <ul>  
                <li><a href="newmain.php" style="color:white">HOME</a></li>
                <li>|</li>
                <li><a href="newwrite.php" style="color:black">작성하기</a></li> 
                <li>|</li>                               
                <li><a href="chat.php" style="color:white">채팅하기</a></li>
            </ul>
        </div>
        <?php
            $num  = $_GET["num"];
            
            $sql = "select * from newboard where num=$num";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($result);
            $name       = $row["name"];
            $content    = $row["content"];		
            $file_name  = $row["file_name"];
        ?>
        <form id="write" name="write" method="post" action="newwrite_modify.php?num=<?=$num?>" enctype="multipart/form-data">
            <span style="font-weight: bold"><?=$logged?></span>
            <textarea id="content" name="content" placeholder="내용을 입력하시오"><?=$content?></textarea>
            <p style="font-size: 12px">첨부파일: <?=$file_name?></p>
            <br>
            <div id="confirm">
                <a href="#"><img src="img/lets_confirm.png" onclick="check_input()"></a>
            </div> 
        </form>
    </div>
</body>
</html>