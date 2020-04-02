<?php 
  include_once "db_con.php";
  include_once "config.php";
?>
<?php
  $num   = $_GET["num"];

  $sql = "select * from newboard where num = $num";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);

  $copied_name = $row["file_copied"];

  if ($copied_name)	{
    $file_path = "./data/".$copied_name;
    unlink($file_path);
  }

  $sql = "delete from newboard where num = $num";
  mysqli_query($con, $sql);
  mysqli_close($con);

  echo "
    <script>
      window.alert('삭제가 완료되었습니다!');
      location.href = 'newmain.php';
    </script>
    ";
?>

