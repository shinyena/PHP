<?php
        include_once "db_con.php";
		include_once "config.php";
?>
<?php
	$name=$_POST['name'];
	$msg=$_POST['msg'];
	//$msg=real_escape_string($_POST['msg']);
	$sql    = "select * from chatmem where name='$name'";
    $result = mysqli_query($con, $sql);
	$row    = mysqli_fetch_array($result);
	
	$id=$row["id"];

	$sql = "insert into newchat (id, name, msg, date) ";
	$sql .= "values('$id','$name', '$msg', NOW())";

	mysqli_query($con, $sql);
?>