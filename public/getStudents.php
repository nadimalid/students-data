<?php
require_once("../src/functions.php");

try{
   $pdo = new PDO("sqlite:../studentsdb.db");
} catch (PDOException $e) {
   echo $e->getMessage();
}

$sql = "select * from student";

$stmt = $pdo->query($sql);

$returnArray = [];
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
   $returnArray[] = $row;
}

echo json_encode($returnArray);
