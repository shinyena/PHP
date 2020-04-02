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
    
    #view { overflow:auto; width: 75%; height: 470px; margin: 0 auto;
        border: 1px solid #ccc; padding: 20px;}
    #view #profile span {font-weight: bold; font-size: 14px;}
    #view #profile ul {text-align: right; font-size: 10px;}
    #view #profile li { list-style:none; display: inline; margin: 5px; }
    #view #content_form {border: 1px solid #ccc; padding: 20px;}
    #view #file_img {text-align: center; margin: 10px;}
    #view #file_img img {width:50%; height:40;}
    </style>
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
                <li><a href="newmain.php" style="color:black">HOME</a></li>
                <li>|</li>
                <li><a href="newwrite.php" style="color:white">작성하기</a></li> 
                <li>|</li>                               
                <li><a href="chat.php" style="color:white">채팅하기</a></li>
            </ul>
        </div>
        <div id="view">
        
        <?php
            $sql = "select * from newboard order by num desc";
            $result = mysqli_query($con, $sql);
            $total_record = mysqli_num_rows($result); // 전체 글 수

            for ($i=0; $i<$total_record; $i++) {
                mysqli_data_seek($result, $i);
                $row = mysqli_fetch_array($result);
                $num         = $row["num"];
                $id          = $row["id"];
                $name        = $row["name"];
                $content     = $row["content"];
                $content=str_replace("\r\n","<br>",$content);
                $regist_day  = $row["regist_day"];
                $hit         = $row["hit"];
        ?>
                <div id="profile">
                    <span><?=$name?>(<?=$id?>)</span>
                    <ul>
                    <?php
                    if ($id==$userid) {
                    ?>
                        <li><a href="newwrite_modify_form.php?num=<?=$num?>">수정</a></li>
                        <li>|</li>
                        <li><a href="newwrite_delete.php?num=<?=$num?>">삭제</a></li>
                        <li>|</li>
                    <?php
                    }
                    ?>
                        <li><?=$regist_day?></li>
                    </ul>
                </dlv>
                <?php
                if ($row["file_name"]) {
                ?>
                    <div id="file_img">
                    <img src="data/<?=$row['file_copied']?>">
                    </div> 
                <?php
                }
                ?>   
                
                <p style="font-size:13px;"><?=$content?></p>
                <br><br><br><br>        
        <?php 
            }
        ?>
        </div>
    </div>
</body>
</html>