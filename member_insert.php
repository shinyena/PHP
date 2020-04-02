<?php
    include_once "db_con.php";

    $id   = $_POST["id"];
    $pw = $_POST["pw"];
    $name = $_POST["name"];
    $email  = $_POST["email"];

    $regist_day = date("Y-m-d (H:i)");

	$sql = "insert into chatmem (id, pw, name, email, regist_day) ";
    $sql .= "values('$id', '$pw', '$name', '$email', '$regist_day')";

	mysqli_query($con, $sql);
    mysqli_close($con);     

    echo ("
	    <script>
	        location.href = 'login_form.php';
	    </script>
	");
?>

   
