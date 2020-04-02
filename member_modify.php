<?php
    include_once "db_con.php";
    $id = $_GET["id"];
    $pw = $_POST["pw"];
    $name = $_POST["name"];
    $email  = $_POST["email"];
          
    $sql1 = "update chatmem set pw='$pw', name='$name', email='$email' where id='$id'";
    $sql2 = "update newchat set name='$name' where id='$id'";
    $sql3 = "update newboard set name='$name' where id='$id'";
    
    mysqli_query($con, $sql1);
    mysqli_query($con, $sql2);
    mysqli_query($con, $sql3);

    mysqli_close($con);     

    echo "
          <script>
	            location.href = 'newmain.php';
	      </script>
	  ";
?>

   
