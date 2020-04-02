<?php
    !empty($_POST['pw']) ? $pw = $_POST['pw'] : $pw="";
    !empty($_POST['pwcheck']) ? $pwcheck = $_POST['pwcheck'] : $pwcheck="";
    $ret['check'] = false;	
    if($pw != "" && $pwcheck != ""){
        if($pw==$pwcheck)
            $ret['check'] = true;
    }
	echo json_encode($ret);
?>