<?php
    include_once "db_con.php";
    include_once "config.php";
?>
<?php
    $num = $_GET["num"];

    $content = $_POST["content"];
	$content = htmlspecialchars($content, ENT_QUOTES);
          
    $sql = "update newboard set content='$content' ";
    $sql .= " where num=$num";
    mysqli_query($con, $sql);

    mysqli_close($con);     

    echo "
        <script>
	        location.href = 'newmain.php';
	    </script>
	  ";
?>

   
