<?php
require_once 'pdo.php';


if (isset($_REQUEST['msg']) && isset($_REQUEST['uname'])) {
    $uname = $_REQUEST['uname'];
    $msg = $_REQUEST['msg'];
    $sql = "INSERT INTO `logs` (uname, msg) 
              VALUES (:uname, :msg)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        
        ':uname' => $uname,
        ':msg' => $msg
    ));
    
  include_once('selectMesg.php');
}



?>