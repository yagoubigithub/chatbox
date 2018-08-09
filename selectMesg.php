<?php

require_once 'pdo.php';
    $stmt = $pdo->prepare("SELECT * FROM `logs` ORDER BY `id` DESC");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows as $row) {
        echo $row['uname'] . " : " . $row['msg'] . "</br>"; 
    }

    