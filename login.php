<?php
    include_once "db_con.php";

    $id = $_POST["id"];
    $pw = $_POST["pw"];

    $sql = "select * from chatmem where id='$id'";
    $result = mysqli_query($con, $sql);

    $num_match = mysqli_num_rows($result);

    if(!$num_match) {
        echo("
            <script>
                window.alert('등록되지 않은 아이디입니다!')
                history.go(-1)
            </script>
        ");
    }
    else {
        $row = mysqli_fetch_array($result);
        
        $db_pw = $row["pw"];
        mysqli_close($con);
        
        if($pw != $db_pw){
	        echo("
	            <script>
	                window.alert('비밀번호가 틀립니다!')
	                history.go(-1)
	            </script>
           	");
           exit;
        }
        else{
            session_start();
            $_SESSION["userid"] = $id;	

            echo("
                <script>
                    window.alert('로그인에 성공하였습니다!')
	                location.href = 'newmain.php';
	            </script>
            ");
        }
    }        
?>
