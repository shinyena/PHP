<!DOCTYPE html>
<html>
<head> 
	<meta charset="utf-8">
	<title>PHP 프로그래밍 입문</title>

	<style>
    * { padding: 0; margin: 0; }
    a { text-decoration: none; color: #222222;}
    #member_box { width: 429px; margin: 0 auto;}
    #member_title { margin: 50px 0 0 0; padding-bottom: 5px; border-bottom: solid 2px #ffbe10; }
    #member_title span {	font-size: 20px; font-weight: bold; }
    #member_form { margin-top: 20px; }
    #member_form li { margin-top: 10px; }
    #member_form input {	width: 100%; height: 47px; }
    #member_form #member_btn { margin-top: 15px; margin-bottom: 50px; width: 100%; height: 50px;}
    ul { list-style-type: none; }
    </style>	

	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script>
    $(function(){
        $("#pw").blur(function(){
	 		if($(this).val() == "")
	            $("#pw_check_msg1").html("비밀번호를 입력해주세요.").css("color","red").attr("data-check","0");
	 		else
	 			checkPw1Ajax();
	 	});
        $("#pwcheck").blur(function(){
	 		if($(this).val() == "")
	            $("#pw_check_msg2").html("비밀번호를 확인해주세요.").css("color","red").attr("data-check","0");
	 		else
	 			checkPw2Ajax();
	 	});
    });
    function checkPw1Ajax(){
		$.ajax({
			url : "check_pw1.php",
			type : "post",
			dataType : "json",
			data : {"pw" : $("#pw").val()},
			success : function(data){				
				if(data.check)
                    $("#pw_check_msg1").html("사용 가능한 비밀번호 입니다.").css("color","blue").attr("data-check","1");
                else
                    $("#pw_check_msg1").html("영문+숫자+특수문자 8자리 이상으로 구성해주세요.").css("color","red").attr("data-check","0");
			}
		});
    }
    function checkPw2Ajax(){
		$.ajax({
			url : "check_pw2.php",
			type : "post",
			dataType : "json",
			data : {"pw" : $("#pw").val(), "pwcheck" : $("#pwcheck").val()},
			success : function(data){				
				if(data.check)
                    $("#pw_check_msg2").html("비밀번호 확인 완료").css("color","blue").attr("data-check","1");
                else
                    $("#pw_check_msg2").html("비밀번호가 일치하지 않습니다.").css("color","red").attr("data-check","0");
			}
		});
    }
    var pattern1 = /[0-9]/;
    var pattern2 = /[a-zA-Z]/;
    var pattern3 = /[!@#$%^&+=]/;   
    function check_input(){
        if (!$("#pw").val()) {
            alert("비밀번호를 입력하세요!");    
            $("#pw").focus();
            return;
        }
        if (!$("#pwcheck").val()) {
            alert("비밀번호확인을 입력하세요!");    
            $("#pwcheck").focus();
            return;
        }
        if ($("#pw").val() != $("#pwcheck").val()) {
            alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
            $("#pw").val().focus();
            $("#pw").val().select();
            return;
        }
        if(!pattern1.test($("#pw").val())||!pattern2.test($("#pw").val())||!pattern3.test($("#pw").val())||$("#pw").val().length<8){
            alert("비밀번호는 영문+숫자+특수문자 8자리 이상으로 구성해주세요!");
            $("#pw").val().focus();
            $("#pw").val().select();
            return;
        } 
        if (!$("#name").val()) {
            alert("이름을 입력하세요!");    
            $("#name").focus();
            return;
        }
        if (!$("#email").val()) {
            alert("이메일 주소를 입력하세요!");    
            $("#email").focus();
            return;
        }
        $("#member_form").submit();
        alert("회원정보 수정이 완료되었습니다!");
    }
    </script> 


</head>
<body> 
<?php  
	include_once "db_con.php";
	include_once "config.php";

    $sql    = "select * from chatmem where id='$userid'";
    $result = mysqli_query($con, $sql);
    $row    = mysqli_fetch_array($result);

    $pw = $row["pw"];
    $name = $row["name"];
    $email = $row["email"]; 

    mysqli_close($con);
?>
	<div id="member_box">
    <div id="member_title"><span>회원정보수정</span></div>
    <form name="member_form" id="member_form" method="post" action="member_modify.php?id=<?=$userid?>">		       	
    <ul>
        <li><input type="text" name="id" id="id" placeholder=" 아이디" value="<?=$userid?>" readonly>
        <span id="id_check_msg" data-check="0" style="font-size: 10px"></span></li>
        <li><input type="password" name="pw" id="pw" placeholder=" 비밀번호(영문+숫자+특수문자 8자리 이상)" value="<?=$pw?>">
        <span id="pw_check_msg1" data-check="0" style="font-size: 10px"></span></li>
        <li><input type="password" name="pwcheck" id="pwcheck" placeholder=" 비밀번호 확인" value="<?=$pw?>">
        <span id="pw_check_msg2" data-check="0" style="font-size: 10px"></span></li>
        <li><input type="text" name="name" id="name" placeholder=" 이름" value="<?=$name?>"></li>
        <li><input type="text" name="email" id="email" placeholder=" 이메일" value="<?=$email?>"></li>
    </ul>	   
        <a href="#"><img src="img/modify.png" id="member_btn" onclick="check_input()"></a> 	
    </form>
    </div>
</body>
</html>

