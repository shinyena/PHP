<?php
    !empty($_POST['pw']) ? $pw = $_POST['pw'] : $pw="";
    $ret['check'] = false;	
    $pattern = '/^.*(?=^.{8,}$)(?=.*\d)(?=.*[a-zA-Z])(?=.*[!@#$%^&+=]).*$/';
    if($pw != ""){
        if (preg_match($pattern ,"$pw"))
            $ret['check'] = true;
    }
	echo json_encode($ret);
?>