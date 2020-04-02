<!DOCTYPE html>
<html>
<head> 
    <meta charset="utf-8">
    <title>CHATTING</title>
    <style>
    * { padding: 0; margin: 0; }
    a { text-decoration: none; color: #222222;}
    #login_box { width: 429px; margin: 0 auto;}
    #login_title { margin: 50px 0 0 0; padding-top: 100px; padding-bottom: 5px;	border-bottom: solid 2px #ffbe10; }
    #login_title span {	font-size: 20px; font-weight: bold; }
    #login_form { margin-top: 20px; }
    #login_form li { margin-top: 10px; }
    #login_form input {	width: 100%; height: 47px; }
    #login_form #login_btn { margin-top: 20px; width: 100%; height: 50px;}
    #login_form #member_btn { margin-top: 10px; width: 100%; height: 50px;}
    ul { list-style-type: none; }
    </style>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script>
    function check_input() {
        if (!$("#id").val()) {
            alert("아이디를 입력하세요");    
            $("#id").focus();
            return;
        }
        if (!$("#pw").val()){
            alert("비밀번호를 입력하세요");    
            $("#val").focus();
            return;
        }
        $("#login_form").submit();
    }
    </script>
</head>
<body>
    <div id="login_box">
    <div id="login_title"><span>로그인</span></div>
    <form name="login_form" id="login_form" method="post" action="login.php">		       	
    <ul>
        <li><input type="text" name="id" id="id" placeholder=" 아이디" ></li>
        <li><input type="password" name="pw" id="pw" placeholder=" 비밀번호" ></li>
    </ul>
        <a href="#"><img src="img/login.png" id="login_btn" onclick="check_input()"></a>
        <a href="member.php"><img src="img/member2.png" id="member_btn"></a>   	
    </form>
    </div>
</body>
</html>