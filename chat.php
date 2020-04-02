<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8">
    <title>CHATTING</title>
    <script type="text/javascript" src="chat.js"></script>
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
    
    #chat_form { width: 75%; height: 470px; margin: 0 auto;
        border: 1px solid #ccc; padding: 20px;}
    #chat_form #list {height: 400px; overflow:auto; 
        margin: 0 auto; margin-top: 10px; border: 1px solid #ccc;}
    #chat_form #list dt {float: left; width: 100px; font-weight: bold; font-size: 13px;}
    #chat_form #list dd {float: left; width: 270px; font-size: 13px; margin-bottom: 7px;}
    #chat_form form { text-align: center; margin-top: 10px;}
    #chat_form form #name {width: 12%; height: 25px; border: white; font-weight: bold;}
    #chat_form form #msg {width: 65%; height: 25px;}
    #chat_form form #btn {width: 18%; height: 25px;}
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
                <li><a href="newmain.php" style="color:white">HOME</a></li>
                <li>|</li>
                <li><a href="newwrite.php" style="color:white">작성하기</a></li> 
                <li>|</li>                               
                <li><a href="chat.php" style="color:black">채팅하기</a></li>
            </ul>
        </div>
        <div id="chat_form">
            <dl id="list"></dl>
            <form onsubmit="chatManager.write(this); return false;">
                <input name="name" id="name" type="text" value="<?=$username?>" readonly>
                <input name="msg" id="msg" type="text">
                <input name="btn" id="btn" type="submit" value="입력">
            </form>
        </div>
    </div>
</body>
</html>
    