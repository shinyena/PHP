<meta charset="utf-8">
<?php
	include_once "db_con.php";
	include_once "config.php";
?>
<?php
	$content = $_POST["content"];
	$content = htmlspecialchars($content, ENT_QUOTES);
	//$content=str_replace("\r\n","<br>",$content);

	$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

	$upload_dir = './data/';

	$upfile_name	 = $_FILES["upfile"]["name"];
	$upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
	$upfile_type     = $_FILES["upfile"]["type"];
	$upfile_size     = $_FILES["upfile"]["size"];
	$upfile_error    = $_FILES["upfile"]["error"];

	if ($upfile_name && !$upfile_error) {
		$file = explode(".", $upfile_name);
		$file_name = $file[0];
		$file_ext  = $file[1];

		$new_file_name = date("Y_m_d_H_i_s");
		$new_file_name = $new_file_name;
		$copied_file_name = $new_file_name.".".$file_ext;      
		$uploaded_file = $upload_dir.$copied_file_name;

		if( $upfile_size  > 1000000 ) {
			echo("
			<script>
			alert('업로드 파일 크기가 지정된 용량(1MB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
			history.go(-1)
			</script>
			");
			exit;
		}

		if (!move_uploaded_file($upfile_tmp_name, $uploaded_file) ) {
			echo("
				<script>
				alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
				history.go(-1)
				</script>
			");
			exit;
		}
	}
	else {
		$upfile_name      = "";
		$upfile_type      = "";
		$copied_file_name = "";
	}

	$sql = "insert into newboard (id, name, content, regist_day, hit, file_name, file_type, file_copied) ";
	$sql .= "values('$userid', '$username', '$content', '$regist_day', 0, ";
	$sql .= "'$upfile_name', '$upfile_type', '$copied_file_name')";
	mysqli_query($con, $sql);  
	mysqli_close($con);

	echo "
		<script>
			window.alert('작성을 완료하였습니다!');
			location.href = 'newmain.php';
		</script>
	";
?>


  
