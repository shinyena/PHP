<?php
        include_once "db_con.php";
?>
<?php
	$date=$_GET['date'];

	if(!$date)
		$date = date('Y-m-d H:i:s');

	$sql = "select * from newchat where date>'$date'";
	$result = mysqli_query($con, $sql);

	$data = array();
	
	//$result->fetch_array(MYSQLI_ASSOC)
	while($row = mysqli_fetch_array($result)) {
		$data[] = $row;
		$date = $row["date"];
	}

	echo json_encode(array('date' => $date, 'data' => $data));
?>