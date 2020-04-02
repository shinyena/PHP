<?php
	include_once "db_con.php";
?>
<?php
	session_start();
	if (isset($_SESSION["userid"])) {
		$userid = $_SESSION["userid"];
		$sql    = "select * from chatmem where id='$userid'";
		$result = mysqli_query($con, $sql);
		$row    = mysqli_fetch_array($result);
		$username=$row["name"];
	}
	else 
		echo("
			<script>
				window.alert('로그인이 필요한 서비스입니다!')
				location.href = 'login_form.php';
			</script>
		");
?>